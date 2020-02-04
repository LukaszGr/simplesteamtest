<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('author')->get();

        return view('home', compact('posts'));
    }

    /**
     * Create new post
     * 
     * @return \Illuminate\Http\Response
     */
    public function createPost()
    {
        return view('create_post');
    }

    /**
     * Save new post
     * 
     * @param Request $request
     * @return \Illuminate\Http\Response
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

    /**
     * Display specified post.
     *
     * @param  \App\Post $post
     * @return \Illuminate\Http\Response
     */
    public function showPost(Post $post)
    {
        return view('show_post',compact('post'));
    }

    /**
     * Edit post
     * 
     * @param  \App\Post $post
     * @return \Illuminate\Http\Response
     */
    public function editPost(Post $post)
    {
        return view('edit_post', compact('post'));
    }

    /**
     * Update post
     * 
     * @param Request $request
     * @param  \App\Post $post
     * @return \Illuminate\Http\Response
     */
    public function updatePost(Request $request, Post $post)
    {
        $request->validate([
                'title' => 'required|max:255',
                'body' => 'required',
            ]
        );
    
        $post->update($request->all());

        return redirect()->route('home')->with('status', 'Your post has been updated. Well done!');
    }

    /**
     * Delete a post
     * 
     * @param  \App\Post $post
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function deletePost(Post $post)
    {
        $post->delete();
        return redirect()->route('home')->with('status', 'Your post has been deleted. Sad face :(');
    }

}
