@extends('user.layouts.master')

@section('main_content')
<div class="container">
    <h1>Photos</h1>
    <a href="{{ route('paginates.create') }}" class="btn btn-primary mb-3">Add New Photo</a>
    <table class="table">
        <thead>
            <tr>
                <th>Photo</th>
                <th>Operations</th>
            </tr>
        </thead>
        <tbody>
            @foreach($photos as $photo)
            <tr>
                <td>
                    <img src="{{ asset('storage/' . $photo->image_path) }}" alt="Photo" class="img-thumbnail mt-2" width="150">
                </td>
                
                <td>
                    <a href="{{ route('paginates.show', $photo) }}" class="btn btn-info">View</a>
                    <a href="{{ route('paginates.edit', $photo) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('paginates.destroy', $photo) }}" method="POST" style="display:inline-block;">
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