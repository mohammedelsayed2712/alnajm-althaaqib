
@extends('user.layouts.master')

@section('main_content')
<div class="container">
    <h1>CVs</h1>
    <a href="{{ route('cvs.create') }}" class="btn btn-primary">Create New CV</a>
    <table class="table">
        <thead>
            <tr>
                <th>Job</th>
                <th>Religion</th>
                <th>Status</th>
                <th>Country</th>
                <th>Experience</th>
                <th>Salary</th>
                <th>CV</th>
                <th>Operations</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cvs as $cv)
            <tr>
                <td>{{ $cv->job->title }}</td>
                <td>{{ $cv->religion->name }}</td>
                <td>{{ $cv->status->name }}</td>
                <td>{{ $cv->country->name }}</td>
                <td>{{ $cv->experience->level }}</td>
                <td>{{ $cv->salary }} ريال</td>
                <td>
                    <img src="{{ asset('storage/' . $cv->photo) }}" alt="CV Photo" class="img-thumbnail mt-2" width="150">
                </td>
                
                <td>
                    <a href="{{ route('cvs.show', $cv) }}" class="btn btn-info">View</a>
                    <a href="{{ route('cvs.edit', $cv) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('cvs.destroy', $cv) }}" method="POST" style="display:inline-block;">
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
@endsection
