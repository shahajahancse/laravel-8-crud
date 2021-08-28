@extends('layouts.app')

@section('content')
    <h3>Create Post</h3>
    <a href="{{route('posts')}}">Back to Post list</a> <br><br/>

    @if (Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{route('posts.update', $post->id)}}">
        @csrf
        @method('put')
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" value="{{ $post->title }}" class="form-control" id="title">
        </div>
        <div class="mb-3">
            <label for="post_content" class="form-label">Post Content</label>
            <input type="text" name="post_content" value="{{ $post->post_content }}" class="form-control" id="post_content">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
@endsection
