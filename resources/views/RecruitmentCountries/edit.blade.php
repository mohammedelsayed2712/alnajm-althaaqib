@extends('user.layouts.master')

@section('main_content')
<div class="container">
    <h1>Edit Recruitment Country</h1>

    <form action="{{ route('recruitmentCountries.update', $recruitmentCountry->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="name">Name</label>
          <input type="text" class="form-control" id="name" name="name" value="{{ $recruitmentCountry->name }}" required>
        </div>

        <div class="mb-3">
          <label for="image" class="form-label">Image</label>
          <input type="file" class="form-control" id="image" name="image">
          @if($recruitmentCountry->image)
              <img src="{{ asset('storage/' . $recruitmentCountry->image) }}" alt="{{ $recruitmentCountry->name }}" class="img-thumbnail mt-2" width="150">
          @endif
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" required>{{ $recruitmentCountry->description }}</textarea>
        </div>

        <div class="mb-3">
          <label for="price">Price</label>
          <input type="number" step="0.01" class="form-control" id="price" name="price" value="{{ $recruitmentCountry->price }}" required>
        </div>

        <div class="mb-3">
          <label for="phone_number">Phone Number</label>
          <input type="text" name="phone_number" class="form-control" id="phone_number" value="{{ $recruitmentCountry->phone_number }}">
        </div>

        <div class="mb-3">
            <label for="is_active" class="form-label">Status</label>
            <select class="form-control" id="is_active" name="is_active">
                <option value="1" {{ $recruitmentCountry->is_active ? 'selected' : '' }}>Active</option>
                <option value="0" {{ !$recruitmentCountry->is_active ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Recruitment Country</button>
    </form>
</div>
@endsection