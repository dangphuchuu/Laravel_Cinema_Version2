@extends('web.layout.index')
@section('content')
    <section class="container-lg clearfix">
        {{--  Breadcrumb  --}}
        <nav aria-label="breadcrumb mt-5">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#" class="link link-dark">@lang('lang.home')</a></li>
                <li class="breadcrumb-item"><a href="#" class="link link-dark">@lang('lang.movie_is_playing')</a></li>
                <li class="breadcrumb-item"><a href="/movie/{{ $movie->id }}" class="link link-dark">{{ $movie->name }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="#" class="link link-secondary disabled text-decoration-none">@lang('lang.ticket')</a>
                </li>
            </ol>
        </nav>

        <ul class="nav justify-content-around fw-bold">
            <li class="nav-item">
                <a class="nav-link active text-warning"
                   href="#Seats"
                   aria-controls="seat"
                   aria-expanded="true"
                   data-bs-toggle="collapse"
                   data-bs-target="#Seats">1. @lang('lang.choose_seat')</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled text-secondary" href="#Combos">2. @lang('lang.choose_combo')</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled text-secondary" href="#Payment">3. @lang('lang.payment')</a>
            </li>
        </ul>
        <div class="progress" role="progressbar" aria-label="Example 1px high" aria-valuenow="10" aria-valuemin="0"
             aria-valuemax="30" style="height: 2px">
            <div class="progress-bar bg-warning" style="width: 34%"></div>
        </div>


        <div class="mt-5">
            <h4>@lang('lang.ticket_information')</h4>
            <div id="ticket_info" class="card mb-3 bg-dark text-light px-0 position-relative">
                <div class="row g-0">
                    <div class="col-lg-3 col-sm-4 col-12 d-flex justify-content-center">
                        @if(strstr($movie->image,"https") == "")
                            <img class="img p-3 w-100 w-sm-auto" alt="..." style="max-height: 361px; max-width: 241px"
                                 src="https://res.cloudinary.com/{!! $cloud_name !!}/image/upload/{!! $movie['image'] !!}.jpg">
                        @else
                            <img class="img p-3 w-100 w-sm-auto" alt="..." style="max-height: 361px; max-width: 241px"
                                 src="{{ $movie->image }}">
                        @endif
                    </div>
                    <div class="col-lg-9 col-sm-8 col-12">
                        <div class="card-body">
                            <h5 class="card-title">{{ $movie->name }}</h5>
                            <ul class="list-group">
                                <li class="list-group-item bg-transparent text-light border-0">
                                    @lang('lang.showtime_web'):
                                    <strong class="ps-2">
                                        {{ date('d/m/Y', strtotime($schedule->date)).' '.date('H:i', strtotime($schedule->startTime)) }}
                                    </strong>
                                </li>
                                <li class="list-group-item bg-transparent text-light border-0">
                                    @lang('lang.theater'): <strong class="ps-2">{{ $room->theater->name }}</strong>
                                </li>
                                <li class="list-group-item bg-transparent text-light border-0">
                                    @lang('lang.room'): <strong class="ps-2">{{ $room->name }}</strong>
                                </li>
                                <li class="list-group-item bg-transparent text-light border-0">
                                    @lang('lang.rated'): <strong class="ps-2">
                                        <span class="badge @if($movie->rating->name == 'C18') bg-danger
                                                            @elseif($movie->rating->name == 'C16') bg-warning
                                                            @elseif($movie->rating->name == 'P') bg-success
                                                            @elseif($movie->rating->name == 'P') bg-primary
                                                            @else bg-info
                                                            @endif me-1">
                                            {{ $movie->rating->name }}
                                        </span> - {{ $movie->rating->description }}
                                    </strong>
                                </li>
                            </ul>
                        </div>
                        <div class="card-footer" style="background: #2e292e;">
                            <div class="d-flex flex-column">
                                <div class="d-flex text-light p-2">
                                    <span class="flex-shrink-0"><i class="fa-solid fa-popcorn"></i>&numsp;Combo:</span>
                                    <div class="flex-grow-1 text-end">0 đ</div>
                                </div>
                                <div class="d-flex text-light p-2">
                                    <span class="flex-shrink-0">
                                        <i class="fa-solid fa-seat-airline text-uppercase"></i>&numsp;@lang('lang.seat'):
                                    </span>
                                    <div id="ticket_seats" class="flex-grow-1 justify-content-end d-flex">
                                    </div>
                                </div>
                                <div class="d-flex text-light p-2">
                                    <span class="flex-shrink-0"><i class="fa-solid fa-equals"></i>&numsp;@lang('lang.total_price'):</span>
                                    <div class="flex-grow-1 text-end"><span id="ticketSeat_totalPrice"></span> đ</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div id="mainTicket">
            <div id="Seats" class="collapse show" data-bs-parent="#mainTicket">
                <h4 class="mt-5">@lang('lang.choose_seat')</h4>
                <div class="container-fluid py-4">
                    <div class="row">
                        <div class="col-12">
                            <div class="card mb-4">
                                <div class="card-header pb-0">
                                    <h6>{{$room->name}}</h6>
                                </div>
                                <div class="card-body px-0 pt-0 pb-2">
                                    {{--Giá vé--}}
                                    <div class="d-flex container my-3 justify-content-center">
                                        <ul class="list-group list-group-horizontal">
                                            <li class="list-group-item border-0">
                                                <strong>@lang('lang.ticket_price'):</strong>
                                            </li>
                                            @foreach($seatTypes as $seatType)
                                                <li class="list-group-item border-0">
                                                    <div class="d-flex">
                                                        <div class="d-inline-block me-2"
                                                             style="width: 24px; height: 24px; background-color: {{ $seatType->color }}">

                                                        </div>
                                                        {{ $seatType->surcharge+$price+$room->roomType->surcharge }} đ
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                        <div class="vr"></div>
                                        <ul class="list-group list-group-horizontal">
                                            <li class="list-group-item border-0">
                                                <div class="d-flex">
                                                    <div class="d-inline-block me-2 text-center"
                                                         style="width: 24px; height: 24px; background-color: #dc3545">
                                                        <i class="fa-solid text-light fa-check"></i>
                                                    </div>
                                                    Ghế đang chọn
                                                </div>
                                            </li>
                                            <li class="list-group-item border-0">
                                                <div class="d-flex">
                                                    <div class="d-inline-block me-2"
                                                         style="width: 24px; height: 24px; background-color: #c3c3c3">
                                                    </div>
                                                    Ghế đã bán
                                                </div>
                                            </li>
                                            <li class="list-group-item border-0">
                                                <div class="d-flex">
                                                    <div class="d-inline-block me-2 text-center text-dark"
                                                         style="width: 24px; height: 24px; background-color: #cccccc">
                                                        X
                                                    </div>
                                                    Ghế bảo trì
                                                </div>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="d-block overflow-x-auto text-center">
                                        <div class="w-100 mt-2 my-auto mb-4 text-center justify-content-center">
                                            {{--Màn hình--}}
                                            @lang('lang.screen')
                                            <div class="row bg-dark w-100 mx-auto" style="height: 2px; max-width: 540px"></div>
                                            <div class="row d-block m-2" style="margin: 2px">
                                                <div class="d-inline-block align-middle my-0 mx-1 py-1 px-0 disabled"
                                                     style="width: 30px; height: 30px; line-height: 22px; font-size: 10px">
                                                </div>
                                            </div>

                                            {{--Ghế--}}
                                            @foreach($room->rows as $row)
                                                <div class="row d-block" id="Row_{{ $row->row }}" style="margin: 2px">
                                                    @foreach($room->seats as $seat)
                                                        @if($seat->row == $row->row)
                                                            @for($m = 0; $m < $seat->ms; $m++)
                                                                <div class="d-inline-block align-middle disabled seat_empty"
                                                                     style="width: 30px; height: 30px; margin: 2px 0;"></div>
                                                            @endfor
                                                            @if($seat->status == 1)
                                                                <div class="d-inline-block align-middle py-1 px-0 seat_enable"
                                                                     id="Seat_{{ $seat->row.$seat->col}}"
                                                                     choiced="0"
                                                                     style="background-color: {{ $seat->seatType->color }}; cursor: pointer; width: 30px; height: 30px; line-height: 22px; font-size: 10px; margin: 2px 0;"
                                                                     onclick="seatChoiced('{{$seat->row}}', {{$seat->col}},
                                                                     {{$seat->seatType->surcharge + $room->roomType->surcharge + $price}})">
                                                                    {{$seat->row.$seat->col }}
                                                                </div>
                                                            @else
                                                                <div class="d-inline-block align-middle py-1 px-0 text-dark disabled"
                                                                     style="background-color: #cccccc; width: 30px; height: 30px; line-height: 22px; font-size: 10px; margin: 2px 0;">
                                                                    X
                                                                </div>
                                                            @endif
                                                            @for($n = 0; $n < $seat->me; $n++)
                                                                <div class="d-inline-block align-middle disabled seat_empty"
                                                                     style="width: 30px; height: 30px; margin: 2px 0;"></div>
                                                            @endfor
                                                        @endif
                                                    @endforeach
                                                    @for($m = 0; $m < $row->mb; $m++)
                                                        <div class="row d-block" style="margin: 2px">
                                                            <div class="d-inline-block align-middle disabled seat_empty"
                                                                 style="width: 30px; height: 30px; margin: 2px 0;"></div>
                                                        </div>
                                                    @endfor
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-start w-50 ms-2 mt-4 float-end">
                    <button class="btn btn-warning text-decoration-underline text-center"
                            href="#Combos"
                            onclick="seatChoicedNext()"
                            aria-controls="Combos"
                            aria-expanded="true"
                            data-bs-toggle="collapse"
                            data-bs-target="#Combos">
                        @lang('lang.next') <i class="fa-solid fa-angle-right"></i>
                    </button>
                </div>
            </div>

            <div id="Combos" class="mt-5 collapse" data-bs-parent="#mainTicket">
                <h4>@lang('lang.choose_combo')</h4>

                <div class="row g-2 mt-2 row-cols-2" data-bs-parent="#mainContent">
                    @for($i = 0; $i < 4; $i++)
                        <!-- Movie -->
                        <div class="col">
                            <div class="card px-0 overflow-hidden"
                                 style="background: #f5f5f5">
                                <div class="row g-0">
                                    <div class="col-lg-4 col-12">
                                        <a href="#!">
                                            <img
                                                src="https://www.cgv.vn/media/catalog/product/cache/1/thumbnail/190x260/2e2b8cd282892c71872b9e67d2cb5039/t/h/the_accursed.c_n_th_nh_n_t_c_i_m_-_payoff_poster_-_kc_12.05.2023_1_.jpg"
                                                class="img-fluid w-100"
                                                alt="...">
                                        </a>
                                    </div>
                                    <div class="col-lg-8 col-12">
                                        <div class="card-body">
                                            <h5 class="card-title text-dark">Combo {{ $i }}</h5>
                                            <p class="card-text text-dark">2 Coca + 2 Bắp phô mai</p>
                                            <p class="card-text">Giá: <span class="fw-bold">259,000 đ</span></p>
                                        </div>
                                        <div class="card-body">
                                            <div class="input-group">
                                                <button class="btn"><i class="fa-solid fa-circle-minus"></i></button>
                                                <input type="number" class="form-control" name="combo" value="0" readonly
                                                       style="max-width: 80px" aria-label="">
                                                <button class="btn"><i class="fa-solid fa-circle-plus"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Movie: end -->
                    @endfor
                </div>

                <div class="d-flex justify-content-center mt-4">
                    <button class="btn btn-warning mx-2 text-decoration-underline text-center"
                            href="#Seats"
                            onclick="comboBack()"
                            aria-controls="Seats"
                            aria-expanded="true"
                            data-bs-toggle="collapse"
                            data-bs-target="#Seats"
                    ><i class="fa-solid fa-angle-left"></i> @lang('lang.previous')
                    </button>

                    <button class="btn btn-warning mx-2  text-decoration-underline text-center"
                            href="#Payment"
                            aria-controls="Payment"
                            aria-expanded="true"
                            data-bs-toggle="collapse"
                            data-bs-target="#Payment"
                    >@lang('lang.next') <i class="fa-solid fa-angle-right"></i></button>
                </div>
            </div>

            <div id="Payment" class="mt-5 collapse" data-bs-parent="#mainTicket">
                {{--                <div>--}}
                {{--                    <h4>@lang('lang.discount')</h4>--}}
                {{--                    <div class="row row-cols-1 row-cols-md-2"--}}
                {{--                         data-bs-parent="#mainContent">--}}
                {{--                        <div class="input-group">--}}
                {{--                            <input type="text" name="discount" class="form-control border-dark" id="discount"--}}
                {{--                                   aria-label="">--}}
                {{--                            <button class="btn btn-danger">@lang('lang.apply')</button>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                </div>--}}

                <h4 class="mt-4">@lang('lang.payment')</h4>
                <div class="bg-dark-subtle p-5">
                    <div class="row row-cols-1" data-bs-parent="#mainContent">
                        <div class="col container">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="atm" id="atm">
                                <label class="form-check-label" for="atm">
                                        <span class="badge">
                                            <img src="https://www.cgv.vn/media/catalog/product/placeholder/default/atm_icon.png"
                                                 style="max-height: 25px" alt="...">
                                        </span> @lang('lang.bank_card')
                                </label>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="d-flex justify-content-center mt-4">
                    <button onclick="payment()" class="btn btn-warning mx-2 text-decoration-underline text-uppercase text-center">
                        Đặt vé <i class="fa-solid fa-angle-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script>
        $(document).ready(function () {
            $i = 1;
            let $arrSeatHtml = [];
            let $ticket_seats = {};
            let $ticket_id = -1;
            let $countdown = {
                interval: null
            };
            let $sumSeats = 0;
            let $holdState = false;
            seatChoiced = (row, col, price) => {
                var choiced = $('#Seat_' + row + col).attr('choiced');
                if (choiced == 1) {
                    $i--;
                    $('#Seat_' + row + col).replaceWith($arrSeatHtml[row + col]);
                    $(`#ticketSeat_${row + col}`).remove();
                    $sumSeats -= price;
                    $('#ticketSeat_totalPrice').text($sumSeats);
                    delete $ticket_seats[row + col];
                } else {
                    // Gới hạn chọn ghế
                    if ($i > 8) {
                        $('.seat_enable').addClass('disabled');
                        alert('chọn tối đa 8 ghế');
                        return;
                    }
                    $arrSeatHtml[row + col] = $('#Seat_' + row + col).clone();
                    $('#Seat_' + row + col).replaceWith(`<div class="d-inline-block align-middle py-1 px-0 seat_enable"
                        id="Seat_${row + col}" choiced="1" onclick="seatChoiced('${row}', ${col}, ${price})"
                        style="background-color: #dc3545; cursor: pointer; width: 30px; height: 30px; line-height: 22px; font-size: 10px;
                        margin: 2px 0;"><i class="fa-solid text-light fa-check"></i>
                        </div>`)
                    $('#ticket_seats').append(`<p id="ticketSeat_${row + col}">${row + col}, </p>`);
                    $ticket_seats[row + col] = [row, col, price];
                    $sumSeats += price;
                    $('#ticketSeat_totalPrice').text($sumSeats);
                    $i++;
                }

            }

            function startTimer(duration, display, countdown) {
                var timer = duration, minutes, seconds;
                countdown.interval = setInterval(function () {
                    minutes = parseInt(timer / 60, 10);
                    seconds = parseInt(timer % 60, 10);

                    minutes = minutes < 10 ? "0" + minutes : minutes;
                    seconds = seconds < 10 ? "0" + seconds : seconds;

                    display.textContent = minutes + ":" + seconds;
                    timer--;
                    if (timer === -2) {
                        alert('đã quá thời hạn thanh toán');
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $.ajax({
                            url: "/tickets/delete",
                            type: 'DELETE',
                            dataType: 'json',
                            data: {
                                'ticket_id': $ticket_id,
                            },
                            success: function (data) {
                            }
                        });
                        window.location.replace('/');
                    }
                }, 1000);
            }

            comboBack = () => {
                $('#timer').remove();
                clearInterval($countdown.interval);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "/tickets/delete",
                    type: 'DELETE',
                    dataType: 'json',
                    data: {
                        'ticket_id': $ticket_id,
                    },
                    success: function (data) {
                    }
                });
            }

            seatChoicedNext = () => {
                $('#timer').remove();
                $('#ticket_info').append(`<div id="timer"
                     class="d-block position-absolute end-0 top-0 bg-light text-dark text-center fs-2 m-3"
                     style="width: 200px; height: 100px; line-height:100px">
                </div>`)
                var fiveMinutes = 60 * 5,
                    display = document.querySelector('#timer');
                startTimer(fiveMinutes, display, $countdown);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "/tickets/create",
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        'ticketSeats': $ticket_seats,
                        'schedule': {{$schedule->id}},
                    },
                    success: function (data) {
                        $ticket_id = data.ticket_id;
                    },
                    statusCode: {
                        401: function () {
                            alert("Seat was booked!!!");
                            window.location.reload();
                        }
                    }

                });
            };

            window.addEventListener('beforeunload', () => {
                if (!$holdState) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "/tickets/delete",
                        type: 'DELETE',
                        dataType: 'json',
                        data: {
                            'ticket_id': $ticket_id,
                        },
                        success: function (data) {
                        }
                    });
                }
            });

            payment = () => {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "/tickets/payment",
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        'ticket_id': $ticket_id,
                    },
                    success: function (data) {
                    },
                    statusCode: {
                        200: function () {
                            $holdState = true;
                            alert("Booking ticket successfully!!!");
                            window.location.replace('/');
                        }
                    }
                });
            }

            @foreach($room->seats as $seat)
            @if($seat->status == 1)
            @foreach($tickets as $ticket)
            @foreach($ticket->ticketSeats as $ticketSeat)
            @if($seat->row == $ticketSeat->row && $seat->col == $ticketSeat->col)
            $('#Seat_{{$seat->row.$seat->col}}').replaceWith(`<div class="d-inline-block align-middle py-1 px-0 text-dark disabled"
                                     style="background-color: #c3c3c3; width: 30px; height: 30px; line-height: 22px; font-size: 10px; margin: 2px 0;">
                                {{ $seat->row.$seat->col }}
            </div>`)
            @endif
            @endforeach
            @endforeach
            @endif
            @endforeach
        })


    </script>
@endsection
