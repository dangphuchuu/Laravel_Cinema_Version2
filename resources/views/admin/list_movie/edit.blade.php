@extends('admin.layout.index')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <p class="mb-0">List Movie</p>
                        <button class="btn btn-warning btn-sm ms-auto">Submit</button>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-uppercase text-sm">Edit</p>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Movie Name</label>
                                <input class="form-control" type="text" value="" placeholder="Movie Name">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Movie Genres</label>
                                <input class="form-control" type="email" value="" placeholder="Genres">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Time</label>
                                <input class="form-control" type="text" value="" placeholder="Time">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">National</label>
                                <input class="form-control" type="text" value="" placeholder="National">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Director</label>
                                <input class="form-control" type="text" value="" placeholder="Director's name">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Release Date</label>
                                <input class="form-control" type="date" value="">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">End Date</label>
                                <input class="form-control" type="date" value="">
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Limit Age</label>
                                <input class="form-control" type="text" value="" placeholder="Age">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Image</label>
                                <input type='file' name='Image' class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Trailer</label>
                                <input class="form-control" type="text" value="" placeholder="Trailer">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Actors</label>
                                <textarea class="form-control" value="" placeholder="Actors"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Content</label>
                                <textarea class="form-control" name="content" id="editor" placeholder="Content"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection