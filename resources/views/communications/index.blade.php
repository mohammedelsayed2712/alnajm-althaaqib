@extends('user.layouts.master')

@section('main_content')
    <h1>Communications</h1>
    <a href="{{ route('communications.create') }}" class="btn btn-primary" >Create New Communication</a>
    <table class="table">
        <thead>
            <tr>
                <th>Image</th>
                <th>Title</th>
                <th>Description</th>
                <th>Icon</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($communications as $communication)
                <tr>
                    <td><img src="{{ asset('images/'.$communication->img) }}" width="100" class="img-thumbnail mt-2" /></td>
                    <td>{{ $communication->title }}</td>
                    <td>{{ $communication->desc }}</td>
                    <td><img src="{{ asset('icons/'.$communication->icon) }}" width="50" /></td>
                    <td>


                        <a href="{{ route('communications.show', $communication) }}" class="btn btn-info" >View </a>
                        <a href="{{ route('communications.edit', $communication) }}"class="btn btn-warning">Edit</a>
                        <form action="{{ route('communications.destroy', $communication) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit"class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
