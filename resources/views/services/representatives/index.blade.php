@extends('user.layouts.master')

@section('main_content')
<div class="container">
    <h1>Customer Service Representatives</h1>
    <a href="{{ route('representatives.create') }}" class="btn btn-primary">Add New Representative</a>

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Image</th>
                <th>WhatsApp</th>
                <th>Call</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($representatives  as $representative)
            <tr>
                <td>{{ $representative->name }}</td>
                <td><img src="{{ asset('storage/' . $representative->image) }}" width="100" alt="{{ $representative->name }}"></td>
                <td><a href="https://wa.me/{{ $representative->whatsapp_number }}" class="btn btn-success btn-sm">WhatsApp</a></td>
                <td><a href="tel:{{ $representative->phone_number }}" class="btn btn-danger btn-sm">Call</a></td>
                <td>{{ $representative->is_active ? 'Active' : 'Inactive' }}</td>
                <td>
                    <a href="{{ route('representatives.show', $representative->id) }}" class="btn btn-warning">Show</a>
                    <a href="{{ route('representatives.edit', $representative->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('representatives.destroy', $representative->id) }}" method="POST" style="display:inline;">
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