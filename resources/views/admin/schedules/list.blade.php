@extends('admin.layout.index')
@section('css')
    #time + span {
    padding-right: 30px;
    }

    #time:invalid + span::after {
    position: absolute;
    content: "✖";
    padding-left: 5px;
    }

    #time:valid + span::after {
    position: absolute;
    content: "✓";
    padding-left: 5px;
    }
@endsection
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
                                            <span class="input-group-text bg-gray-200"> @lang('lang.theater')</span>
                                            <select id="theater" class="form-select ps-2" name="theater" aria-label="">
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
                                            <span class="input-group-text bg-gray-200"> @lang('lang.show_date')</span>
                                            <input class="form-control ps-2" type="date" name="date" value="{{ date("Y-m-d") }}" aria-label="">
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <button type="submit" class="btn btn-primary">@lang('lang.submit')</button>
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
                                    <thead class="table-primary">
                                    <tr>
                                        <th class="text-uppercase font-weight-bolder">Id</th>
                                        <th class="text-uppercase font-weight-bolder"> @lang('lang.room')</th>
                                        <th class="text-uppercase font-weight-bolder"> @lang('lang.room_type')</th>
                                        <th class="text-uppercase font-weight-bolder"> @lang('lang.seat')</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @isset($theater_cur)
                                        @foreach($theater_cur->rooms as $room)
                                            <tr>
                                                <td>
                                                    {{ $room->id }}
                                                </td>
                                                <td>
                                                    {{ $room->name }}
                                                </td>
                                                <td>
                                                    {{ $room->roomType->name }}
                                                </td>
                                                <td>
                                                    {{ $room->seats->count() }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="4">
                                                    <table class="table table-bordered align-items-center">
                                                        <colgroup>
                                                            <col span="1" style="width: 20%;">
                                                            <col span="1" style="width: 80%;">
                                                        </colgroup>
                                                        <thead>
                                                        <tr>
                                                            <th class="text-uppercase fw-bold">@lang('lang.time')</th>
                                                            <th class="text-uppercase fw-bold text-start">@lang('lang.movies')</th>
                                                            <th class="text-uppercase fw-bold">@lang('lang.early_screening')</th>
                                                            <th class="text-uppercase fw-bold">@lang('lang.status')</th>
                                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
                                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($room->schedulesByDate(date('Y-m-d', strtotime($date_cur))) as $schedule)
                                                            <tr>
                                                                <td>
                                                                    {{ date('H:i', strtotime($schedule->startTime)) }}
                                                                    - {{ date('H:i', strtotime($schedule->endTime)) }}
                                                                </td>
                                                                <td class="text-start">
                                                                    {{ $schedule->movie->name }}
                                                                </td>
                                                                <td id="early_status{!! $schedule['id'] !!}" class="align-middle text-center text-sm ">
                                                                    @if($schedule->early == 1)
                                                                        <a href="javascript:void(0)" class="btn_active"  onclick="changeearlystatus({!! $schedule['id'] !!},0)">
                                                                            <span class="badge badge-sm bg-gradient-success">Online</span>
                                                                        </a>
                                                                    @else
                                                                        <a href="javascript:void(0)" class="btn_active"  onclick="changeearlystatus({!! $schedule['id'] !!},1)">
                                                                            <span class="badge badge-sm bg-gradient-secondary">Offline</span>
                                                                        </a>
                                                                    @endif
                                                                </td>
                                                                <td id="status{!! $schedule['id'] !!}" class="align-middle text-center text-sm ">
                                                                    @if($schedule->status == 1)
                                                                        <a href="javascript:void(0)" class="btn_active"  onclick="changestatus({!! $schedule['id'] !!},0)">
                                                                            <span class="badge badge-sm bg-gradient-success">Online</span>
                                                                        </a>
                                                                    @else
                                                                        <a href="javascript:void(0)" class="btn_active"  onclick="changestatus({!! $schedule['id'] !!},1)">
                                                                            <span class="badge badge-sm bg-gradient-secondary">Offline</span>
                                                                        </a>
                                                                    @endif
                                                                </td>
                                                                <td class="align-middle">
                                                                    <a href="#editSchedule" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                                                                       data-original-title="Edit schedule" data-bs-target="#editSchedule{!! $schedule['id'] !!}"
                                                                       data-bs-toggle="modal">
                                                                        <i class="fa-solid fa-pen-to-square fa-lg"></i>
                                                                    </a>
                                                                </td>
                                                                <td class="align-middle">
                                                                    <a href="javascript:void(0)" data-url="{{ url('admin/schedule/delete', $schedule['id'] ) }}"
                                                                       class="text-secondary font-weight-bold text-xs delete-schedule" data-toggle="tooltip">
                                                                        <i class="fa-solid fa-trash-can fa-lg"></i>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        @endforeach

                                                        </tbody>

                                                    </table>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <button class="btn btn-info" data-bs-toggle="modal"
                                                            data-bs-target="#CreateScheduleModal_{{ $room->id }}"><i
                                                            class="fa-regular
                                                                fa-circle-plus"></i>  @lang('lang.add')
                                                    </button>
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
            @include('admin.schedules.create')
            @include('admin.schedules.edit')
        @endforeach
    @else
        <h1 align="center">Permissions Deny</h1>
    @endcan
@endsection
@section('scripts')
    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('.delete-schedule').on('click', function () {
                var userURL = $(this).data('url');
                var trObj = $(this);
                if (confirm("Are you sure you want to remove it?") == true) {
                    $.ajax({
                        url: userURL,
                        type: 'DELETE',
                        dataType: 'json',
                        success: function (data) {
                            if (data['success']) {
                                // alert(data.success);
                                trObj.parents("tr").remove();
                            } else if (data['error']) {
                                alert(data.error);
                            }
                        }
                    });
                }

            });
        });
    </script>
    <script>
        function changestatus(schedule_id,active){
            if(active === 1){
                $("#status" + schedule_id).html(' <a href="javascript:void(0)"  class="btn_active" onclick="changestatus('+ schedule_id +',0)">\
                    <span class="badge badge-sm bg-gradient-success">Online</span>\
            </a>')
            }else{
                $("#status" + schedule_id).html(' <a  href="javascript:void(0)" class="btn_active"  onclick="changestatus('+ schedule_id +',1)">\
                    <span class="badge badge-sm bg-gradient-secondary">Offline</span>\
            </a>')
            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "/admin/schedule/status",
                type: 'GET',
                dataType: 'json',
                data: {
                    'active': active,
                    'schedule_id': schedule_id
                },
                success: function (data) {
                    if (data['success']) {
                        // alert(data.success);
                    } else if (data['error']) {
                        alert(data.error);
                    }
                }
            });
        }
    </script>
    <script>
        function changeearlystatus(early_id,active){
            if(active === 1){
                $("#early_status" + early_id).html(' <a href="javascript:void(0)"  class="btn_active" onclick="changeearlystatus('+ early_id +',0)">\
                    <span class="badge badge-sm bg-gradient-success">Online</span>\
            </a>')
            }else{
                $("#early_status" + early_id).html(' <a  href="javascript:void(0)" class="btn_active"  onclick="changeearlystatus('+ early_id +',1)">\
                    <span class="badge badge-sm bg-gradient-secondary">Offline</span>\
            </a>')
            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "/admin/schedule/early_status",
                type: 'GET',
                dataType: 'json',
                data: {
                    'active': active,
                    'early_id': early_id
                },
                success: function (data) {
                    if (data['success']) {
                        // alert(data.success);
                    } else if (data['error']) {
                        alert(data.error);
                    }
                }
            });
        }
    </script>
@endsection
