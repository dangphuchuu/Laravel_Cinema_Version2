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
                        @lang('lang.movie_showtime')
                    </button>
                </li>
                <li class="vr mx-5"></li>
                <li class="nav-item">
                    <button class="h5 nav-link link-secondary"
                            aria-expanded="false"
                            data-bs-toggle="collapse" data-bs-target="#lichtheorap">@lang('lang.theater_showtime')
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
                                                            <i class="fa-solid fa-location-dot"></i>
                                                            {{ $theater->address }}
                                                        </p>
                                                    </a>
                                                </div>
                                            </button>

                                            <div class="card-footer">
                                                <a href="{{ $theater->location }}"
                                                   class="btn w-100 h-100 text-uppercase" target="_blank">xem Bản đồ
                                                    <i class="fa-solid fa-map-location-dot"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Theater: end -->
                                @endif
                            @endforeach
                        </div>
                    @endforeach
                </div>

                @include('web.layout.schedulesByTheater')
            </div>

            <div id="lichtheophim" class="collapse show" data-bs-parent="#schedules">
                {{-- Carousel Movies --}}
                <div class="d-flex container flex-row flex-nowrap overflow-auto mb-4 carousel_movie">
                    @foreach($movies as $movie)
                            <?php $film[$movie->id] = $movie ?>
                        <button data-bs-toggle="collapse"
                                data-bs-target=".multi-collapse_Movie_{{ $movie->id }}"
                                aria-controls="#movieChoice_{{$movie->id}} #movieSchedules_{{$movie->id}}"
                                class="btn btn-block border-0 p-2">
                            @if(strstr($movie->image,"https") === "")
                                <img class="rounded d-block" style="width: 200px; height: 300px" alt="..."
                                     src="https://res.cloudinary.com/dgk9ztl5h/image/upload/{{ $movie->image }}.jpg">
                            @else
                                <img class="rounded d-block" style="width: 200px; height: 300px" alt="..." src="{{ $movie->image }}">
                            @endif
                        </button>
                    @endforeach
                </div>

                <div id="collapseMovieParent">
                    @foreach($movies as $movie)
                        <!-- Movie -->
                        <div class="collapse multi-collapse_Movie_{{ $movie->id }}" id="movieChoice_{{ $movie->id }}"
                             data-bs-parent="#collapseMovieParent">
                            <div class="d-flex flex-column flex-sm-row align-items-center" style="background: #f5f5f5">
                                <div class="flex-shrink-0 justify-content-center">
                                    <a href="/movie/{{ $movie->id }}">
                                        @if(strstr($movie->image,"https") === "")
                                            <img class="img-fluid" style="max-height: 361px; max-width: 241px" alt="..."
                                                 src="https://res.cloudinary.com/dgk9ztl5h/image/upload/{{ $movie->image }}.jpg">
                                        @else
                                            <img class="img-fluid" style="max-height: 361px; max-width: 241px" alt="..." src="{{ $movie->image }}">
                                        @endif
                                    </a>
                                </div>
                                <div class="flex-grow-1 ms-3 mt-3 mt-sm-0">
                                    <h5 class="card-title">{{ $movie->name }}</h5>
                                    <p class="card-text text-danger">{{ $movie->showTime }} phút</p>
                                    <p class="card-text">Thể loại:
                                        @foreach($movie->movieGenres as $genre)
                                            @if ($loop->first)
                                                <a class="link link-dark" href="#">{{ $genre->name }}</a>
                                            @else
                                                | <a class="link link-dark" href="#">{{ $genre->name }}</a>
                                            @endif
                                        @endforeach
                                    </p>
                                    <p class="card-text">Đạo diễn:
                                        @foreach($movie->directors as $director)
                                            @if ($loop->first)
                                                <a class="link link-dark text-decoration-none" href="#">{{ $director->name }}</a>
                                            @else
                                                , <a class="link link-dark text-decoration-none" href="#">{{ $director->name }}</a>
                                            @endif
                                        @endforeach
                                    </p>
                                    <p class="card-text">Diễn viên:
                                        @foreach($movie->casts as $cast)
                                            @if ($loop->first)
                                                <a class="link link-dark text-decoration-none" href="#">{{ $cast->name }}</a>
                                            @else
                                                , <a class="link link-dark text-decoration-none" href="#">{{ $cast->name }}</a>
                                            @endif
                                        @endforeach
                                    </p>
                                    <p class="card-text">Rated:
                                        <b class="text-danger">{{ $movie->rating->name }}</b>
                                        - {{ $movie->rating->description }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- Movie: end -->
                    @endforeach

                    <div class="mt-2">
                        <div class="row row-cols-sm-2 row-cols-1">
                            <div class="form-group col mt-4">
                                <form method='get'>
                                    <label for="select-sort" class="form-label">@lang('lang.city')</label>
                                    <select name="select_item is-invalid" id="select-sort" class="form-select" name="theater">
                                        @foreach($cities as $city)
                                            <option value="{{ $city }}" @if($city == $city_cur) selected @endif>{{ $city }}</option>
                                        @endforeach
                                    </select>
                                </form>
                            </div>
                            <div class="form-group col mt-4">
                                <label class="form-label" for="datepicker">@lang('lang.show_date')</label>
                                <input type="date" id="datepicker" value="{{ $date_cur }}" class="form-control">
                            </div>
                        </div>
                    </div>
                    @foreach($movies as $movie)
                        @if($movie->schedules->count() > 0)
                            @include('web.layout.schedulesByMovie')
                        @endif
                    @endforeach
                </div>
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
    </script>
@endsection
