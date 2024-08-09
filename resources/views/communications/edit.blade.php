@extends('user.layouts.master')

@section('main_content')
    <h1>Edit Communication</h1>
    <form action="{{ route('communications.update', $communication) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group" >
            <label for="img">Image</label>
            <input  class="form-control" type="file" name="img" id="img">
            <img src="{{ asset('images/'.$communication->img) }}" width="100" />
        </div>
        <div class="form-group" >
            <label for="title">Title</label>
            <input  class="form-control" type="text" name="title" id="title" value="{{ $communication->title }}" required>
        </div>
        <div class="form-group">
            <label for="desc">Description</label>
            <textarea  class="form-control" name="desc" id="desc" required>{{ $communication->desc }}</textarea>
            <div class="form-group" >
                <label for="icon">Icon</label>
                <input class="form-control" type="file" name="icon" id="icon">
                 <img src="{{ asset('icons/'.$communication->icon) }}" width="50" />
            </div>
        <button class="btn btn-success" type="submit">Update</button>
    </form>
@endsection
