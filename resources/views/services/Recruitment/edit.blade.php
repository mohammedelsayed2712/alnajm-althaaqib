@extends('user.layouts.master')

@section('main_content')
<div class="container">
    <h1>Edit Service</h1>

    <form action="{{ route('recruitment.update', $serviceRecruitmentCard->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $serviceRecruitmentCard->title }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" required>{{ $serviceRecruitmentCard->description }}</textarea>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control" id="image" name="image" value="{{ $serviceRecruitmentCard->image }}">
            @if($serviceRecruitmentCard->image)
                <img src="{{ asset('storage/' . $serviceRecruitmentCard->image) }}" alt="{{ $serviceRecruitmentCard->title }}" class="img-thumbnail mt-2" width="150">
            @endif
        </div>

        <div class="mb-3">
            <label for="is_active" class="form-label">Status</label>
            <select class="form-control" id="is_active" name="is_active">
                <option value="1" {{ $serviceRecruitmentCard->is_active ? 'selected' : '' }}>Active</option>
                <option value="0" {{ !$serviceRecruitmentCard->is_active ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Service</button>
    </form>
</div>
@endsection
