@extends('user.layouts.master')
@section('main_content')
<div class="container">
    <h1>Countries</h1>
    <a href="{{ route('nationality.create') }}" class="btn btn-primary" >Create Countries</a>
<table class="table">
    <tbody>
        <tr>
            <th>Image </th>
            <th>Name </th>
            <th>Text </th>
            <th>Price </th>
            <th>Icone </th>
            <th>Actions </th>
        </tr>
        @foreach ($nationalities as $nationality )
        <tr>
            <td>
                <img src="{{ asset('storage/' . $nationality->img) }}" alt=" Photo" class="img-thumbnail mt-2" width="100">
            </td>
            <td>{{ $nationality->name }}</td>
            <td>{{ $nationality->text }}</td>
            <td>{{ $nationality->price }}</td>
            <td><img src="{{ asset('storage/'.$nationality->icon) }}" width="50" /></td>
            <td>
                <a href="{{ route('nationality.show' ,  $nationality) }}" class="btn btn-info">View</a>
                <a href="{{ route('nationality.edit', $nationality) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('nationality.destroy' ,$nationality) }}" method="POST"
                    style= "display: inline; "   >
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
