@extends('admin.layout.index')
@section('content')
@can('list staff')
<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <h6>Staff Account</h6>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            <a href="admin/staff/create" style="float:right;padding-right:30px;" class="text-light">
              <button class=" btn btn-primary float-right mb-3">Create</button>
            </a>
            <table class="table align-items-center mb-0 ">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">FullName</th>
                  <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">Email</th>
                  <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">Role</th>
                  <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">Edit Role</th>
                  <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">Edit Permissions</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
                </tr>
              </thead>
              <tbody>
                @foreach($staff as $value)
                @foreach($value['roles'] as $role)
                @if($role['name'] == 'admin' || $role['name'] == 'staff')
                <tr>
                  <td class="align-middle text-center">
                    <h6 class="mb-0 text-sm ">{!! $value['fullName'] !!}</h6>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary font-weight-bold">{!! $value['email'] !!}</span>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary font-weight-bold"> {!! $role['name'] !!}</span>
                  </td>
                  <td class="align-middle text-center">
                    <button class="btn btn-warning">Role</button>
                  </td>
                  <td class="align-middle text-center">
                    <button class="btn btn-danger">Permiss</button>
                  </td>
                  <td class="align-middle text-center text-sm">
                    @if($value['status'] == 1)
                    <span class="badge badge-sm bg-gradient-success">Online</span>
                    @else
                    <span class="badge badge-sm bg-gradient-secondary">Offline</span>
                    @endif
                  </td>
                  <td class="align-middle">
                    <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                      Delete
                    </a>
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