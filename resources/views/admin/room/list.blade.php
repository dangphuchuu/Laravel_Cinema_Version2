@extends('admin.layout.index')
@section('content')
<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <h6>Cinema</h6>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            <a href="admin/cinema/create" style="float:right;padding-right:30px;" class="text-light">
              <button class=" btn btn-primary float-right mb-3">Create</button>
            </a>
            <table class="table align-items-center mb-0 ">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">Cinema</th>
                  <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7  ">Image</th>
                  <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">Address</th>
                  <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">Room</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="align-middle text-center">
                    <h6 class="mb-0 text-sm ">Movie Cinema Cao Lỗ</h6>
                  </td>
                  <td class="align-middle text-center">
                    <img style="width: 300px" src="https://tselighting.com.vn/wp-content/uploads/2021/01/galaxy-2.jpg" alt="user1">
                  </td>
                  <td class="align-middle text-center">
                    <h6 class="mb-0 text-sm ">180 Cao Lỗ</h6>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary font-weight-bold">20</span>
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
                <tr>
                  <td class="align-middle text-center">
                    <h6 class="mb-0 text-sm ">Movie Cinema Quận 1</h6>
                  </td>
                  <td class="align-middle text-center">
                    <img style="width: 300px" src="https://img.theculturetrip.com/wp-content/uploads/2020/01/c745bg.jpg" alt="user1">
                  </td>
                  <td class="align-middle text-center">
                    <h6 class="mb-0 text-sm ">180 Nguyễn Trãi</h6>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary font-weight-bold">20</span>
                  </td>
                  <td class="align-middle text-center text-sm">
                    <span class="badge badge-sm bg-gradient-secondary">Offline</span>
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