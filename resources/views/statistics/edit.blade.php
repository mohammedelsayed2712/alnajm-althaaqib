@extends('user.layouts.master')

@section('main_content')
<div class="container">
    <h1>Edit Recruitment Country</h1>

    <form action="{{ route('statistics.update', $statistic->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-3">
          <label for="icon">Icon Class</label>
          <input type="text" name="icon" class="form-control" value="{{ $statistic->icon }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" value="{{ $statistic->title }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="value">Value</label>
            <input type="number" name="value" class="form-control" value="{{ $statistic->value }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="active">Active</label>
            <select name="active" class="form-control">
                <option value="1" {{ $statistic->active ? 'selected' : '' }}>Active</option>
                <option value="0" {{ !$statistic->active ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Statistic</button>
    </form>
</div>
@endsection