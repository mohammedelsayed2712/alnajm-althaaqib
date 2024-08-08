@extends('user.layouts.master')

@section('main_content')
    <h1>Edit Service</h1>
    <form action="{{ route('services.update', $services) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="img">Image :           </label><br>
            <input   class="form-control" type="file" name="img" id="img" value="{{  $services->img}}" ><br>
            <img src="{{ asset('images/'.$services->img) }}" width="100" />
        </div>
        <br>
        <div class="form-group" >
            <label for="title">Title :</label>
            <input  class="form-control type="text" name="title" id="title" value="{{ $services->title }}" required>
        </div>
        <br>
        <div class="form-group">
            <label for="desc">Description :</label>
            <input  class="form-control type="text" name="desc" id="desc" value="{{ $services->desc }}" required>
            {{-- <textarea class="form-control name="desc" id="desc" required> value="{{ $services->desc }}textarea> --}}
        <button class="btn btn-success"type="submit">Update</button>
    </form>
@endsection
