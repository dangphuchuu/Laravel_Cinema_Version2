@extends('admin.layout.index')
@section('content')
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
                  <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7  ">First Name</th>
                  <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">Last Name</th>
                  <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">Email</th>
                  <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">Created_At</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="align-middle text-center">
                    <h6 class="mb-0 text-sm ">1</h6>
                  </td>
                  <td class="align-middle text-center">
                    <h6 class="mb-0 text-sm ">Phúc Hữu</h6>
                  </td>
                  <td class="align-middle text-center">
                    <h6 class="mb-0 text-sm ">Đặng</h6>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary font-weight-bold">phuchuu0120@gmail.com</span>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary font-weight-bold">26/4/2023</span>
                  </td>
                  <td class="align-middle text-center text-sm">
                    <span class="badge badge-sm bg-gradient-success">Online</span>
                  </td>
                  <td class="align-middle">
                    <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                      Edit
                    </a>
                  </td>
                  <td class="align-middle">
                    <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                      Delete
                    </a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection