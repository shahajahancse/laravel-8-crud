@extends('layouts.app')

@section('content')
    <h3>Add Student</h3>
    <a class="btn btn-secondary" href="{{route('posts')}}">Back to Home</a>
    <a class="btn btn-info" href="{{route('students')}}">Show List</a> <br><br/>

    @if (Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif

    <form method="POST" action="{{route('student.store')}}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror " id="name">
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="class_name" class="form-label">Class Name</label>
            <input type="text" name="class_name" class="form-control @error('class_name') is-invalid @enderror " id="class_name">
            @error('class_name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="roll" class="form-label">Roll</label>
            <input type="text" name="roll" class="form-control @error('roll') is-invalid @enderror" id="roll">
            @error('roll')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" id="address">
            @error('address')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
