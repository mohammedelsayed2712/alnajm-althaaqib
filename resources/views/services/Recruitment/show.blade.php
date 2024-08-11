@extends('user.layouts.master')

@section('main_content')
<div class="container">
    <h1>{{ $serviceRecruitmentCard->title }}</h1>

    <div class="card mb-4">
        <img src="{{ asset('storage/' . $service->image) }}" class="card-img-top" alt="{{ $service->title }}">
        <div class="card-body">
            <h5 class="card-title">{{ $serviceRecruitmentCard->title }}</h5>
            <p class="card-text">{{ $serviceRecruitmentCard->description }}</p>
            <p class="card-text"><small class="text-muted">{{ $serviceRecruitmentCard->is_active ? 'Active' : 'Inactive' }}</small></p>
            <a href="{{ route('services.edit', $serviceRecruitmentCard->id) }}" class="btn btn-primary">Edit</a>
            <form action="{{ route('services.destroy', $serviceRecruitmentCard->id) }}" method="POST" style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>

    <a href="{{ route('recruitment.index') }}" class="btn btn-secondary">Back to Services</a>
</div>
@endsection
