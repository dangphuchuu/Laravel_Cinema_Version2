@extends('admin.layout.index')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <p class="mb-0">Banners</p>
                        <button class="btn btn-primary btn-sm ms-auto">Submit</button>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-uppercase text-sm">Create</p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Image</label>
                                <input type='file' name='Image' class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection