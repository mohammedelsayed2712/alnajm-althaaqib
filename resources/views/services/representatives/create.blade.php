{{-- @extends('user.layouts.master')

@section('main_content')
<div class="container">
    <h1>Add New Representative</h1>

    <form action="{{ route('representatives.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control" id="image" name="image" required>
        </div>

        <div class="form-group">
          <label for="whatsapp_number">WhatsApp Number</label>
          <input type="text" name="whatsapp_number" class="form-control" id="whatsapp_number">
        </div>

        <div class="form-group">
          <label for="phone_number">Phone Number</label>
          <input type="text" name="phone_number" class="form-control" id="phone_number">
        </div>

        <div class="mb-3">
            <label for="is_active" class="form-label">Status</label>
            <select class="form-control" id="is_active" name="is_active">
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Create Service</button>
    </form>
</div>
@endsection --}}

@extends('user.layouts.master')

@section('main_content')
<div class="container">
    <h1>Add New Representative</h1>

    <form action="{{ route('representatives.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-3">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" id="name" required>
        </div>

        <div class="form-group mb-3">
            <label for="image">Image</label>
            <input type="file" name="image" class="form-control-file" id="image">
        </div>

        <div class="form-group mb-3">
            <label for="whatsapp_number">WhatsApp Number</label>
            <input type="text" name="whatsapp_number" class="form-control" id="whatsapp_number">
        </div>

        <div class="form-group mb-3">
            <label for="phone_number">Phone Number</label>
            <input type="text" name="phone_number" class="form-control" id="phone_number">
        </div>

        <div class="form-group mb-3">
            <label for="is_active">Active</label>
            <select name="is_active" id="is_active" class="form-control">
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
