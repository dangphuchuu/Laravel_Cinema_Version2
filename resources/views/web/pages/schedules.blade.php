@extends('web.layout.index')
@section('schedules')
    active
@endsection

@section('content')
    <section class="container-lg clearfix">
        <!-- Main content -->
        <div class="mt-5" id="schedules">
            {{-- SubNav --}}
            <ul class="nav justify-content-center mb-4">
                <li class="nav-item">
                    <button class="h5 nav-link link-warning active fw-bold border-bottom border-2 border-warning"
                            aria-expanded="true"
                            data-bs-toggle="collapse"
                            data-bs-target="#lichtheophim" disabled>
                        Lịch chiếu theo phim
                    </button>
                </li>
                <li class="vr mx-5"></li>
                <li class="nav-item">
                    <button class="h5 nav-link link-secondary"
                            aria-expanded="false"
                            data-bs-toggle="collapse" data-bs-target="#lichtheorap">Lịch chiếu theo rạp
                    </button>
                </li>
            </ul>

            <div id="lichtheorap" class="collapse" data-bs-parent="#schedules">
                <div class="d-flex flex-row mt-4">
                    @foreach($cities as $city)
                        <div class="flex-city p-2 m-1 border-0">
                            <button class="btn @if($loop->first) btn-warning @else btn-secondary @endif p-3" aria-expanded="true"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#{{$city}}" @if($loop->first) disabled @endif>{{$city}}
                            </button>
                        </div>
                    @endforeach
                </div>
                <div id="theater">
                    @foreach($cities as $city)
                        <div id="{{$city}}" data-bs-parent="#theater"
                             class="row g-4 mt-2 row-cols-1 row-cols-sm-2 row-cols-md-4 @if($loop->first) show @endif collapse">
                            @foreach($theaters as $theater)
                                @if($city == $theater->city)
                                    <!-- Theater -->
                                    <div class="col">
                                        <div class="card px-0 overflow-hidden theater_item"
                                             style="background: #f5f5f5">
                                            <button class="btn rounded-0 border-0 btn_theater @if($loop->first) btn-warning @endif"
                                                    aria-expanded="true"
                                                    data-bs-toggle="collapse" data-bs-target="#schedulesByTheater"
                                                    @if($loop->first) disabled @endif>
                                                <div class="card-body">
                                                    <a href="/schedules/#"
                                                       class="link link-dark text-decoration-none text-center">
                                                        <h5 class="card-title fs-4">{{ $theater->name }}</h5>
                                                        <p class="card-text fs-6 text-secondary">
                                                            <i class="fa-solid fa-location-dot"></i> {{ $theater->address }}
                                                        </p>
                                                    </a>
                                                </div>
                                            </button>

                                            <div class="card-footer">
                                                <a href="{{ $theater->location }}"
                                                   class="btn w-100 h-100 text-uppercase" target="_blank">xem Bản đồ <i
                                                        class="fa-solid fa-map-location-dot"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Theater: end -->
                                @endif
                            @endforeach
                        </div>
                    @endforeach
                    {{--                    <div id="hanoi" data-bs-parent="#theater"--}}
                    {{--                         class="row g-4 mt-2 row-cols-1 row-cols-sm-2 row-cols-md-4 collapse">--}}
                    {{--                        @for($i = 0; $i < 4; $i++)--}}
                    {{--                            <!-- Movie -->--}}
                    {{--                            <div class="col">--}}
                    {{--                                <div class="card px-0 overflow-hidden theater_item"--}}
                    {{--                                     style="background: #f5f5f5">--}}
                    {{--                                    <button class="btn rounded-0 border-0 btn_theater" aria-expanded="true"--}}
                    {{--                                            data-bs-toggle="collapse" data-bs-target="#schedulesByTheater">--}}
                    {{--                                        <div class="card-body">--}}
                    {{--                                            <a href="/schedules/#"--}}
                    {{--                                               class="link link-dark text-decoration-none text-center">--}}
                    {{--                                                <h5 class="card-title fs-4">Theater {{ $i }}</h5>--}}
                    {{--                                                <p class="card-text fs-6 text-secondary">--}}
                    {{--                                                    <i class="fa-solid fa-location-dot"></i> 180 Cao Lỗ, Phường 4, Quận--}}
                    {{--                                                    8,--}}
                    {{--                                                    TP.HCM--}}
                    {{--                                                </p>--}}
                    {{--                                            </a>--}}
                    {{--                                        </div>--}}
                    {{--                                    </button>--}}
                    {{--                                    <div class="card-footer">--}}
                    {{--                                        <a href="https://goo.gl/maps/hfTBKWjGTjVxTHi98"--}}
                    {{--                                           class="btn w-100 h-100 text-uppercase" target="_blank">xem Bản đồ <i--}}
                    {{--                                                class="fa-solid fa-map-location-dot"></i></a>--}}
                    {{--                                    </div>--}}
                    {{--                                </div>--}}
                    {{--                            </div>--}}
                    {{--                            <!-- Movie: end -->--}}
                    {{--                        @endfor--}}
                    {{--                    </div>--}}

                    {{--                    <div id="danang" data-bs-parent="#theater"--}}
                    {{--                         class="row g-4 mt-2 row-cols-1 row-cols-sm-2 row-cols-md-4 collapse">--}}
                    {{--                        @for($i = 0; $i < 2; $i++)--}}
                    {{--                            <!-- Movie -->--}}
                    {{--                            <div class="col">--}}
                    {{--                                <div class="card px-0 overflow-hidden theater_item">--}}
                    {{--                                    <button class="btn rounded-0 border-0 btn_theater" aria-expanded="true"--}}
                    {{--                                            data-bs-toggle="collapse" data-bs-target="#schedulesByTheater">--}}
                    {{--                                        <div class="card-body">--}}
                    {{--                                            <h5 class="card-title text-center fs-4">Theater {{ $i }}</h5>--}}
                    {{--                                            <p class="card-text fs-6">--}}
                    {{--                                                <i class="fa-solid fa-location-dot"></i> 180 Cao Lỗ, Phường 4, Quận 8,--}}
                    {{--                                                TP.HCM--}}
                    {{--                                            </p>--}}
                    {{--                                        </div>--}}
                    {{--                                    </button>--}}
                    {{--                                    <div class="card-footer">--}}
                    {{--                                        <a href="https://goo.gl/maps/hfTBKWjGTjVxTHi98" class="btn w-100 h-100"--}}
                    {{--                                           target="_blank">xem Bản đồ <i class="fa-solid fa-map-location-dot"></i></a>--}}
                    {{--                                    </div>--}}
                    {{--                                </div>--}}
                    {{--                            </div>--}}
                    {{--                            <!-- Movie: end -->--}}
                    {{--                        @endfor--}}
                    {{--                    </div>--}}
                </div>

                @include('web.layout.schedulesByTheater')
            </div>

            <div id="lichtheophim" class="collapse show" data-bs-parent="#schedules">
                {{-- Carousel Movies --}}
                <div class="d-flex container flex-row flex-nowrap overflow-auto mb-4 carousel_movie">
                    @foreach($movies as $movie)
                        @for($i = 0; $i <= 12; $i++)
                                <?php $film[$movie->id] = $movie ?>
                            <button onclick="movie({{ $i }})" class="btn btn-block border-0 p-2">
                                @if(strstr($movie->image,"https") === "")
                                    <img class="rounded d-block" style="max-width: 200px" alt="..."
                                         src="https://res.cloudinary.com/dgk9ztl5h/image/upload/{{ $movie->image }}.jpg">
                                @else
                                    <img class="rounded d-block" style="max-width: 200px" alt="..." src="{{ $movie->image }}">
                                @endif
                            </button>
                        @endfor
                    @endforeach
                </div>

                <!-- Movie -->
                <div class="d-flex flex-column flex-sm-row align-items-center" id="movieChoice" style="background: #f5f5f5">
                    <div class="flex-shrink-0 justify-content-center">
                        <a href="/movie/1">
                            @if(strstr($film->image,"https") === "")
                                <img class="img-fluid" style="max-height: 361px; max-width: 241px" alt="..."
                                     src="https://res.cloudinary.com/dgk9ztl5h/image/upload/{{ $movie->image }}.jpg">
                            @else
                                <img class="img-fluid" style="max-height: 361px; max-width: 241px" alt="..." src="{{ $movie->image }}">
                            @endif
                        </a>
                    </div>
                    <div class="flex-grow-1 ms-3 mt-3 mt-sm-0">
                        <h5 class="fw-bold text-center text-sm-start">2</h5>
                        <p class="card-text text-danger text-center text-sm-start">{{ $film->showTime }}</p>
                        <p class="card-text text-center text-sm-start">
                            @foreach($film->movieGenres as $genre)
                                <a class="link link-dark" href="#!2">{{ $genre->name }}</a> |
                            @endforeach
                        </p>
                        <p class="card-text">Rated:
                            <b class="text-danger">{{ $film->rating->name }}</b>
                            - {{ $film->rating->description }}</p>
                    </div>
                </div>
                <!-- Movie: end -->

                @include('web.layout.schedulesByMovie')
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script>
        $(document).ready(function () {
            $("#schedules .nav .nav-item .nav-link").on("click", function () {
                $("#schedules .nav-item").find(".active").removeClass("active link-warning fw-bold border-bottom border-2 border-warning").addClass("link-secondary").prop('disabled', false);
                $(this).addClass("active link-warning fw-bold border-bottom border-2 border-warning").removeClass("link-secondary").prop('disabled', true);
            });

            $("#lichtheorap .d-flex .flex-city .btn").on("click", function () {
                $("#lichtheorap .flex-city").find(".btn").removeClass("btn-warning").addClass("btn-secondary").prop('disabled', false);
                $(this).addClass("btn-warning").removeClass("btn-secondary").prop('disabled', true);
            });

            $(".theater_item .btn_theater").on("click", function () {
                $(".theater_item ").find(".btn_theater").removeClass("btn-warning").prop('disabled', false);
                $(this).addClass("btn-warning").prop('disabled', true);
            });


        })

        function movie(id) {
            @foreach($movies as $movie)
            if (id === {{ $movie->id }}) {
                    <?php $film = $movie ?>
                var divMovieChoice = '' +
                    '<div class="d-flex flex-column flex-sm-row align-items-center" id="movieChoice" style="background: #f5f5f5">\
                    <div class="flex-shrink-0 justify-content-center">\
                <a href="/movie/1">\
                    @if(strstr($film->image,"https") === "")
                        <img class="img-fluid" style="max-height: 361px; max-width: 241px" alt="..."\
                    src="https://res.cloudinary.com/dgk9ztl5h/image/upload/{{ $movie->image }}.jpg">\
                    @else
                        <img class="img-fluid" style="max-height: 361px; max-width: 241px" alt="..." src="{{ $movie->image }}">\
                    @endif
                        </a>\
                </div>\
                    <div class="flex-grow-1 ms-3 mt-3 mt-sm-0">\
                        <h5 class="fw-bold text-center text-sm-start">{{ $film->id }}</h5>\
                    <p class="card-text text-danger text-center text-sm-start">{{ $film->showTime }}</p>\
                    <p class="card-text text-center text-sm-start">\
                        @foreach($film->movieGenres as $genre)
                        <a class="link link-dark" href="#!2">{{ $genre->name }}</a> |\
                        @endforeach
                        </p>\
                        <p class="card-text">Rated:\
                            <b class="text-danger">{{ $film->rating->name }}</b>\
                        - {{ $film->rating->description }}</p>\
                </div>\
            </div>';

                $('#movieChoice').replaceWith(divMovieChoice);
            }
            @break
            @endforeach
        }
    </script>
@endsection
