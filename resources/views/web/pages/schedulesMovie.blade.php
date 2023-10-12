@extends('web.layout.index')
@php
$fmt = datefmt_create(
    'vi_VN',
    IntlDateFormatter::FULL,
    IntlDateFormatter::FULL,
    'Viet_Nam/Ho_Chi_Minh',
    IntlDateFormatter::GREGORIAN,
);
@endphp
@section('schedules')
bg-danger link-light
@endsection
@section('css')
    .swiper {
    width: 100%;
    height: auto;
    }

    .swiper-slide {
    text-align: center;
    font-size: 18px;
    background: #fff;
    display: flex;
    justify-content: center;
    align-items: center;
    }

    .swiper-slide img {
    display: block;
    width: 100%;
    height: 100%;
    object-fit: cover;
    }
@endsection
@section('content')
    <section class="container-lg clearfix" style="min-height: 1000px">
        <!-- Main content -->
        <div class="mt-5" id="schedules">
            {{-- SubNav --}}
            <ul class="nav justify-content-center mb-4">
                <li class="nav-item">
                    <button class="h5 nav-link link-danger active fw-bold border-bottom border-2 border-danger"
                            aria-expanded="true"
                            data-bs-toggle="collapse"
                            data-bs-target="#lichtheophim" disabled>
                        @lang('lang.movie_showtime')
                    </button>
                </li>
                <li class="vr mx-5"></li>
                <li class="nav-item">
                    <a class="h5 nav-link link-secondary" href="/schedulesByTheater">
                        @lang('lang.theater_showtime')
                    </a>
                </li>
            </ul>

            <div id="lichtheophim" class="collapse show" data-bs-parent="#schedules">
                {{-- Carousel Movies --}}
                <div class="owl-carousel">
                    @foreach($movies as $movie)
                            <?php $film[$movie->id] = $movie ?>
                            <div class="item" data-merge="1">
                                <button data-bs-toggle="collapse"
                                        data-bs-target=".multi-collapse_Movie_{{ $movie->id }}"
                                        aria-expanded="false"
                                        aria-controls="movieChoice_{{$movie->id}} movieSchedules_{{$movie->id}}"
                                        class="btn btn-block border-0 p-2">
                                    @if(strstr($movie->image,"https") == "")
                                        <img class="rounded" style="width: 200px; height: 300px" alt="{{$movie->name}}"
                                             src="https://res.cloudinary.com/{{ $cloud_name }}/image/upload/{{ $movie->image }}.jpg">
                                    @else
                                        <img class="rounded" style="width: 200px; height: 300px" alt="{{$movie->name}}" src="{{ $movie->image }}">
                                    @endif
                                </button>
                            </div>
                    @endforeach
                </div>

                <div id="collapseMovieParent">
                    @foreach($movies as $movie)
                        <!-- Movie -->
                        <div class="collapse multi-collapse_Movie_{{ $movie->id }}" id="movieChoice_{{ $movie->id }}"
                             data-bs-parent="#collapseMovieParent">
                            <div class="d-flex flex-column flex-sm-row align-items-center rounded overflow-hidden" style="background: #f5f5f5">
                                <div class="flex-shrink-0 justify-content-center">
                                    <a href="/movie/{{ $movie->id }}">
                                        @if(strstr($movie->image,"https") == "")
                                            <img class="img-fluid rounded" style="max-height: 361px; max-width: 241px" alt="..."
                                                 src="https://res.cloudinary.com/dgk9ztl5h/image/upload/{{ $movie->image }}.jpg">
                                        @else
                                            <img class="img-fluid rounded" style="max-height: 361px; max-width: 241px" alt="..." src="{{ $movie->image }}">
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
                                                            @endif me-1">
                                            {{ $movie->rating->name }}
                                        </span> - {{ $movie->rating->description }}
                                    </p>
                                </div>
                            </div>
                            <ul class="list-group list-group-horizontal flex-nowrap overflow-x-auto listDate justify-content-evenly my-4">
                                @for($i = 0; $i <= 7; $i++)
                                    <li class="list-group-item border-0 p-0">
                                        <button data-bs-toggle="collapse"
                                                data-bs-target="#schedule_{{$movie->id}}_date_{{$i}}"
                                                @if($i == 0)
                                                    aria-expanded="true"
                                                @else
                                                    aria-expanded="false"
                                                @endif
                                                class="btn btn-outline-danger px-3 py-1 m-1 @if($i==0) active @endif btn-date">
                                                <div class="d-block">
                                                    {{ date('D', strtotime('+ '.$i.' day', strtotime(today()))) }}
                                                    <div><hr class="m-1"></div>
                                                    {{ date('d/m', strtotime('+ '.$i.' day', strtotime(today()))) }}
                                                </div>
                                        </button>
                                    </li>
                                    @if($i<7)
                                        <div class="vr"></div>
                                    @endif
                                @endfor
                            </ul>
                        </div>
                        <!-- Movie: end -->
                    @endforeach


                    @foreach($movies as $movie)
{{--                        @if($movie->schedules->count() > 0)--}}
                            @include('web.layout.schedulesByMovie')
{{--                        @endif--}}
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
                $("#schedules .nav-item").find(".active").removeClass("active link-danger fw-bold border-bottom border-2 border-danger").addClass("link-secondary").prop('disabled', false);
                $(this).addClass("active link-danger fw-bold border-bottom border-2 border-danger").removeClass("link-secondary").prop('disabled', true);
            });

            $(".theater_item .btn_theater").on("click", function () {
                $(".theater_item ").find(".btn_theater").removeClass("btn-warning").prop('disabled', false);
                $(this).addClass("btn-warning").prop('disabled', true);
            });

            $(".listDate button").on('click', function () {
                $(".listDate").find(".btn").removeClass('active');
                $(this).addClass("active");
            })

            var $owlMovies = $('.owl-carousel');
            $owlMovies.owlCarousel({
                loop:true,
                nav:false,
                autoWidth:true,
                margin:10,
                // responsive:{
                //     0:{
                //         items:2
                //     },
                //     600:{
                //         items:3
                //     },
                //     960:{
                //         items:4
                //     },
                //     1200:{
                //         items:5
                //     },
                //     1400:{
                //         items:6
                //     }
                // },
                autoplay:true,
                autoplayTimeout:2000,
                autoplayHoverPause:true,
            });
            $owlMovies.on('mousewheel', '.owl-stage', function (e) {
                if (e.deltaY>0) {
                    $owlMovies.trigger('next.owl');
                } else {
                    $owlMovies.trigger('prev.owl');
                }
                e.preventDefault();
            });
        })
    </script>
@endsection
