@extends('admin.layout.index')
@section('content')
<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <h6>List Movie</h6>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            <a href="admin/list_movie/create" style="float:right;padding-right:30px;" class="text-light">
              <button class=" btn btn-primary float-right mb-3">Create</button>
            </a>
            <table class="table align-items-center mb-0 ">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">Movie Genres</th>
                  <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7  ">Image</th>
                  <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">Movie Name</th>
                  <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">Time</th>
                  <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">National</th>
                  <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">Director</th>
                  <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7 ">Release Date</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="align-middle text-center">
                    <h6 class="mb-0 text-sm ">Action</h6>
                  </td>
                  <td class="align-middle text-center">
                    <img style="width: 300px" src="https://vcdn-giaitri.vnecdn.net/2022/12/02/transformers-72-4007-166996346-4557-5406-1669966946.png" alt="user1">
                  </td>
                  <td class="align-middle text-center">
                    <h6 class="mb-0 text-sm ">Transformer</h6>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary font-weight-bold">1:59:10</span>
                  </td>
                  <td class="align-middle text-center">
                    <h6 class="mb-0 text-sm ">United States</h6>
                  </td>
                  <td class="align-middle text-center">
                    <h6 class="mb-0 text-sm ">Steven Caple JR</h6>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary font-weight-bold">23/04/18</span>
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