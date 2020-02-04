@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h3>Create A Post</h3>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <form action="{{ route('save_post') }}" method="post">
                {{ csrf_field() }}
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control"  aria-describedby="emailHelp" placeholder="Enter blog title" name="title" required>
                    </div>
                    <div class="form-group">
                        <label for="body">Blog Content</label>
                        <textarea class="form-control" rows="15" name="body" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Create Post</button>
                </form>
            </div>
        </div>
    </div>
@endsection