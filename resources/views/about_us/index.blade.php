@extends('user.layouts.master')

@section('main_content')
<div class="container">
    <h1>About Us</h1>
    <a href="{{ route('about_us.create') }}" class="btn btn-primary">Add New</a>
    <table class="table">
        <thead>
            <tr>
                <th>Image</th>
                <th>Title</th>
                <th>Button</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($aboutUs as $item)
            <tr>
                <td><img src="{{ Storage::url($item->image_path) }}" width="100" alt="Image"></td>
                <td>{{ $item->title }}</td>
                <td>{{ $item->button_text }}</td>
                <td>{{ $item->active ? 'Active' : 'Inactive' }}</td>
                <td>
                    <a href="{{ route('about_us.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('about_us.destroy', $item->id) }}" method="POST" style="display:inline;">
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
