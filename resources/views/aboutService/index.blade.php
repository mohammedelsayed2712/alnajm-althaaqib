@extends('user.layouts.master')

@section('main_content')
<div class="container">
    <h1>Our Services</h1>
    <a href="{{ route('about_service.create') }}" class="btn btn-primary">Add New Service</a>
    <table class="table">
        <thead>
            <tr>
                <th>Icon</th>
                <th>Title</th>
                {{-- <th>Description</th> --}}
                <th>Image</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($services as $service)
            <tr>
                <td>{{ $service->icon }}</td>
                <td>{{ $service->title }}</td>
                {{-- <td>{{ $service->description }}</td> --}}
                <td><img src="{{ asset('storage/' . $service->image) }}" width="100" alt="{{ $service->title }}"></td>
                <td>{{ $service->is_active ? 'Active' : 'Inactive' }}</td>
                <td>
                    <a href="{{ route('about_service.edit', $service->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('about_service.destroy', $service->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
