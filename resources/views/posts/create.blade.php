@extends('layouts.app')

@section('content')
    <h3>Create Post</h3>
    <a href="{{route('posts')}}">Back to Post list</a> <br><br/>

    @if (Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif

    <form method="POST" action="{{route('posts.store')}}">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror " id="title">
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="post_content" class="form-label">Post Content</label>
            <input type="text" name="post_content" class="form-control @error('post_content') is-invalid @enderror " id="post_content">
            @error('post_content')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" name="image" id="image"><br>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
