@extends('user.layouts.master')

@section('main_content')
    <div class="row">
        <div class="col-md-12">
            <h1>Add Statistic</h1>
            <a href="{{ route('statistics.create') }}" class="btn btn-primary">Add New Statistic</a>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Icon</th>
                        <th>Value</th>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($statistics as $statistic)
                        <tr>
                            <td><i class="{{ $statistic->icon }}" style="font-size: 50px;"></i></td>
                            <td><h2>{{ $statistic->value }}</h2></td>
                            <td><p>{{ $statistic->title }}</p></td>
                            <td>{{ $statistic->is_active ? 'Active' : 'Inactive' }}</td>
                            <td>
                                <a href="{{ route('statistics.edit', $statistic->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('statistics.destroy', $statistic->id) }}" method="POST" style="display:inline-block;">
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