@extends('user.layouts.master')
@section('main_content')
<div class="container">
    <h1>Edit Countries</h1>
    <form action="{{ route('nationality.update', $nationality) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="img">Image :</label>
            <input type="file" name="img" id='img' class="form-control" value="{{ $nationality->img }}">
        </div>
        <div class="form-group">
            <label for="img">Name :</label>
            <input type="text" name="name" id='name' class="form-control"value="{{ $nationality->name }}">
        </div>
        <div class="form-group">
            <label for="img">Text :</label>
            <input type="text" name="text" id='text' class="form-control" value="{{ $nationality->text }}">
        </div>
        <div class="form-group">
            <label for="img">Price :</label>
            <input type="number" name="price" id='price' class="form-control"> value="{{ $nationality->price }}"
        </div>
        <div class="form-group">
            <label for="img">Icon :</label>
            <input type="file" name="icon" id='icon' class="form-control" value="{{ $nationality->icon }}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>

</div>
@endsection
