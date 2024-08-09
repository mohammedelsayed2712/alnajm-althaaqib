
@extends('user.layouts.master')

@section('main_content')
<div class="container"><br>
    <p><strong>Image:

        <img src="{{ asset('images/'.$communication->img) }}" width="100" />

    </strong> {{ $communication->img }} </p>
            <p><strong>Title: </strong>{{ $communication->title }}</p>
            <p><strong>Description:  </strong> {{ $communication->desc }}</p>
            <p><strong> Icon:

                <img src="{{ asset('icons/'.$communication->icon) }}" width="50" />

            </strong> {{ $communication->icon }} </p>
    <a href="{{ route('communications.index') }}" class="btn btn-primary ">Back to Home</a>
</div>
@endsection
