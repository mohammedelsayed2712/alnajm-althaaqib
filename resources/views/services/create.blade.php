@extends('user.layouts.master')

@section('main_content')
<h1>Create Service</h1>
    <form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="img">Image : </label>
            <input   class="form-control" type="file" name="img" id="img" required>
        </div>
        <div class="form-group">
            <label for="title">Title : </label>
            <input  class="form-control"  type="text" name="title" id="title" required>
        </div>
        <div class="form-group" >
            <label for="desc">Description :</label>
            <textarea  class="form-control" name="desc" id="desc" required></textarea>
        </div>
        <br>
        <button type="submit"  class="btn btn-success" >Save</button>
    </form>
@endsection

