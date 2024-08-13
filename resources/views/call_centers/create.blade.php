@extends('user.layouts.master')
@section('main_content')
    <h1>Create New CallCenter</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('call_centers.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="img">Image:</label>
            <input type="file" name="img" id="img" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
        </div>

        <div class="form-group">
            <label for="icon1">Icon 1:</label>
            <input type="file" name="icon1" id="icon1" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="icon2">Icon 2:</label>
            <input type="file" name="icon2" id="icon2" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Create Call Center</button>
    </form>
@endsection
