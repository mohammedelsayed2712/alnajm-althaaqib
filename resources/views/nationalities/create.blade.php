@extends('user.layouts.master')

@section('main_content')
    <div class="container">
        <h1 >Add New Countries</h1>
        @if ($errors->any())
        <div>
            <strong>Whoops! Something went wrong!</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <form action="{{ route('nationalities.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input class="form-control" type="text" name="name" id="name" value="{{ old('name') }}">
            </div>

            <div>
                <label for="status">Status:</label>
                <select name="status" id="status" class="form-control">
                    <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>
            <br>
            <div class="form-group">
                <label for="name_countries">Name Countries:</label>
                <input type="text" name="name_countries" class="form-control">
            </div>
            <div class="form-group">
                <label for="img">Image:</label>
                <input type="file" name="img" class="form-control">
            </div>
            <br>
            <div>
                <button type="submit" class="btn btn-success">Save</button>
            </div>

        </form>
    </div>
@endsection
