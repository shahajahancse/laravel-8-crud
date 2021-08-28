@extends('layouts.app')

@section('content')
    <h3>Single Post View</h3>
    <a href="{{route('posts')}}">Back to Post list</a> <br><br/>

    <h4>{{$post->title}}</h4>
    <p>{{$post->post_content}}</p>
@endsection
