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
                                <table class="table table-bordered align-items-center mb-0">
                                    <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary font-weight-bolder opacity-7 pe-2">Room</th>
                                        <th class="text-uppercase text-secondary font-weight-bolder opacity-7 ps-2">Time</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @isset($theater_cur)
                                        @foreach($theater_cur->rooms as $room)
                                            <tr>
                                                <td class="p-3">
                                                    {{ $room->name }}
                                                </td>
                                                <td class="font-weight-bolder ps-2  w-100 overflow-x-auto">
                                                    <div class="d-flex align-items-stretch">
                                                        @for($i = 0; $i < 8; $i++)
                                                            <div class="card m-1" style="width: 200px">
                                                                <div class="card-header border-bottom">
                                                                    0{{ $i }} : 00
                                                                </div>
                                                                <ul class="list-group list-group-flush">
                                                                    <li class="list-group-item">An item</li>
                                                                </ul>
                                                            </div>
                                                        @endfor
                                                    </div>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn">
                                                        thêm lịch
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
    @else
        <h1 align="center">Permissions Deny</h1>
    @endcan
@endsection
@section('scripts')
@endsection
