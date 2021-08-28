@extends('layouts.app')
@section('content')
    <h3>Post List</h3>
    <a class="btn btn-primary" href="{{route('posts.create')}}">Create Post</a>
    <a class="btn btn-success" href="{{ route('student.create') }}">Add New Student</a>
    @if (Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif
    <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">image</th>
            <th scope="col">Details</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <th scope="row">{{ ++$loop->index }}</th>
                    <td>{{$post->title}}</td>
                    <td>{{$post->image}}</td>
                    <td>{{$post->post_content}}</td>
                    <td>
                        <a class="btn btn-success btn-sm" href="{{ route('posts.show', $post->id) }}">View</a>
                        <a class="btn btn-primary btn-sm" href="{{ route('posts.edit', $post->id) }}">Edit</a>
                        <form action="{{route('posts.destroy', $post->id)}}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
