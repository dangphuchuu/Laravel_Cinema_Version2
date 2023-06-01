@extends('admin.layout.index')
@section('content')
    @can('schedule_movie')
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>@lang('lang.schedule')</h6>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="row row-cols-2 container">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="theater">Theater</label>
                                        <select id="theater" class="form-control"></select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="date">Date</label>
                                        <input id="date" class="form-control" type="date">
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table align-items-center mb-0 overflow-y-auto">
                                    <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary font-weight-bolder opacity-7">Room</th>
                                        <th class="text-uppercase text-secondary font-weight-bolder opacity-7 ps-2">Time</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @else
                <h1 align="center">Permissions Deny</h1>
    @endcan
@endsection
