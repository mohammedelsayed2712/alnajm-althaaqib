@extends('user.layouts.master')

@section('main_content')
<div class="container">
    <h1>Edit Requirement</h1>

    <form action="{{ route('requirements.update', $requirement->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-3">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" value="{{ $requirement->title }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="description">Description</label>
            <input type="text" name="description" class="form-control" value="{{ $requirement->description }}" required>
        </div>

        <div class="form-group mb-3">
          <label for="icon">Icon Class</label>
          <input type="text" name="icon" class="form-control" value="{{ $requirement->icon }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="active">Active</label>
            <select name="active" class="form-control">
                <option value="1" {{ $requirement->active ? 'selected' : '' }}>Active</option>
                <option value="0" {{ !$requirement->active ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Requirement</button>
    </form>
</div>
@endsection