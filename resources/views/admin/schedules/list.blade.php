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
                            <form action="admin/schedule" method="get">
                                <div class="row container">
                                    <div class="col-5">
                                        <div class="input-group">
                                            <span class="input-group-text bg-gray-200">Theater</span>
                                            <select id="theater" class="form-control ps-2" name="theater" aria-label="">
                                                @foreach($theaters as $theater)
                                                    <option value="{{ $theater->id }}" @if($theater == $theater_cur) selected @endif>
                                                        {{ $theater->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-5">
                                        <div class="input-group">
                                            <span class="input-group-text bg-gray-200">Date</span>
                                            <input class="form-control ps-2" type="date" name="date" value="{{ date("Y-m-d") }}" aria-label="">
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                                    </div>
                                </div>
                            </form>
                            <div class="table-responsive m-2">
                                <table class="table table-bordered table-striped align-items-center text-center">
                                    <colgroup>
                                        <col span="1" style="width: 10%;">
                                        <col span="1" style="width: 30%;">
                                        <col span="1" style="width: 30%;">
                                        <col span="1" style="width: 30%;">
                                    </colgroup>
                                    <thead>
                                    <tr>
                                        <th class="text-uppercase font-weight-bolder">#</th>
                                        <th class="text-uppercase font-weight-bolder">Room</th>
                                        <th class="text-uppercase font-weight-bolder">Room Type</th>
                                        <th class="text-uppercase font-weight-bolder">Seats</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @isset($theater_cur)
                                        @foreach($theater_cur->rooms as $room)
                                            <tr>
                                                <td class="p-3">
                                                    {{ $room->id }}
                                                </td>
                                                <td class="ps-2 table-responsive">
                                                    {{ $room->name }}
                                                </td>
                                                <td>
                                                    {{ $room->roomType->name }}
                                                </td>
                                                <td>
                                                    {{ count($room->seats) }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="4">
                                                    <table class="table align-items-center">
                                                        <colgroup>
                                                            <col span="1" style="width: 20%;">
                                                            <col span="1" style="width: 80%;">
                                                        </colgroup>
                                                        <thead>
                                                        <tr>
                                                            <th class="text-uppercase fw-bold">Time</th>
                                                            <th class="text-uppercase fw-bold text-start">Movie</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @for($i = 0; $i < 8; $i++)
                                                            <tr>
                                                                <td>
                                                                    0{{ $i }} : 00
                                                                </td>
                                                                <td class="text-start">
                                                                    An item
                                                                </td>
                                                            </tr>

                                                        @endfor
                                                        <tr>
                                                            <td>
                                                                <button class="btn btn-info" data-bs-toggle="modal"
                                                                        data-bs-target="#CreateScheduleModal_{{ $room->id }}"><i
                                                                        class="fa-regular
                                                                fa-circle-plus"></i> THÊM
                                                                </button>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endisset
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @foreach($theater_cur->rooms as $room)
            @required('admin.schedules.create')
        @endforeach
    @else
        <h1 align="center">Permissions Deny</h1>
    @endcan
@endsection
@section('scripts')
@endsection
