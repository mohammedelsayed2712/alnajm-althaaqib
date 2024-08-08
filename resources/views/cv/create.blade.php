@extends('user.layouts.master')
@section('main_content')
    <div class="container">
        <h1>Add New CV</h1>
        <form action="{{ route('cvs.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="photo">CV:</label>
                <input type="file" class="form-control" name="photo">
            </div>

            <div>
                <label for="country_id">Country:</label>
                <select name="country_id" id="country_id" class="form-control">
                    @foreach($countries as $country)
                        <option value="{{ $country->id }}" >{{ $country->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="salary">Salary:</label>
                <input type="number" class="form-control" name="salary">
            </div>

            <div>
                <label for="status_id">Status:</label>
                <select name="status_id" id="status_id" class="form-control">
                    @foreach($statuses as $status)
                        <option value="{{ $status->id }}" >{{ $status->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="job_id">Job:</label>
                <select name="job_id" id="job_id" class="form-control">
                    @foreach($jobs as $job)
                        <option value="{{ $job->id }}" >{{ $job->title }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="religion_id">Religion:</label>
                <select name="religion_id" id="religion_id" class="form-control">
                    @foreach($religions as $religion)
                        <option value="{{ $religion->id }}" >{{ $religion->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="experience_id">Experience:</label>
                <select name="experience_id" id="experience_id" class="form-control">
                    @foreach($experiences as $experience)
                        <option value="{{ $experience->id }}" >{{ $experience->level }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-success">Save</button>
        </form>
    </div>
@endsection

