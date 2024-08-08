@extends('user.layouts.master')
@section('main_content')
<h1>Services</h1>
    <a href="{{ route('services.create') }}" class="btn btn-primary">Create New Service</a>
    <table  class="table">
        <thead >
            <tr>
                <th>Image</th>
                <th>Title</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($services as $service)
                <tr>
                    <td><img src="{{ asset('images/'.$service->img) }}" width="100" /></td>
                    <td>{{ $service->title }}</td>
                    <td>{{ $service->desc }}</td>
                    <td>
                        <a href="{{ route('services.show',  $service->id) }}" class="btn btn-info" >View </a>
                        <a href="{{ route('services.edit', $service) }}"class="btn btn-warning">Edit</a>
                        <form action="{{ route('services.destroy', $service) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
