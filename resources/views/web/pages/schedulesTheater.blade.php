@extends('web.layout.index')
@section('schedules')
bg-danger link-light
@endsection

@section('content')
    <section class="container-lg clearfix" style="min-height: 1000px">
        <!-- Main content -->
        <div class="mt-5" id="schedules">
            {{-- SubNav --}}
            <ul class="nav justify-content-center mb-4">
                <li class="nav-item">
                    <a class="h5 nav-link link-secondary" href="/schedulesByMovie">
                        @lang('lang.movie_showtime')
                    </a>
                </li>
                <li class="vr mx-5"></li>
                <li class="nav-item">
                    <button class="h5 nav-link link-danger active fw-bold border-bottom border-2 border-danger disabled"
                            data-bs-toggle="collapse"
                            data-bs-target="#lichtheorap">
                        @lang('lang.theater_showtime')
                    </button>
                </li>
            </ul>

            <div id="lichtheorap" class="collapse show" data-bs-parent="#schedules">
                <div class="d-flex flex-row mt-4 justify-content-center">
                    @foreach($cities as $city)
                        <div class="flex-city p-2 m-1 border-0">
                            <button class="btn @if($loop->first) btn-danger disabled @else btn-secondary @endif p-3"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#Theater_{{str_replace(' ', '', $city)}}">
                                {{$city}}
                            </button>
                        </div>
                    @endforeach
                </div>
                <div id="theaterParent">
                    @foreach($cities as $city)
                        <div class="collapse @if($loop->first) show @endif" id="Theater_{{str_replace(' ', '', $city)}}"
                             data-bs-parent="#theaterParent">
                            <div class="row g-4 mt-2 row-cols-1 row-cols-sm-2 row-cols-md-4 ">
                                @foreach($theaters as $theater)
                                    @if($city == $theater->city)
                                        <!-- Theater -->
                                        <div class="col">
                                            <div class="card px-0 overflow-hidden bg-tertiary theater_item">
                                                <button class="btn rounded-0 border-0 btn_theater @if($loop->first) btn-danger disabled @endif"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#TheaterSchedules_{{$theater->id}}">
                                                    <div class="card-body">
                                                        <h5 class="card-title fs-4">{{ $theater->name }}</h5>
                                                    </div>
                                                </button>

                                                <div class="card-footer bg-danger-subtle">
                                                    <div class="row">
                                                        <div class="col-8">
                                                            <p class="card-text fs-6">
                                                                <i class="fa-solid fa-location-dot"></i>
                                                                {{ $theater->address }}
                                                            </p>
                                                        </div>
                                                        <div class="col-4">
                                                            <a href="{{ $theater->location }}"
                                                               class="btn text-uppercase d-flex float-end" target="_blank">
                                                                <i class="fa-solid fa-map-location-dot"></i>
                                                                <i class="fa-solid fa-chevron-right"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                        <!-- Theater: end -->
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @endforeach



{{--                    <form action="/schedulesByTheater" method="get">--}}
{{--                        @csrf--}}
{{--                        <div class="row container mt-5">--}}
{{--                            <div class="col-10">--}}
{{--                                <div class="input-group">--}}
{{--                                    <span class="input-group-text bg-gray-200"> @lang('lang.show_date')</span>--}}
{{--                                    <input class="form-control ps-2" type="date" min="{{ date('Y-m-d') }}" name="date" value="{{ $date_cur }}"--}}
{{--                                           aria-label="">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-2">--}}
{{--                                <button type="submit" class="btn btn-primary">@lang('lang.submit')</button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </form>--}}

                    <div id="theaterSchedulesParent">
                        @foreach($theaters as $theater)
                            @include('web.layout.schedulesByTheater')
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script>
        $(document).ready(function () {
            $("#schedules .nav .nav-item .nav-link").on("click", function () {
                $("#schedules .nav-item").find(".active").removeClass("active link-danger fw-bold border-bottom border-2 border-danger").addClass("link-secondary disabled");
                $(this).addClass("active link-danger fw-bold border-bottom border-2 border-danger").removeClass("link-secondary disabled");
            });

            $("#lichtheorap .d-flex .flex-city .btn").on("click", function () {
                $("#lichtheorap .flex-city").find(".btn").removeClass("btn-danger disabled").addClass("btn-secondary");
                $(this).addClass("btn-danger disabled").removeClass("btn-secondary");
            });

            $(".theater_item .btn_theater").on("click", function () {
                $(".theater_item ").find(".btn_theater").removeClass("btn-danger disabled");
                $(this).addClass("btn-danger disabled");
            });

            $(".listDate button").on('click', function () {
                $(".listDate").find(".btn").removeClass('active');
                $(this).addClass("active");
            })
        })
    </script>
@endsection
