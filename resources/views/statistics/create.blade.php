@extends('user.layouts.master')

@section('main_content')
<div class="container">
    <h1>Create Statistic</h1>

    <form action="{{ route('statistics.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="icon">Icon Class</label>
          <input type="text" name="icon" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="value">Value</label>
            <input type="number" name="value" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="active">Active</label>
            <select name="active" class="form-control">
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Create Statistic</button>
    </form>
</div>
@endsection
