@extends('user.layouts.master')

@section('main_content')
<div class="container">
    <h1>Create Recruitment Country</h1>

    <form action="{{ route('recruitmentCountries.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="name" class="form-label">Name</label>
          <input type="text" class="form-control" id="name" name="name" required>
       </div>
        
       <div class="mb-3">
           <label for="description" class="form-label">Description</label>
           <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
       </div>

       <div class="mb-3">
           <label for="image" class="form-label">Image</label>
           <input type="file" class="form-control" id="image" name="image" required>
       </div>

       <div class="form-group">
            <label for="price" class="form-label">Price</label>
            <input type="number" step="0.01" class="form-control" id="price" name="price" required>
       </div>

       <div class="form-group mb-3">
            <label for="phone_number" class="form-label">Phone Number</label>
            <input type="text" name="phone_number" class="form-control" id="phone_number">
       </div>

        <div class="mb-3">
            <label for="is_active" class="form-label">Status</label>
            <select class="form-control" id="is_active" name="is_active">
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Create Recruitment Country</button>
    </form>
</div>
@endsection
