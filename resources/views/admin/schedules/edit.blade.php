@extends('admin.layout.index')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <p class="mb-0">Schedule Movies</p>
                        <button class="btn btn-warning btn-sm ms-auto">Submit</button>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-uppercase text-sm">Edit</p>
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Cinema </label>
                                <input class="form-control" type="text" value="" placeholder="Cinema's Name">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Room's Name</label>
                                <input class="form-control" type="text" value="" placeholder="Room's Name">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Format</label>
                                <input class="form-control" type="text" value="" placeholder="format">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Movie</label>
                                <input class="form-control" type="text" value="" placeholder="Movie's Name">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Time</label>
                                <input class="form-control" type="date" value="">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group ">
                                <label for="example-text-input" class="form-control-label">Language</label>
                                <select name="cat_id" class="form-control form-control-primary">
                                    <option value="">Lồng tiếng</option>
                                    <option value="">Phụ đề việt</option>
                                    <option value="">Phụ đề anh</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection