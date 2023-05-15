@extends('admin.layout.index')
@section('content')
<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <h6>Schedule</h6>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            <a href="admin/schedule/create" style="float:right;padding-right:30px;" class="text-light">
              <button class=" btn btn-primary float-right mb-3">Create</button>
            </a>
            <table class="table align-items-center mb-0 ">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">Cinema</th>
                  <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7  ">Room's Name</th>
                  <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">Movie</th>
                  <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">Format</th>
                  <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">Date</th>
                  <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">Time</th>
                  <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">Language</th>
                  <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">Subtitle</th>
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
                    <h6 class="mb-0 text-sm ">Phòng số 11</h6>
                  </td>
                  <td class="align-middle text-center">
                    <h6 class="mb-0 text-sm ">Transformer</h6>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary font-weight-bold">3D</span>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary font-weight-bold">26/4/2023</span>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary font-weight-bold">15:00:00</span>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary font-weight-bold">Lồng tiếng</span>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary font-weight-bold">Phụ đề</span>
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