@extends('user.layouts.master')

@section('main_content')
    <div class="container">
        <div class="col-lg-4 col-md-6">
            <h1>{{ $recruitmentCountry->name }}</h1>
            <img src="{{ asset('storage/' . $recruitmentCountry->image) }}" class="img-fluid mb-3" alt="{{ $recruitmentCountry->name }}">
            <p><strong>Description:</strong> {{ $recruitmentCountry->description }}</p>
            <p><strong>Price:</strong> {{ $recruitmentCountry->price }} Riyal</p>
            <p><strong>Phone Number:</strong> {{ $recruitmentCountry->phone_number }}</p>
            <p><strong>Status:</strong> {{ $recruitmentCountry->active ? 'Active' : 'Inactive' }}</p>
            <a href="{{ route('recruitmentCountries.index') }}" class="btn btn-secondary">Back to List</a>
            <a href="{{ route('recruitmentCountries.edit', $recruitmentCountry->id) }}" class="btn btn-warning">Edit</a>
        </div>
    </div>
@endsection
