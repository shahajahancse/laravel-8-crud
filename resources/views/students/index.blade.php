@extends('layouts.app')

@section('content')
    <h3>Add Student</h3>
    <a class="btn btn-secondary" href="{{route('posts')}}">Back to Home</a>
    <a class="btn btn-info" href="{{ route('student.create') }}">Add New Student</a>
    <br><br>
    @if (Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif
    <table class="table table-bordered border-primary">
    <thead>
        <tr class="">
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Class name</th>
            <th scope="col">Roll</th>
            <th scope="col">Address</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($students as $item)
            <tr>
                <th scope="row">{{ ++$loop->index }}</th>
                <td>{{ $item->name }}</td>
                <td>{{ $item->class_name }}</td>
                <td>{{ $item->roll }}</td>
                <td>{{ $item->address }}</td>
                <td>
                    <a class="btn btn-sm btn-primary" href="{{ route('student.edit', $item->id) }}">Edit</a>
                    <a class="btn btn-sm btn-success" href="{{route('student.view', $item->id)}}">View</a>
                    <form action="{{route('student.delete', $item->id)}}" method="POST">
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
