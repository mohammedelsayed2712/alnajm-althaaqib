@extends('user.layouts.master')

@section('main_content')
<div class="container">
    <h1>Upload Photo</h1>
    <form action="{{ route('paginates.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="photo">Photo:</label>
            <input type="file" class="form-control" id="photo" name="photo" required>
        </div>
        <button type="submit" class="btn btn-primary">Upload</button>
    </form>
</div>
@endsection