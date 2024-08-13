
@extends('user.layouts.master')

@section('main_content')
<div class="container"><br>
    <p><strong>Image:

        <img src="{{ asset('storage/'.$nationality->img) }}" width="100" />

    </strong> {{ $nationality->img }} </p>
            <p><strong>Name: </strong>{{ $nationality->name }}</p>
            <p><strong>Text:  </strong> {{ $nationality->text }}</p>
            <p><strong>Price:  </strong> {{ $nationality->price }}</p>
            <p><strong> Icon:

                <img src="{{ asset('storage/'.$nationality->icon) }}" width="50" />

            </strong> {{ $nationality->icon }} </p>
    <a href="{{ route('nationality.index') }}" class="btn btn-primary ">Back to Home</a>
</div>
@endsection
