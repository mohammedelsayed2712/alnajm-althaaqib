@extends('user.layouts.master')

@section('main_content')
    <div class="row">
        <div class="col-md-12">
            <h1>Recruitment Countries</h1>
            <a href="{{ route('recruitmentCountries.create') }}" class="btn btn-primary">Add New Recruitment Country</a>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Price</th>
                        <th>Phone</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($recruitmentCountries as $recruitmentCountry)
                        <tr>
                            <td>{{ $recruitmentCountry->name }}</td>
                            <td><img src="{{ asset('storage/' . $recruitmentCountry->image) }}" width="100"></td>
                            <td>{{ $recruitmentCountry->price }} Riyal</td>
                            {{-- <td>{{ $recruitmentCountry->phone_number }}</td> --}}
                            <td><a href="tel:{{ $recruitmentCountry->phone_number }}" class="btn btn-danger btn-sm">Call Now</a></td>
                            <td>{{ $recruitmentCountry->active ? 'Active' : 'Inactive' }}</td>
                            <td>
                                <a href="{{ route('recruitmentCountries.show', $recruitmentCountry->id) }}" class="btn btn-warning">Show</a>
                                <a href="{{ route('recruitmentCountries.edit', $recruitmentCountry->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('recruitmentCountries.destroy', $recruitmentCountry->id) }}" method="POST" style="display:inline-block;">
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