<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::with('author')->get();

        return view('home', compact('posts'));
    }

    /**
     * Create new post
     * 
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function createPost()
    {
        return view('create_post');
    }

    /**
     * Save new post
     * 
     * @param Request $request
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function savePost(Request $request)
    {
        $request->validate([
                'title' => 'required|max:255',
                'body' => 'required',
            ]
        );

        $blog = new Post();
        $blog->title = $request->input('title');
        $blog->body = $request->input('body');
        $blog->user_id = Auth::id();
        $blog->save();
        return redirect()->route('home')->with('status', 'Your blog has been saved. Well done.');
    }


}
