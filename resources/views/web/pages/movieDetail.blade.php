@extends('web.layout.index')
@section('content')
    <section class="container-lg">
        {{--  Breadcrumb  --}}
        <nav aria-label="breadcrumb mt-5">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#" class="link link-dark text-decoration-none">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="#" class="link link-dark text-decoration-none">Phim đang chiếu</a></li>
                <li class="breadcrumb-item active" aria-current="page">{!! $movie['name'] !!}</li>
            </ol>
        </nav>

        <div class="movie mt-5">
            {{--  Movie title  --}}
            <h2 class="mt-2">{!! $movie['name'] !!}</h2>

            <div class="row">
                <div class="col-sm-6 col-lg-3">
                    <div class="card border border-4 border-warning rounded-0">
                        @if(strstr($movie['image'],"https") == "")
                        <img class="card-img-top rounded-0" alt='...'
                             src="https://res.cloudinary.com/{!! $cloud_name !!}/image/upload/{!! $movie['image'] !!}.jpg">
                        @else
                            <img class="card-img-top rounded-0" alt='...'
                                 src="{!! $movie['image'] !!}">
                        @endif
                    </div>
                    <div class="card-body border border-4 border-warning border-top-0 d-flex align-items-center">
                        <strong class="card-text p-2">Đánh giá: </strong>
                        <div id='score' class="score"></div>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-9">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex align-items-center text-danger">{!! $movie['showTime'] !!} min</li> {{--movie running time--}}
                        <li class="list-group-item d-flex align-items-center"><strong class="pe-1">Quốc gia: </strong>{!! $movie['national'] !!}
                        </li>
                        <li class="list-group-item d-flex align-items-center"><strong class="pe-1">Ngày khởi
                                chiếu: </strong>{!! $movie['releaseDate'] !!}
                        </li>
                        <li class="list-group-item d-flex align-items-center"><strong class="pe-1">Thể loại: </strong>
                            @foreach($movie['movieGenres'] as $value)
                                <a class="link link-dark ps-1 text-decoration-none" href="{!! $value['id'] !!}">{!! $value['name'] !!}</a>,
                            @endforeach
                        </li>
                        <li class="list-group-item d-flex align-items-center">
                            <strong class="pe-1">Đạo diễn: </strong>
                            @foreach($movie['directors'] as $directors)
                                {!! $directors['name'] !!}
                            @endforeach
                        </li>
                        <li class="list-group-item d-flex align-items-center text-truncate">
                            <strong class="pe-1">Diễn viên: </strong>
                            @foreach($movie['casts'] as $casts)
                                {!! $casts['name'] !!},
                            @endforeach
                        </li>
                        <li class="list-group-item d-flex align-items-center"><strong class="pe-1">Rated: </strong><img
                                class="img-fluid rounded-1 border-2"
                                @if($movie['rating']['name'] == 'C13')
                                    src="images/rated/C13.png"
                                @elseif($movie['rating']['name'] == 'C16')
                                    src="images/rated/C13.png"
                                @elseif($movie['rating']['name'] == 'C18')
                                    src="images/rated/C18.png"
                                @elseif($movie['rating']['name'] == 'P')
                                    src="images/rated/P.png"
                                @else
                                    src="images/rated/C13.png"
                                @endif
                                alt="..."
                                style="max-width: 50px"></li>
                    </ul>
                </div>
            </div>

            <div class="row container">
                <div class="accordion-item">
                    <div class="accordion-header">
                        <h4 class="mt-4">Nội dung phim</h4>
                    </div>
                    <div class="accordion-body">
                        {!! $movie['description'] !!}
                    </div>
                </div>
            </div>
            <div class="row container">
                <h4 class="mt-4">Trailer</h4>

                <div class="">
                    <iframe width="800" height="500" src="https://www.youtube.com/embed/{!! $movie['trailer'] !!}"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen>
                    </iframe>
                </div>
            </div>
        </div>

        @include('web.layout.schedulesByMovie')

    </section>
@endsection
