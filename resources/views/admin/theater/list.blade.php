@extends('admin.layout.index')

@section('content')
    @can('theater')
        <div class="container-fluid py-4">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                    <span class="alert-text"><strong>Success!</strong> {{ session('success') }}!</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>@lang('lang.theater')</h6>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <a style="float:right;padding-right:30px;" class="text-light">
                                    <button class=" btn btn-primary float-right mb-3" data-bs-toggle="modal" data-bs-target="#theaterCreateModal">
                                        @lang('lang.create')
                                    </button>
                                </a>

                                <table class="table align-items-center mb-0 ">
                                    <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">
                                            @lang('lang.name')
                                        </th>
                                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">
                                            @lang('lang.address')
                                        </th>
                                        <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">
                                            @lang('lang.room')
                                        </th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            @lang('lang.status')
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
                                                    <a href="javascript:void(0)" class="btn_active" onclick="theaterstatus({!! $theater['id'] !!},0)">
                                                        <span class="badge badge-sm bg-gradient-success">Online</span>
                                                    </a>
                                                @else
                                                    <a href="javascript:void(0)" class="btn_active" onclick="theaterstatus({!! $theater['id'] !!},1)">
                                                        <span class="badge badge-sm bg-gradient-secondary">Offline</span>
                                                    </a>
                                                @endif
                                            </td>
                                            <td class="align-middle">
                                                <button class="btn btn-icon btn-warning"
                                                        onclick="editTheater({{ $theater->id }}, '{{ $theater->city }}')"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#TheaterEditModal{{ $theater->id }}">
                                                    <i class="fa-solid fa-pen-to-square fa-lg"></i>
                                                </button>

                                            </td>
                                            <td class="align-middle">
                                                <a href="javascript:;" class="btn btn-icon btn-danger">
                                                    <i class="fa-solid fa-trash-can fa-lg"></i>
                                                </a>
                                            </td>
                                        </tr>

                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('admin.theater.create')
        @foreach($theaters as $theater)
            @include('admin.theater.edit')
            @foreach($theater->rooms as $room)
                @include('admin.room.edit')
            @endforeach
            @include('admin.room.create')
        @endforeach
    @else
        <h1 align="center">Permissions Deny</h1>
    @endcan
@endsection
@section('scripts')
    <script>
        function theaterstatus(theater_id, active) {
            if (active === 1) {
                $("#theater_status" + theater_id).html(' <a href="javascript:void(0)"  class="btn_active" onclick="theaterstatus(' + theater_id + ',0)">\
                    <span class="badge badge-sm bg-gradient-success">Online</span>\
                    </a>'
                );
            } else {
                $("#theater_status" + theater_id).html(' <a  href="javascript:void(0)" class="btn_active"  onclick="theaterstatus(' + theater_id + ',1)">\
                    <span class="badge badge-sm bg-gradient-secondary">Offline</span>\
                    </a>'
                );
            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "/admin/theater/status",
                type: 'GET',
                data: {
                    'active': active,
                    'theater_id': theater_id
                },

            });
        }

    </script>
    <script>
        $(document).ready(function () {
            $('#city').select2();
            $('#city_create').select2();
        })

        editTheater = (theater_id, city) => {
            $('#city_theater_' + theater_id + ' option[value="' + city + '"]').prop("selected", true);
        }

        editSeat = (seat_id, row, col) => {
            seatType = $('input[name=color]:checked#ColorRadio_' + seat_id).val();
            ms = $('input[name=ms]#seat_ms_' + seat_id).val();
            me = $('input[name=me]#seat_me_' + seat_id).val();

            console.log(seatType + ' - ' + ms + ' + ' + me);

            if (seatType) {
                @foreach($seatTypes as $seatType)
                if (seatType == {{$seatType->id}}) {
                    color = '{{$seatType->color}}';
                }
                @endforeach
                $('#Seat_' + row + col).css('background-color', color);
            }

            seat_empty = '<div class="d-inline-block align-middle disabled seat_empty"\
                                style="width: 30px; height: 30px; margin: 2px 0;"></div>'

            for (i = 1; i <= ms; i++) {
                $('#Seat_' + row + col).before(seat_empty);
            }
            for (i = 1; i <= me; i++) {
                $('#Seat_' + row + col).after(seat_empty);
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "/admin/seat/edit",
                type: 'GET',
                data: {
                    'seat_id': seat_id,
                    'seatType': seatType,
                    'ms': ms,
                    'me': me,
                },

            });
        }

        editRow = (room_id, row) => {

            seatType = $('input[name=color]:checked#ColorRadio_' + room_id + '_' + row).val();
            mb = $('input[name=mb]#row_mb_' + room_id + '_' + row).val();

            console.log(seatType + ' - ' + mb);

            @foreach($seatTypes as $seatType)
            if (seatType == {{$seatType->id}}) {
                color = '{{$seatType->color}}';
            }
            @endforeach

            if (seatType) $('#Row_' + row + ' .seat_enable').css('background-color', color);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "/admin/seat/row",
                type: 'GET',
                data: {
                    'room': room_id,
                    'row': row,
                    'seatType': seatType,
                    'mb': mb,
                },

            });
        }
    </script>

@endsection



