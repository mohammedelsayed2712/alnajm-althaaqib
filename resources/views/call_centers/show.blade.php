
@extends('user.layouts.master')

@section('main_content')
<div class="container"><br>
    <p><strong>Image:

        <img src="{{ asset('images/'.$callCenter->img) }}" width="100" />

    </strong> {{ $callCenter->img }} </p>
            <p><strong>Name : </strong>{{ $callCenter->name }}</p>
            <p><strong> Icon1:

                <img src="{{ asset('icons/'.$callCenter->icon1) }}" width="50" />

            </strong> {{ $callCenter->icon }} </p>

            <p><strong> Icon2:

                <img src="{{ asset('icons/'.$callCenter->icon2) }}" width="50" />

            </strong> {{ $callCenter->icon }} </p>
    <a href="{{ route('call_centers.index') }}" class="btn btn-primary ">Back to Home</a>
</div>
@endsection

