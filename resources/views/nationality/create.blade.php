@extends('user.layouts.master')
@section('main_content')
<div class="container">
    <h1>Create New Countries</h1>
    <form action="{{ route('nationality.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="img">Image :</label>
            <input type="file" class="form-control" name="img" >
        </div>
        <br>
        <div class="form-group">
            <label for="name">Name :</label>
            <input type="text" class="form-control"  name="name" >
        </div>
        <div class="form-group">
            <label for="text">Text :</label>
            <input type="text" class="form-control" name="text">
        </div>
        <div class="form-group">
            <label for="number">price :</label>
            <input type="number" class="form-control" name="price">
        </div>
        <div class="form-group">
            <label for="img">Icon :</label>
            <input type="file" class="form-control" name="icon">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>

    </form>

</div>
@endsection
