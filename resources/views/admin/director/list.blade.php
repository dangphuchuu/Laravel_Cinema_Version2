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
            <a style="float:right;padding-right:30px;" class="text-light">
              <button class=" btn btn-primary float-right mb-3" data-bs-toggle="modal" data-bs-target="#director">Create</button>
            </a>
            <table class="table align-items-center mb-0 ">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">Name</th>
                  <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">Image</th>
                  <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">Birthday</th>
                  <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">National</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Content</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
                </tr>
              </thead>
              <tbody>
                @foreach($director as $value)
                <tr>
                  <td class="align-middle text-center">
                    <h6 class="mb-0 text-sm ">{!! $value['name'] !!}</h6>
                  </td>
                  <td class="align-middle text-center">
                    <img style="width: 300px" src="{!! $value['image'] !!}" alt="user1">
                  </td>
                  <td class="align-middle text-center">
                    <h6 class="mb-0 text-sm ">{!! $value['birthday'] !!}</h6>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary font-weight-bold">{!! $value['national'] !!}</span>
                  </td>
                  <td class="align-middle text-center text-sm">
                    <span class="mb-0 text-sm">{!! $value['content'] !!}</span>
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
                @include('admin.director.create')
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection