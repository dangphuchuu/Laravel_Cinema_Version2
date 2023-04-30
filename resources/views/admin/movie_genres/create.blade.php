@extends('admin.layout.index')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <p class="mb-0">Movie Genres</p>
                        <button class="btn btn-primary btn-sm ms-auto">Submit</button>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-uppercase text-sm">Create</p>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Genres</label>
                                <input class="form-control" type="text" value="" placeholder="type genres">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection