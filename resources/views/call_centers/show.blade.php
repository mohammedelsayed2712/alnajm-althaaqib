
@extends('user.layouts.master')

@section('main_content')
<div class="container"><br>
    <p><strong>Image:

        <img src="{{ asset('storage/'.$callCenter->img) }}" width="100" />

    </strong> {{ $callCenter->img }} </p>
            <p><strong>Name : </strong>{{ $callCenter->name }}</p>
            <p><strong> Icon1:

                <img src="{{ asset('storage/'.$callCenter->icon1) }}" width="50" />

            </strong> {{ $callCenter->icon1 }} </p>

            <p><strong> Icon2:

                <img src="{{ asset('storage/'.$callCenter->icon2) }}" width="50" />

            </strong> {{ $callCenter->icon2 }} </p>
    <a href="{{ route('call_centers.index') }}" class="btn btn-primary ">Back to Home</a>
</div>
@endsection

