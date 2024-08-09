@extends('user.layouts.master')

@section('main_content')
    <h1>Create Communication</h1>
    <form action="{{ route('communications.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group" >
            <label for="img">Image</label>
            <input class="form-control"  type="file" name="img" id="img" required>
        </div>
        <div class="form-group">
            <label for="title">Title</label>
            <input class="form-control"  type="text" name="title" id="title" required>
        </div>
        <div class="form-group">
            <label for="desc">Description</label>
            <textarea class="form-control"  name="desc" id="desc" required></textarea>
        </div>
        <div class="form-group" >
            <label for="img">Icon</label>
            <input class="form-control"  type="file" name="icon" id="icon" required>
        </div>
        <button type="submit" class="btn btn-success">Save</button>
    </form>
@endsection
