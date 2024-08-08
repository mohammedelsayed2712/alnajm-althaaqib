@extends('user.layouts.master')
@section('main_content')
    <h1>Countries</h1>

    <a href="{{ route('nationalities.create') }}" class="btn btn-primary" >Add Countries</a>

    @if ($message = Session::get('success'))
        <div>
            <strong>{{ $message }}</strong>
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Status</th>
                <th>Name Countries</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($nationalities as $nationality)
                <tr>
                    <td>{{ $nationality->name }}</td>
                    <td>{{ $nationality->status == 'active' ? 'Active' : 'Inactive' }}</td>
                    <td>{{ $nationality->name_countries }}</td>

                    <td>
                        <img src="{{ asset('storage/' .  $nationality->img) }}" alt=" Photo" class="img-thumbnail mt-2" width="150">
                    </td>


                    <td>
                        <a href="{{ route('nationalities.show', $nationality->id) }}" class="btn btn-info" >View </a>
                        <a href="{{ route('nationalities.edit', $nationality->id) }}"
                            class="btn btn-warning"">Edit</a>
                        <form action="{{ route('nationalities.destroy', $nationality->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
