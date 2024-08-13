@extends('user.layouts.master')


@section('main_content')
    <h1>Call Centers</h1>
    <a href="{{ route('call_centers.create') }}" class="btn btn-primary" > Create New Call Center</a>
    <table class="table" >
        <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Icon 1</th>
                <th>Icon 2</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($callCenters as $callCenter)
                <tr>
                    <td>
                        <img src="{{ asset('images/'.$callCenter->img) }}" width="100" />
                    </td>
                    <td>{{ $callCenter->name }}</td>
                    <td>
                        <img src="{{ asset('icons/' . $callCenter->icon1) }}" alt="Icon 1" width="30">
                    </td>
                    <td>
                        <img src="{{ asset('icons/' . $callCenter->icon2) }}" alt="Icon 2" width="30">
                    </td>
                    <td>

                        <a href="{{ route('call_centers.show', $callCenter) }}" class="btn btn-info">View</a>
                        <a href="{{ route('call_centers.edit', $callCenter) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('call_centers.destroy', $callCenter) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
