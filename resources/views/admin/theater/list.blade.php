@extends('admin.layout.index')
@section('content')
    @can('list theater')
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>Cinema</h6>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <a
                                    style="float:right;padding-right:30px;"
                                    class="text-light">
                                    <button
                                        class=" btn btn-primary float-right mb-3">
                                        Create
                                    </button>
                                </a>
                                <table class="table align-items-center mb-0 ">
                                    <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">
                                            Name
                                        </th>
                                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">
                                            Address
                                        </th>
                                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">
                                            Room
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Status
                                        </th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($theaters as $theater)
                                        <tr>
                                            <td class="align-middle text-center">
                                                <h6 class="mb-0 text-sm ">{{ $theater->name }}</h6>
                                            </td>
                                            <td class="align-middle text-center">
                                                <h6 class="mb-0 text-sm ">{{ $theater->address }}
                                                    , {{ $theater->city }}</h6>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary font-weight-bold">{{ count($theater->rooms) }}</span>
                                            </td>
                                            <td id="theater_status{!! $theater['id'] !!}" class="align-middle text-center text-sm">
                                                @if($theater->status == 1)
                                                        <a href="javascript:void(0)" class="btn_active"  onclick="theaterstatus({!! $theater['id'] !!},0)">
                                                            <span class="badge badge-sm bg-gradient-success">Online</span>
                                                        </a>
                                                @else
                                                    <a href="javascript:void(0)" class="btn_active"  onclick="theaterstatus({!! $theater['id'] !!},1)">
                                                        <span class="badge badge-sm bg-gradient-secondary">Offline</span>
                                                    </a>
                                                @endif
                                            </td>
                                            <td class="align-middle">
                                                <button class="btn" data-bs-toggle="modal" data-bs-target="#TheaterEditModal{{ $theater->id }}">
                                                    <i class="fa-solid fa-pen-to-square fa-lg"></i>
                                                </button>
                                                @include('admin.theater.edit')
                                            </td>
                                            <td class="align-middle">
                                                <a href="javascript:;"
                                                   class="text-secondary font-weight-bold text-xs"
                                                   data-toggle="tooltip"
                                                   data-original-title="Edit user">
                                                    <i class="fa-solid fa-trash-can fa-lg"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @foreach($theater->rooms as $room)
                                            @include('admin.room.edit')
                                        @endforeach
                                    @endforeach
                                    @include('admin.theater.create')

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
    <script>
        function theaterstatus(theater_id,active){
            if(active === 1){
                $("#theater_status" + theater_id).html(' <a href="javascript:void(0)"  class="btn_active" onclick="theaterstatus('+ theater_id +',0)">\
                    <span class="badge badge-sm bg-gradient-success">Online</span>\
            </a>')
                console.log(theater_id + active);
            }else{
                $("#theater_status" + theater_id).html(' <a  href="javascript:void(0)" class="btn_active"  onclick="theaterstatus('+ theater_id +',1)">\
                    <span class="badge badge-sm bg-gradient-secondary">Offline</span>\
            </a>')
            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "/admin/theater/status",
                type: 'GET',
                dataType: 'json',
                data: {
                    'active': active,
                    'theater_id': theater_id
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
{{--    <script>--}}
{{--        $(document).ready(() => {--}}
{{--            var row = "";--}}
{{--            var value = 0;--}}
{{--            var bgColor = "";--}}
{{--            $.ajaxSetup({--}}
{{--                headers: {--}}
{{--                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
{{--                }--}}
{{--            });--}}
{{--            $(".flex-fill .seat_row_btn").on("click", function () {--}}
{{--                row = $(this).text();--}}
{{--            });--}}
{{--            $(".seat_type_radio").on("click", function () {--}}
{{--                value = $(this).val();--}}
{{--                bgColor = $(".seat_color_" + value).css("background-color").toString();--}}
{{--            });--}}
{{--            $(".seat_color_submit").on("click", function () {--}}
{{--                $(".seat_input_row_" + row).attr("value", value);--}}
{{--                $(".seat_at_row_" + row).css("background-color", bgColor);--}}
{{--            })--}}

{{--            var finalCol = {--}}
{{--                @forEach($final_col as $key => $value)--}}
{{--                    {{$key}} : {{ $value }},--}}
{{--                @endforeach--}}
{{--            };--}}
{{--            var finalRow = {{ $final_row }}--}}
{{--            $(".seat_col_add_btn").on("click", function () {--}}
{{--                row = $(this).text().trim();--}}
{{--                room = $('.seat_room').val();--}}
{{--                finalCol[row] += 1;--}}
{{--                $("#seat_form_" + room).ajaxSubmit({url: 'admin/seat/create', type: 'post'})--}}
{{--                $seatHtml = '<div class="d-block border border-1 border-dark text-center m-1 seat_at_row_'--}}
{{--                    + row + '" style="background-color:#fff0c7; width: 30px; height: 30px; font-size: 10px; line-height: 30px">'--}}
{{--                    + row + finalCol[row]--}}
{{--                    + '<input type="number" class="d-none seat_input_row_' + row + '" name="col"\--}}
{{--                    value="' + finalCol[row] + '" aria-label="">\--}}
{{--                    <input type="hidden" name="room" value="' + room + '">\--}}
{{--                    <input type="hidden" name="row" value="' + row + '></div>';--}}

{{--                $(".seats_row_" + row).append($seatHtml);--}}
{{--            });--}}

{{--            $(".seat_row_add_btn").on("click", function () {--}}
{{--                finalRow += 1;--}}
{{--                $seatHtml = '<div class="flex-fill d-flex">\--}}
{{--                                <button type="button"\--}}
{{--                                    class="flex-shrink-0 btn rounded-0 fw-bold text-center border border-1 border-dark m-1 p-1 seat_row_btn"\--}}
{{--                                    style="width: 30px; height: 30px; font-size: 10px"\--}}
{{--                                    data-bs-toggle="offcanvas"\--}}
{{--                                    data-bs-target="#EditSeatRow" aria-controls="EditSeatRow">' + String.fromCharCode(finalRow) + '</button>\--}}
{{--                                <div class="offcanvas offcanvas-start" tabindex="-1" id="EditSeatRow" aria-labelledby="EditSeatRowLabel">\--}}
{{--                                    <div class="offcanvas-header">\--}}
{{--                                        <h5 class="offcanvas-title" id="EditSeatRowLabel">Edit Seat Row</h5>\--}}
{{--                                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>\--}}
{{--                                    </div>\--}}
{{--                                     <div class="offcanvas-body">\--}}
{{--                                         @foreach($seatTypes as $seatType)--}}
{{--                    <div class="form-check">\--}}
{{--                        <input class="form-check-input seat_type_radio" type="radio" name="seatColorRadio"\--}}
{{--                               id="{{ $seatType->name }}" value="{{ $seatType->id }}">\--}}
{{--                                                <label class="form-check-label flex-fill d-flex border-0 ps-1 my-2" for="{{ $seatType->name }}">\--}}
{{--                                                <span class="fw-bold d-block text-center me-1 seat_color_{{ $seatType->id }}"\--}}
{{--                                                    style="width: 20px; height: 20px; background-color: {{ $seatType->color }};"></span>\--}}
{{--                                                <span style="line-height: 20px">{{ $seatType->name }} - {{ $seatType->price }}</span>\--}}
{{--                                                </label>\--}}
{{--                                         </div>\--}}
{{--                                        @endforeach--}}
{{--                    <button type="button" class="btn btn-primary seat_color_btn mt-4 seat_color_submit"\--}}
{{--                            data-bs-dismiss="offcanvas">Confirm\--}}
{{--                    </button>\--}}
{{--                </div>\--}}
{{--            </div>\--}}
{{--            <div class="flex-grow-1 d-flex">\--}}
{{--                <div class="flex-shrink-0"></div>\--}}
{{--                <div class="flex-grow-1 d-flex justify-content-center seats_row_' + String.fromCharCode(finalRow) + '">\--}}
{{--                                    </div>\--}}
{{--                                    <div class="flex-shrink-0">\--}}
{{--                                        <button type="submit"\--}}
{{--                                                class="btn rounded-0 fw-bold border border-1 border-dark m-1 p-1 seat_col_add_btn"\--}}
{{--                                                style="width: 30px; height: 30px; font-size: 10px">\--}}
{{--                                            <p class=" visually-hidden">' + String.fromCharCode(finalRow) + '</p>\--}}
{{--                                            <i class="fa-solid fa-plus"></i>\--}}
{{--                                        </button>\--}}
{{--                                    </div>\--}}
{{--                                </div>\--}}
{{--                            </div>';--}}
{{--                $(".seats").append($seatHtml);--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}
@endsection



