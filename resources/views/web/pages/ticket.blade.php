@extends('web.layout.index')
@section('content')
    <section class="container-lg clearfix">
        {{--  Breadcrumb  --}}
        <nav aria-label="breadcrumb mt-5">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#" class="link link-dark">@lang('lang.home')</a></li>
                <li class="breadcrumb-item"><a href="#" class="link link-dark">@lang('lang.movie_is_playing')</a></li>
                <li class="breadcrumb-item"><a href="#" class="link link-dark"> MẶT 6: TẤM VÉ ĐỊNH MỆNH</a></li>
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
            <div class="card mb-3 bg-dark text-light px-0">
                <div class="row g-0">
                    <div class="col-lg-3 col-sm-4 col-12 d-flex justify-content-center">
                        <img
                            src="https://ocwckgy6c1obj.vcdn.cloud/media/catalog/product/cache/1/image/c5f0a1eff4c394a251036189ccddaacd/l/m/lm6_2x3_layout.jpg"
                            class="img p-3 w-100 w-sm-auto" alt="..." style="max-height: 361px; max-width: 241px">
                    </div>
                    <div class="col-lg-9 col-sm-8 col-12">
                        <div class="card-body">
                            <h5 class="card-title">LẬT MẶT 6: TẤM VÉ ĐỊNH MỆNH</h5>
                            <ul class="list-group">
                                <li class="list-group-item bg-transparent text-light border-0">
                                    @lang('lang.showtime_web'): <strong class="ps-2">07/05/2023 19:00</strong>
                                </li> {{--movie running time--}}
                                <li class="list-group-item bg-transparent text-light border-0">
                                    @lang('lang.theater'): <strong class="ps-2">HuuMinh Cinema 1</strong>
                                </li>
                                <li class="list-group-item bg-transparent text-light border-0">
                                    @lang('lang.room'): <strong class="ps-2">Room 1</strong>
                                </li>
                                <li class="list-group-item bg-transparent text-light border-0">
                                    @lang('lang.rated'): <strong class="ps-2"><span
                                            class="badge bg-warning">C16</span></strong>
                                </li>
                            </ul>
                        </div>
                        <div class="card-footer" style="background: #2e292e;">
                            <ul class="list-group">
                                <li class="list-group-item bg-transparent d-flex text-light justify-content-between  border-0">
                                    <span><i class="fa-solid fa-popcorn"></i>&numsp;Combo:</span>
                                    <b>0 đ</b>
                                </li>
                                <li class="list-group-item bg-transparent d-flex text-light justify-content-between  border-0">
                                    <span><i class="fa-solid fa-seat-airline text-uppercase"></i>&numsp;@lang('lang.seat'):</span>
                                    <b>G9</b>
                                </li>
                                <li class="list-group-item bg-transparent d-flex text-light justify-content-between border-0">
                                    <span><i class="fa-solid fa-equals"></i>&numsp;@lang('lang.total_price'):</span>
                                    <b>0 đ</b>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div id="mainTicket">
            <div id="Seats" class="mt-5 collapse show" data-bs-parent="#mainTicket">
                <h4>@lang('lang.choose_seat')</h4>

                <div class="container flex-nowrap overflow-auto">
                    <div class="d-inline-flex mt-5 clearfix">
                        <div class="d-flex flex-fill">
                            <div class="flex-shrink-1 fw-bold border-0 me-2">@lang('lang.ticket_price'):</div>
                            <div class="flex-fill d-flex border-0 me-4">
                                    <span class="fw-bold d-block text-center me-1" style="width: 20px; height: 20px; background-color: #FFF0C7;"></span>
                                    <span style="line-height: 20px">70,000 đ</span>
                            </div>
                            <div class="flex-fill d-flex border-0 me-4">
                                <span class="fw-bold d-block text-center me-1" style="width: 20px; height: 20px; background-color: #FFC8CB;"></span>
                                <span style="line-height: 20px">120,000 đ</span>
                            </div>
                        </div>
                        <div class="vr mx-5"></div>
                        <div class="d-flex flex-fill"></div>
                    </div>

                    <div class="d-flex mt-4">
                        <div class="flex-shrink-1">
                            <div class="m-1 border border-0 align-middle border-dark text-center"
                                 style="width: 25px; height: 25px"></div>
                        </div>
                        <div class="w-100 d-flex">
                                <div class="border-bottom border-2 border-dark text-center pb-1 mb-5 mx-auto" style="max-width: 520px"><span class="fs-5">@lang('lang.screen')</span></div>
{{--                                <div class="d-flex"><div class="bg-dark w-100 mb-5" style="height: 2px; max-width: 520px"></div></div>--}}
                        </div>
                    </div>

                    @for($i = 65; $i < 79; $i++)
                        @if($i != 0)
                            <div class="d-flex">
                                <div class="flex-shrink-1">
                                    <div class="d-none d-sm-block m-1">
                                            <span
                                                class="link link-dark text-decoration-none fw-bold d-block text-center border border-1 border-dark"
                                                style="width: 25px; height: 25px; font-size: 10px; line-height: 25px">
                                                {{ chr($i) }}
                                            </span>
                                    </div>
                                </div>
                                <div class="w-100">
                                    <div class="d-flex">
                                        <div class="w-100"></div>
                                        @for($j = 0; $j <= 12; $j++)
                                            @if($j != 0)
                                                <div class="m-1 flex-shrink-1">
                                                    <input type="checkbox"
                                                           class="btn-check"
                                                           name="seat_{{$i.$j}}"
                                                           id="seat_{{$i.$j}}"
                                                           autocomplete="off"
                                                           style="width: 25px; height: 25px">
                                                    <label class="btn rounded-0 text-center p-0"
                                                           for="seat_{{$i.$j}}"
                                                           style="background-color: #FFF0C7; font-size: 10px; width: 25px; height: 25px; line-height: 25px">
                                                        {{ chr($i).$j }}
                                                    </label>
                                                </div>
                                            @endif
                                        @endfor
                                        <div class="w-100"></div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endfor
                    <div class="d-flex mt-5">
                        <div class="flex-shrink-1">
                            <div class="d-none d-sm-block m-1">
                                    <span class="fw-bold d-block"
                                          style="width: 25px; height: 25px; font-size: 10px; line-height: 25px"></span>
                            </div>
                        </div>
                        <div class="w-100">
                            <div class="d-flex justify-content-center">
                                @for($j = 0; $j <= 12; $j++)
                                    @if($j != 0)
                                        <div class="m-1">
                                            <div class="d-none d-sm-block border border-1 border-dark text-center"
                                                 style="width: 25px; height: 25px">{{ $j }}
                                            </div>
                                        </div>
                                    @endif
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-start w-50 ms-2 mt-4 float-end">
                    <button class="btn btn-warning text-decoration-underline text-center"
                            href="#Combos"
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
                                        <a href="/movie/1">
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
                                            <button class="btn"><i class="fa-solid fa-circle-minus"></i></button>
                                            <label>
                                                <input type="number" class="form-control" value="0" readonly
                                                       style="max-width: 80px">
                                            </label>
                                            <button class="btn"><i class="fa-solid fa-circle-plus"></i></button>
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
                <div>
                    <h4>@lang('lang.discount')</h4>
                    <div class="row row-cols-1 row-cols-md-2"
                         data-bs-parent="#mainContent">
                        <div class="input-group">
                            <input type="text" name="discount" class="form-control border-dark" id="discount"
                                   aria-label="">
                            <button class="btn btn-danger">@lang('lang.apply')</button>
                        </div>
                    </div>
                </div>

                <h4 class="mt-4">@lang('lang.payment')</h4>
                <div class="bg-dark-subtle p-5">
                    <div class="row row-cols-1" data-bs-parent="#mainContent">
                        <div class="col container">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="atm" id="atm">
                                <label class="form-check-label" for="atm">
                                        <span class="badge"><img
                                                src="https://www.cgv.vn/media/catalog/product/placeholder/default/atm_icon.png"
                                                style="max-height: 25px"></span> @lang('lang.bank_card')
                                </label>
                            </div>
                        </div>
                    </div>
                </div>


            <div class="d-flex justify-content-center mt-4">
                <button class="btn btn-warning mx-2 text-decoration-underline text-uppercase text-center">
                    @lang('lang.submit') <i class="fa-solid fa-angle-right"></i>
                </button>
            </div>
        </div>
        </div>
    </section>
@endsection
