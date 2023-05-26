@extends('web.layout.index')
@section('movies')
    active
@endsection
@section('content')
    <section class="container-lg clearfix">
        <!-- Main content -->
        <div class="mt-5" id="Movies">
            <ul class="nav justify-content-start mb-4 align-items-center">
                <li class="nav-item">
                    <button class="h5 nav-link link-warning active fw-bold border-bottom border-2 border-warning"
                            aria-expanded="true"
                            data-bs-toggle="collapse"
                            data-bs-target="#phimdangchieu" disabled>
                        Phim đang chiếu
                    </button>
                </li>
                <li class="vr mx-5"></li>
                <li class="nav-item">
                    <button class="h5 nav-link link-secondary"
                            aria-expanded="false"
                            data-bs-toggle="collapse" data-bs-target="#phimsapchieu">
                        Phim sắp chiếu
                    </button>
                </li>

                <li class="vr mx-5"></li>
                <li class="nav-item me-auto">
                    <button class="h5 nav-link link-secondary"
                            aria-expanded="false"
                            data-bs-toggle="collapse" data-bs-target="#vebantruoc">
                        Vé bán trước
                    </button>
                </li>

                <button class="btn" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                    <i class="fa-solid fa-filter"></i> Bộ lọc
                </button>
            </ul>


            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight"
                 aria-labelledby="offcanvasRightLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasRightLabel">Bộ lọc</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <form action="/movies" method="get">
                        <div class="form-group m-2 mb-3">
                            <label class="form-label" for="cast">Diễn viên</label>
                            <input id="cast" name="cast" type="text" class="form-control">
                        </div>

                        <div class="form-group m-2 mb-3">
                            <label class="form-label" for="director">Đạo diễn</label>
                            <input id="director" name="director" type="text" class="form-control">
                        </div>

                        <div class="m-2 form-group mb-3">
                            <label class="form-label" for="movieGenres">Thể loại</label>
                            <select id="movieGenres" class="form-select">
                                <option selected>Tất cả</option>
                                @foreach($movieGenres as $movieGenre)
                                    <option>{{ $movieGenre->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="m-2 form-group mb-3">
                            <label class="form-label" for="rating">Độ tuổi</label>
                            <select id="rating" class="form-select">
                                @foreach($rating as $value)
                                    <option value="{{ $value->id }}" selected
                                            title="{{ $value->description }}">
                                        {{ $value->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary m-2 mt-4 w-100">Áp dụng</button>
                    </form>
                </div>
            </div>

            <div id="phimsapchieu" class="row g-4 mt-2 row-cols-1 row-cols-md-2 collapse" data-bs-parent="#Movies">
                @foreach($movies as $movie)
                    @if(!($movie->upcoming) && ($movie->releaseDate > date("YYYY-mm-dd")))
                        <!-- Movie -->
                        <div class="card-col">
                            <article class="card px-0 overflow-hidden" style="background: #f5f5f5">
                                <div class="row g-0">
                                    <div class="col-lg-4 col-12">
                                        <a href="/movie/{{ $movie->id }}">
                                            @if(strstr($movie->image,"https") === "")
                                                <img class="img-fluid rounded w-100"
                                                     src="https://res.cloudinary.com/dgk9ztl5h/image/upload/{{ $movie->image }}.jpg"
                                                     alt="">
                                            @else
                                                <img class="img-fluid rounded w-100" src="{{ $movie->image }}" alt="">
                                            @endif
                                        </a>
                                    </div>
                                    <div class="col-lg-8 col-12">
                                        <div class="card-body">
                                            <a href="movie/{{ $movie->id }}" class="link link-dark text-decoration-none">
                                                <h5 class="card-title">{{ $movie->name }}</h5>
                                                <p class="card-text text-danger">{{ $movie->showTime }}</p>
                                                <p class="card-text">
                                                    @foreach($movie->movieGenres as $genres)
                                                        <a class="link link-dark" href="#">{{ $genres->name }}</a> |
                                                    @endforeach
                                                </p>
                                                <p class="card-text">Rated: <b class="text-danger">C16</b> - PHIM ĐƯỢC PHỔ
                                                    BIẾN ĐẾN
                                                    NGƯỜI XEM TỪ ĐỦ 16 TUỔI
                                                    TRỞ LÊN (16+)</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <!-- Movie: end -->
                    @endif
                @endforeach
            </div>

            <div id="phimdangchieu" class="row g-4 mt-2 row-cols-1 row-cols-md-2 collapse show" data-bs-parent="#Movies">
                @foreach($movies as $movie)
                    @if(!($movie->upcoming) && ($movie->releaseDate <= date("YYYY-mm-dd")))
                        {{--                        {{  dd($movie->releaseDate >= date("YYYY-mm-dd"))}}--}}
                        <!-- Movie -->
                        <div class="card-col">
                            <article class="card px-0 overflow-hidden" style="background: #f5f5f5">
                                <div class="row g-0">
                                    <div class="col-lg-4 col-12">
                                        <a href="/movie/{{ $movie->id }}">
                                            @if(strstr($movie->image,"https") === "")
                                                <img class="img-fluid rounded w-100"
                                                     src="https://res.cloudinary.com/dgk9ztl5h/image/upload/{{ $movie->image }}.jpg"
                                                     alt="">
                                            @else
                                                <img class="img-fluid rounded w-100" src="{{ $movie->image }}" alt="">
                                            @endif
                                        </a>
                                    </div>
                                    <div class="col-lg-8 col-12">
                                        <div class="card-body">
                                            <a href="movie/{{ $movie->id }}" class="link link-dark text-decoration-none">
                                                <h5 class="card-title">{{ $movie->name }}</h5>
                                                <p class="card-text text-danger">{{ $movie->showTime }}</p>
                                                <p class="card-text">
                                                    @foreach($movie->movieGenres as $genres)
                                                        <a class="link link-dark" href="#">{{ $genres->name }}</a> |
                                                    @endforeach
                                                </p>
                                                <p class="card-text">Rated: <b class="text-danger">C16</b> - PHIM ĐƯỢC PHỔ
                                                    BIẾN ĐẾN
                                                    NGƯỜI XEM TỪ ĐỦ 16 TUỔI
                                                    TRỞ LÊN (16+)</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <!-- Movie: end -->
                    @endif
                @endforeach
            </div>

            <div id="vebantruoc" class="row g-4 mt-2 row-cols-1 row-cols-md-2 collapse show" data-bs-parent="#Movies">
                @foreach($movies as $movie)
                    @if($movie->upcoming)
                        <!-- Movie -->
                        <div class="card-col">
                            <article class="card px-0 overflow-hidden" style="background: #f5f5f5">
                                <div class="row g-0">
                                    <div class="col-lg-4 col-12">
                                        <a href="/movie/{{ $movie->id }}">
                                            @if(strstr($movie->image,"https") === "")
                                                <img class="img-fluid rounded w-100"
                                                     src="https://res.cloudinary.com/dgk9ztl5h/image/upload/{{ $movie->image }}.jpg"
                                                     alt="">
                                            @else
                                                <img class="img-fluid rounded w-100" src="{{ $movie->image }}" alt="">
                                            @endif
                                        </a>
                                    </div>
                                    <div class="col-lg-8 col-12">
                                        <div class="card-body">
                                            <a href="movie/{{ $movie->id }}" class="link link-dark text-decoration-none">
                                                <h5 class="card-title">{{ $movie->name }}</h5>
                                                <p class="card-text text-danger">{{ $movie->showTime }}</p>
                                                <p class="card-text">
                                                    @foreach($movie->movieGenres as $genres)
                                                        <a class="link link-dark" href="#">{{ $genres->name }}</a> |
                                                    @endforeach
                                                </p>
                                                <p class="card-text">Rated: <b class="text-danger">C16</b> - PHIM ĐƯỢC PHỔ
                                                    BIẾN ĐẾN
                                                    NGƯỜI XEM TỪ ĐỦ 16 TUỔI
                                                    TRỞ LÊN (16+)</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <!-- Movie: end -->
                    @endif
                @endforeach
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script>
        $("#Movies .nav .nav-item .nav-link").on("click", function () {
            $("#Movies .nav-item").find(".active").removeClass("active link-warning fw-bold border-bottom border-2 border-warning").addClass("link-secondary").prop('disabled', false);
            $(this).addClass("active link-warning fw-bold border-bottom border-2 border-warning").removeClass("link-secondary").prop('disabled', true);
        });
        
    </script>
@endsection
