@extends('user.layouts.master')

@section('main_content')
    <h1>Edit Countries</h1>

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

    <form action="{{ route('nationalities.update', $nationality->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="name">Name:</label>
            <input class="form-control" type="text" name="name" id="name" value="{{ $nationality->name }}">
        </div>
            <label for="status">Status:</label>
            <select  class="form-control" name="status" id="status">
                <option value="active" {{ $nationality->status == 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ $nationality->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
                <div class="form-group">
                    <label for="description">Description : </label>
                    <textarea class="form-control"  name="description" ></textarea>
                </div>
            <div>
                <label for="name">price :</label>
                <input class="form-control" type="text" name="text" id="name" value="{{ $nationality->price }}">
            </div>

        <div>
            <br>
            <button type="submit" class="btn btn-success">Update</button>
        </div>
    </form>
@endsection
