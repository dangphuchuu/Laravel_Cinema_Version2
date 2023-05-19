@extends('admin.layout.index')
@section('content')
    @can('list user')
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>User Account</h6>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0 ">
                                    <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">Id</th>
                                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">Full Name</th>
                                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">Email</th>
                                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">Phone</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">Created_At</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Updated_At</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $value)
                                        @foreach($value['roles'] as $role)
                                            @if($role['name'] == 'user')
                                                <tr>
                                                    <td class="align-middle text-center">
                                                        <h6 class="mb-0 text-sm ">{!! $value['id'] !!}</h6>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <h6 class="mb-0 text-sm ">{!! $value['fullName'] !!}</h6>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span class="text-secondary font-weight-bold">{!! $value['email'] !!}</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span class="text-secondary font-weight-bold">{!! $value['phone'] !!}</span>
                                                    </td>
                                                    <td class="align-middle text-center text-sm">
                                                        @if($value['status'] == 1)
                                                            <span class="badge badge-sm bg-gradient-success">Online</span>
                                                        @else
                                                            <span class="badge badge-sm bg-gradient-secondary">Offline</span>
                                                        @endif
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span
                                                            class="text-secondary font-weight-bold">{!! date("d-m-Y H:m:s", strtotime($value['created_at'])) !!}</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span
                                                            class="text-secondary font-weight-bold">{!! date("d-m-Y H:m:s", strtotime($value['updated_at'])) !!}</span>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <h1 align="center">Permissions Deny</h1>
    @endcan
@endsection
