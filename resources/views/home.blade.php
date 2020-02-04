@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h3>All Posts</h3>
            @auth
            <a href="{{ route('create_post') }}" class="btn btn-primary float-right">Add Post</a>
            @endauth
        </div>
    </div>
    
    @if (session('status'))
        <div class="row justify-content-center">
            <div class="col-md-10 alert alert-success">
                {{ session('status') }}
            </div>
        </div>
    @endif

    <div class="row justify-content-center">
        @foreach($posts as $post)
            <div class="col-md-10">
                <div class="card pb-2 mb-3">
                    <a href="{{ route('show_post', ['id' => $post->id]) }}"><div class="card-header"> {{ $post->title }} by {{ $post->author->name }}</div></a>

                    <div class="card-body">
                        {{ Str::limit($post->body, 100, ' (...)') }}
                        @auth
                        <hr><br>
                        <a href="{{ route('edit_post', ['id' => $post->id]) }}" class="card-link btn btn-primary">Edit</a>
                        <form action="{{ route('delete_post', ['id' => $post->id]) }}" method="post"><br>
                        {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        @endauth
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
