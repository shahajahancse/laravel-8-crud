@extends('layouts.app')

@section('content')
    <h3>Home page</h3>
    Welcome to Home page.<br>
    <a href="{{ route('posts') }}">Post List</a><br>
    <a href="{{ route('posts.create') }}">Post Create</a>
@endsection
