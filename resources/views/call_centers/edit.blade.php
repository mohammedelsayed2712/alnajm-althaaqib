@extends('user.layouts.master')
@section('main_content')
<div class="container">
<h1>Edit Call Center</h1>
<form action="{{ route('call_centers.update', $callCenter) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="img">Image: </label>
        <input  class="form-control" type="file" name="img" id="img value="{{ $callCenter->img }}">
    </div>
    <br>
    <div class="form-group">
        <label for="name">Name:</label>
        <input   class="form-control" type="name" name="name" id="name" value="{{ $callCenter->name }}" required>
    </div>
    <br>

    <div class="form-group">
        <label for="img">Icon 1: </label>
        <input  class="form-control" type="file" name="icon1" id="icon1" value="{{ $callCenter->icon1}}">
    </div>
    <br>

    <div class="form-group">
        <label for="img">Icon 2: </label>
        <input  class="form-control" type="file" name="icon2" id="icon2" value="{{ $callCenter->icon2 }}">
        {{-- <img src="{{ asset('storage/'.$callCenter->icon2) }}" alt="Icon 2" style="width: 50px;"> --}}

    </div>
    <br>

    <button type="submit" class="btn btn-success" >Update</button>
</form>
</div>

@endsection
