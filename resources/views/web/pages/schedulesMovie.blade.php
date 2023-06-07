@extends('web.layout.index')
@section('schedules')
    active
@endsection
@section('css')
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
                    <a class="h5 nav-link link-secondary" href="/schedulesbyTheater">
                        @lang('lang.theater_showtime')
                    </a>
                </li>
            </ul>

            <div id="lichtheophim" class="collapse show" data-bs-parent="#schedules">
                {{-- Carousel Movies --}}
                <div class="d-flex container flex-row flex-nowrap overflow-x-auto mb-4 carousel_movie">
                    @foreach($movies as $movie)
                            <?php $film[$movie->id] = $movie ?>
                        <button data-bs-toggle="collapse"
                                data-bs-target=".multi-collapse_Movie_{{ $movie->id }}"
                                aria-controls="#movieChoice_{{$movie->id}} #movieSchedules_{{$movie->id}}"
                                class="btn btn-block border-0 p-2 movie_btn">
                            @if(strstr($movie->image,"https") === "")
                                <img class="rounded d-block movie_img icon-link-hover" style="width: 200px; height: 300px" alt="..."
                                     src="https://res.cloudinary.com/{{ $cloud_name }}/image/upload/{{ $movie->image }}.jpg">
                            @else
                                <img class="rounded d-block movie_img" style="width: 200px; height: 300px" alt="..." src="{{ $movie->image }}">
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
                                                {{ $director->name }}
                                            @else
                                                , {{ $director->name }}
                                            @endif
                                        @endforeach
                                    </p>
                                    <p class="card-text">Diễn viên:
                                        @foreach($movie->casts as $cast)
                                            @if ($loop->first)
                                                {{ $cast->name }}
                                            @else
                                                , {{ $cast->name }}
                                            @endif
                                        @endforeach
                                    </p>
                                    <p class="card-text">@lang('lang.rated'):
                                        <span class="badge @if($movie->rating->name == 'C18') bg-danger
                                                            @elseif($movie->rating->name == 'C16') bg-warning
                                                            @elseif($movie->rating->name == 'P') bg-success
                                                            @elseif($movie->rating->name == 'P') bg-primary
                                                            @else bg-info
                                                            @endif me-1"
                                        >
                                            {{ $movie->rating->name }}
                                        </span> - {{ $movie->rating->description }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- Movie: end -->
                    @endforeach

                    <div class="mt-2">
                        <form action="/schedulesByMovie" method="get">
                            @csrf
                            <div class="row container">
                                <div class="col-5">
                                    <div class="input-group">
                                        <span class="input-group-text bg-gray-200"> @lang('lang.city')</span>
                                        <select id="theater" class="form-select ps-2" name="city" aria-label="">
                                            @foreach($cities as $city)
                                                <option value="{{ $city }}" @if($city == $city_cur) selected @endif>
                                                    {{ $city }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-5">
                                    <div class="input-group">
                                        <span class="input-group-text bg-gray-200"> @lang('lang.show_date')</span>
                                        <input class="form-control ps-2" type="date" name="date" value="{{ $date_cur }}" aria-label="">
                                    </div>
                                </div>
                                <div class="col-2">
                                    <button type="submit" class="btn btn-primary">@lang('lang.submit')</button>
                                </div>
                            </div>
                        </form>
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
