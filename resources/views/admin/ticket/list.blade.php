@extends('admin.layout.index')
@section('content')
    @can('list ticket')
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>Ticket</h6>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0 ">
                                    <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">Movie's Name</th>
                                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">Format</th>
                                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">Room</th>
                                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">Chair</th>
                                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">Limit Age</th>
                                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">Time</th>
                                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">Date</th>
                                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7  ">QRCode</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="align-middle text-center">
                                            <h6 class="mb-0 text-sm ">Transformer</h6>
                                        </td>
                                        <td class="align-middle text-center">
                                            <h6 class="mb-0 text-sm ">3D</h6>
                                        </td>
                                        <td class="align-middle text-center">
                                            <h6 class="mb-0 text-sm ">phòng 11</h6>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary font-weight-bold">F-5</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary font-weight-bold">18+</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary font-weight-bold">12:00:00</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary font-weight-bold">23/04/18</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <img style="width: 100px"
                                                 src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d0/QR_code_for_mobile_English_Wikipedia.svg/1200px-QR_code_for_mobile_English_Wikipedia.svg.png"
                                                 alt="user1">
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span class="badge badge-sm bg-gradient-success">Online</span>
                                        </td>
                                        <td class="align-middle">
                                            <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                                               data-original-title="Edit user">
                                                Edit
                                            </a>
                                        </td>
                                        <td class="align-middle">
                                            <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                                               data-original-title="Edit user">
                                                Delete
                                            </a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="d-flex justify-content-center mt-3">
                                {{--                                {!! $users->links() !!}--}}
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
