@extends('user.layouts.master')

@section('main_content')
<div class="container">
    <h1>Edit Representative</h1>

    <form action="{{ route('representatives.update', $representative->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $representative->name }}" required>
        </div>

        <div class="mb-3">
          <label for="image" class="form-label">Image</label>
          <input type="file" class="form-control" id="image" name="image" value="{{ $representative->image }}">
          @if($representative->image)
              <img src="{{ asset('storage/' . $representative->image) }}" alt="{{ $representative->title }}" class="img-thumbnail mt-2" width="150">
          @endif
        </div>

        <div class="form-group">
          <label for="whatsapp_number">WhatsApp Number</label>
          <input type="text" name="whatsapp_number" class="form-control" id="whatsapp_number" value="{{ $representative->whatsapp_number }}">
        </div>

        <div class="form-group">
            <label for="phone_number">Phone Number</label>
            <input type="text" name="phone_number" class="form-control" id="phone_number" value="{{ $representative->phone_number }}">
        </div>

        <div class="mb-3">
            <label for="is_active" class="form-label">Status</label>
            <select class="form-control" id="is_active" name="is_active">
                <option value="1" {{ $representative->is_active ? 'selected' : '' }}>Active</option>
                <option value="0" {{ !$representative->is_active ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Service</button>
    </form>
</div>
@endsection