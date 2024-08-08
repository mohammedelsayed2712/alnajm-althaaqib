@extends('user.layouts.master')

@section('main_content')
<div class="container">
    <h1>Edit Photo</h1>
    <form action="{{ route('paginates.update', $paginate) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="photo">CV:</label>
          <input type="file" class="form-control" name="photo">
          <img src="{{ asset('storage/' . $paginate->image_path) }}" alt="CV Photo" class="img-thumbnail mt-2" width="150">
        </div> 

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection