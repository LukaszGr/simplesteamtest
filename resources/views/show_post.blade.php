@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h3>{{ $post->title }} by {{ $post->author->name }}</h3>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <textarea disabled class="form-control" rows="15" name="body" required>{{ $post->body }}</textarea>
            </div>
        </div>
    </div>
@endsection