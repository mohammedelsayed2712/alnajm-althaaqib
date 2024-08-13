@extends('user.layouts.master')


@section('main_content')

<h1>Edit Call Center</h1>

<form action="{{ route('call_centers.update', $callCenter) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="img">Image:</label>
        <input  class="form-control" type="file" name="img" id="img">
        <img src="{{ asset('images/'.$callCenter->img) }}" width="100" />
    </div>
    <br>

    <div class="form-group">
        <label for="name">Name:</label>
        <input   class="form-control" type="text" name="name" id="name" value="{{ $callCenter->name }}" required>
    </div>
    <br>

    <div class="form-group">
        <label for="icon1">Icon 1: </label>
        <input  class="form-control" type="file" name="icon2" id="icon1">
        <img src="{{ asset('icons/'.$callCenter->icon1) }}" alt="Icon 1" style="width: 50px;">
    </div>
    <br>

    <div class="form-group">
        <label for="icon2">Icon 2: </label>
        <input  class="form-control" type="file" name="icon2" id="icon2">
        <img src="{{ asset('icons/'.$callCenter->icon2) }}" alt="Icon 2" style="width: 50px;">

    </div>
    <br>

    <button type="submit" class="btn btn-success" >Update Call Center</button>
</form>

@endsection
