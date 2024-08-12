@extends('user.layouts.master')

@section('main_content')
    <div class="row">
        <div class="col-md-12">
            <h1>Add Requirement</h1>
            <a href="{{ route('requirements.create') }}" class="btn btn-primary">Add New Requirement</a>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Icon</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($requirements as $requirement)
                        <tr>
                            <td>{{ $requirement->title }}</td>
                            <td>{{ $requirement->description }}</td>
                            <td><i class="{{ $requirement->icon }}" style="font-size: 50px;"></i></td>
                            <td>{{ $requirement->is_active ? 'Active' : 'Inactive' }}</td>
                            <td>
                                <a href="{{ route('requirements.edit', $requirement->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('requirements.destroy', $requirement->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection