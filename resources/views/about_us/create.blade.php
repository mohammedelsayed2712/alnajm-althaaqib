@extends('user.layouts.master')

@section('main_content')
<div class="container">
    <h1>Add New About Us Section</h1>
    <form action="{{ route('about_us.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" name="description" required></textarea>
        </div>
        
        <div class="form-group">
            <label for="image_path">Image</label>
            <input type="file" class="form-control" name="image_path">
        </div>

        <div class="form-group">
            <label for="button_text">Button text</label>
            <input class="form-control" name="button_text">
        </div>
        <div class="form-group">
            <label for="active">Active</label>
            <input type="checkbox" name="active" value="1" checked>
        </div>
        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
@endsection
