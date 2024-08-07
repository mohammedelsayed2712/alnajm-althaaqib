@extends('user.layouts.master')

@section('main_content')
<div class="container">
    <h1>Edit About Us Section</h1>
    <form action="{{ route('about_us.update', $aboutUs->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" value="{{ $aboutUs->title }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" name="description" required>{{ $aboutUs->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="button_text">Button</label>
            <input class="form-control" name="button_text" value="{{ $aboutUs->button_text }}">
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control" name="image">
            @if($aboutUs->image_path)
            <img src="{{ Storage::url($aboutUs->image_path) }}" width="100" alt="Image">
            @endif
        </div>
        <div class="form-group">
            <label for="active">Active</label>
            <input type="checkbox" name="active" value="1" {{ $aboutUs->active ? 'checked' : '' }}>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
