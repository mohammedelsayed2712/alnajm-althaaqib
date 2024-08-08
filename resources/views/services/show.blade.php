
@extends('user.layouts.master')

@section('main_content')
<div class="container"><br>
    <p><strong>Image:

        <img src="{{ asset('images/'.$services->img) }}" width="100" />

    </strong> {{ $services->img }} </p>
            <p><strong>Title:</strong> {{ $services->title }}</p>
            <p><strong>Description: </strong> {{ $services->desc }}</p>
    <a href="{{ route('services.index') }}" class="btn btn-primary">Back to Home</a>
</div>
@endsection
