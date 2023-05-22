@extends('admin.layout.index')
@section('content')
    @can('list statistical')
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>Statistical</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group" style="text-align:center">
                                        <label for="example-text-input" class="form-control-label">Type of time</label>
                                        <select style="width: 70%">
                                            <option value="volvo" selected>Lọc Theo Tuần</option>
                                            <option value="saab">Lọc Theo Tháng</option>
                                            <option value="vw">Lọc Theo Năm</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group" style="text-align:center">
                                        <label for="example-text-input" class="form-control-label">Cinema</label>
                                        <select style="width: 70%">
                                            <option value="volvo" selected>Movie Cinema quận 1</option>
                                            <option value="saab">Movie Cinema Nguyễn trãi</option>
                                            <option value="vw">Movie Cinema Quận 8</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group" style="text-align:center">
                                        <label for="example-text-input" class="form-control-label">Start time</label>
                                        <input class="" style="width:70%" type="date" value="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group" style="text-align:center">
                                        <label for="example-text-input" class="form-control-label">End Time</label>
                                        <input class="" style="width:70%" type="date" value="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0 ">
                                    <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">Time</th>
                                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">Cinema</th>
                                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">Tickets</th>
                                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">ToTal Tickets</th>
                                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">Combo</th>
                                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">ToTal Combo</th>
                                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">Revenue</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="align-middle text-center">
                                            <h6 class="mb-0 text-sm ">1/2023</h6>
                                        </td>
                                        <td class="align-middle text-center">
                                            <h6 class="mb-0 text-sm ">Rạp movie cinema quận 1</h6>
                                        </td>
                                        <td class="align-middle text-center">
                                            <h6 class="mb-0 text-sm ">10.000</h6>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary font-weight-bold">1.200.000 Vnđ</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary font-weight-bold">1000</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary font-weight-bold">12.000.000 Vnđ</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary font-weight-bold">1.212.000.000 Vnđ</span>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <h1 align="center">Permissions Deny</h1>
    @endcan
@endsection
