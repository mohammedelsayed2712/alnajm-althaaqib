@extends('user.layouts.master')

@section('main_content')
<div class="container">
    <h1>View Photo</h1>
    <div class="col-lg-4 col-md-6">
        <div class="card mb-4">
            <img src="{{ asset('storage/' . $paginate->image_path) }}" class="w-100 mt-2" width="150" alt="CV Image">
            <div class="d-flex justify-content-center m-auto gap-2 flex-wrap">
                <div class="mt-3">
                    <a href="{{ asset('storage/' . $paginate->image_path) }}" class="btn btn-success" download>Download Photo</a>
                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#photoModal">
                        View Photo
                    </button>
                </div>
        
                <a href="{{ route('paginates.index') }}" class="btn btn-primary mt-2">Back to List</a>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="photoModal" tabindex="-1" aria-labelledby="photoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="photoModalLabel">Photo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img src="{{ asset('storage/' . $paginate->image_path) }}" class="img-fluid" alt="Image">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection
