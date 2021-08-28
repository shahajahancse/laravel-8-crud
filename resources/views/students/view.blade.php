@extends('layouts.app')

@section('content')
    <h3>Add Student</h3>
    <a class="btn btn-secondary" href="{{route('posts')}}">Back to Home</a>
    <a class="btn btn-info" href="{{ route('student.create') }}">Add New Student</a>
    <br><br>
    <h3>Name : {{$student->name}}</h3>
    <p>Class : {{$student->class_name}}, &nbsp;&nbsp;&nbsp; Roll : {{$student->roll}} </p>
    <p>Address : {{$student->address}}</p>
@endsection
