
@extends('user.layouts.master')

@section('main_content')
<div class="container"><br>
    <p><strong>Name: </strong> {{ $nationality->name }}</p>
            <p><strong>Status:</strong> {{ $nationality->status == 'active' ? 'Active' : 'Inactive' }}</p>
            <p><strong>Name Countries: </strong> {{ $nationality->name_countries }}</p>
    <a href="{{ route('nationalities.index') }}" class="btn btn-primary">Back to Home</a>
</div>
@endsection

