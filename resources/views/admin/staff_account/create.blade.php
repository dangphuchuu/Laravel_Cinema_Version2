@extends('admin.layout.index')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <p class="mb-0">Staff Account</p>
                        <button class="btn btn-primary btn-sm ms-auto">Submit</button>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-uppercase text-sm">Create</p>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">First Name </label>
                                <input class="form-control" type="text" value="" placeholder="First Name">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Last Name</label>
                                <input class="form-control" type="text" value="" placeholder="Last Name">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Phone</label>
                                <input class="form-control" type="number" value="" placeholder="Phone">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Email</label>
                                <input class="form-control" type="email" value="" placeholder="Email">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Username</label>
                                <input class="form-control" type="text" value="" placeholder="Username">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">Password</label>
                                <input class="form-control" type="password" value="" placeholder="Password">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="example-text-input" class="form-control-label">RePassword</label>
                                <input class="form-control" type="password" value="" placeholder="RePassword">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection