@extends('user.layouts.master')

@section('main_content')
<div class="container">
    <h1>{{ $representative->name }}</h1>

    <div class="card mb-4">
        <img src="{{ asset('storage/' . $representative->image) }}" class="card-img-top" alt="{{ $representative->name }}">
        <div class="card-body">
            <h5 class="card-title">{{ $representative->title }}</h5>
            <p class="card-text">{{ $representative->description }}</p>
            <p class="card-text"><small class="text-muted">{{ $representative->is_active ? 'Active' : 'Inactive' }}</small></p>
            <a href="{{ route('sales.edit', $representative->id) }}" class="btn btn-primary">Edit</a>
            <form action="{{ route('sales.destroy', $representative->id) }}" method="POST" style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>

    <a href="{{ route('sales.index') }}" class="btn btn-secondary">Back to Customer Service Representatives</a>
</div>
@endsection
