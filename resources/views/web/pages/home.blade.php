@extends('web.layout.index')
@section('css')
@endsection
@section('content')
    <section class="container-lg clearfix">
        <!-- Slider -->
        <div id="carouselExampleControls" class="carousel slide shadow" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach($banners as $banner)
                    <div class="carousel-item @if($loop->first) active @endif">
                        @if(strstr($banner->image,"https") == "")
                            <img
                                src="https://res.cloudinary.com/{!! $cloud_name !!}/image/upload/{!! $value['image'] !!}.jpg"
                                class="d-block w-100" style="max-height: 600px; object-fit: contain; object-position: 50% 100%" alt="...">
                        @else
                            <img
                                src="{{ $banner->image }}"
                                class="d-block w-100" style="max-height: 600px; object-fit: contain; object-position: 50% 100%" alt="...">
                        @endif
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <!--end slider -->

        <!-- Main content -->
        <div class="mt-5" id="mainContent">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="h5 nav-link active"
                       href="#phimmoi"
                       aria-controls="phimmoi"
                       aria-expanded="true"
                       data-bs-toggle="collapse"
                       data-bs-target="#phimmoi">
                        @lang('lang.new_film')
                    </a>
                </li>
                <li class="nav-item">
                    <a class="h5 nav-link link-secondary" href="#vebantruoc" aria-controls="vebantruoc"
                       aria-expanded="false"
                       data-bs-toggle="collapse" data-bs-target="#vebantruoc">@lang('lang.pre_sale')</a>
                </li>
            </ul>

            <div id="vebantruoc" class="row g-4 mt-2 row-cols-1 row-cols-md-2 collapse"
                 data-bs-parent="#mainContent">
                @foreach($movies as $movie)
                    @foreach($movie->schedules as $movie_schedules)
                    @if(($movie_schedules->early ==1) && ($movie->releaseDate > date("Y-m-d")))
                        <!-- Movie -->
                        <div class="card-col">
                            <article class="card px-0 overflow-hidden"
                                     style="background: #f5f5f5; ">
                                <div class="row g-0">
                                    <div class="col-lg-4 col-12">
                                        <a href="/movie/{{ $movie->id }}">
                                            @if(strstr($movie->image,"https") == "")
                                                <img
                                                    src="https://res.cloudinary.com/{!! $cloud_name !!}/image/upload/{!! $value['image'] !!}.jpg"
                                                    class="img-fluid rounded w-100"
                                                    alt="...">
                                            @else
                                                <img
                                                    src="{{ $movie->image }}"
                                                    class="img-fluid rounded w-100"
                                                    alt="...">
                                            @endif
                                        </a>
                                    </div>
                                    <div class="col-lg-8 col-12">
                                        <div class="card-body">
                                            <a href="movie/{{ $movie->id }}" class="link link-dark text-decoration-none">
                                                <h5 class="card-title">{{ $movie->name }}</h5>
                                                <p class="card-text text-danger">{{ $movie->showTime }} phút</p>
                                                <p class="card-text">
                                                    @foreach($movie->movieGenres as $genre)
                                                        @if ($loop->first)
                                                            <a class="link link-dark" href="#">{{ $genre->name }}</a>
                                                        @else
                                                            | <a class="link link-dark" href="#">{{ $genre->name }}</a>
                                                        @endif
                                                    @endforeach
                                                </p>
                                                <p class="card-text">Rated: <b class="text-danger">{{ $movie->rating->name }}</b>
                                                    - {{ $movie->rating->description }}</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <!-- Movie: end -->
                    @endif
                    @endforeach
                @endforeach
            </div>

            <div id="phimmoi" class="row g-4 mt-2 row-cols-1 row-cols-md-2 collapse show"
                 data-bs-parent="#mainContent">
                @foreach($movies as $movie)
                    @if(($movie->releaseDate <= date("Y-m-d")))
                        <!-- Movie -->
                        <div class="card-col">
                            <article class="card px-0 overflow-hidden"
                                     style="background: #f5f5f5; ">
                                <div class="row g-0">
                                    <div class="col-lg-4 col-12">
                                        <a href="/movie/{{ $movie->id }}">
                                            @if(strstr($movie->image,"https") == "")
                                                <img
                                                    src="https://res.cloudinary.com/{!! $cloud_name !!}/image/upload/{!! $value['image'] !!}.jpg"
                                                    class="img-fluid rounded w-100"
                                                    alt="...">
                                            @else
                                                <img
                                                    src="{{ $movie->image }}"
                                                    class="img-fluid rounded w-100"
                                                    alt="...">
                                            @endif
                                        </a>
                                    </div>
                                    <div class="col-lg-8 col-12">
                                        <div class="card-body">
                                            <a href="movie/{{ $movie->id }}" class="link link-dark text-decoration-none">
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
                                                <p class="card-text"
                                                   style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 1;
                                                        -webkit-box-orient: vertical">
                                                    Diễn viên:
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

            <div class="row m-2 mb-5 justify-content-end">
                <a class="btn btn-outline-warning w-auto">@lang('lang.more') ></a>
            </div>

            <div class="mt-5">
                <h5 class="page-heading">@lang('lang.latest_news')</h5>

                <div class="row mt-2 g-2 row-cols-1 row-cols-sm-2 row-cols-md-3 justify-content-start">
                    {{--  Post item  --}}
                    <div class="col">
                        <div class="card border-0">
                            <div class="row g-0">
                                <div class="col-lg-4 col-12">
                                    <a class="link" href="#">
                                        <img
                                            src="https://cdn.galaxycine.vn/media/2023/4/30/guardians-of-the-galaxy-vol-3-lay-lai-niem-tin-danh-cho-dong-phim-sieu-anh-hung-2_1682827769754.jpg"
                                            class="img-fluid mt-3 w-100" alt="...">
                                    </a>
                                </div>
                                <div class="col-lg-8 col-12">
                                    <div class="card-body">
                                        <a href="#" class="link link-dark text-decoration-none">
                                            <h5 class="card-title"
                                                style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical">
                                                [Preview]
                                                Guardians Of The Galaxy Vol.3 Lấy Lại Niềm Tin
                                                Dành Cho Dòng Phim Siêu Anh Hùng</h5>
                                            <p class="card-text text-truncate">Dù đã đến gần ngày công chiếu, đa
                                                số
                                                thông tin về nội dung phim vẫn chỉ gói gọn trong hai chữ “tin
                                                đồn”.</p>
                                            <p class="card-text"><small class="text-muted">22 October 2013</small></p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--  Post item: end  --}}
                    {{--  Post item  --}}
                    <div class="col">
                        <div class="card border-0">
                            <div class="row g-0">
                                <div class="col-lg-4 col-12">
                                    <img
                                        src="https://cdn.galaxycine.vn/media/2023/4/24/450_1682320686796.jpg"
                                        class="img-fluid w-100 mt-3" alt="...">
                                </div>
                                <div class="col-lg-8 col-12">
                                    <div class="card-body">
                                        <h5 class="card-title"
                                            style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical">
                                            [Review] Con Nhót Mót
                                            Chồng: Tình Cha Con Cảm Động Và
                                            Màn Tái Xuất Ấn Tượng Của Thái Hòa</h5>
                                        <p class="card-text text-truncate">Một người cha bợm nhậu, một đứa con “lỡ
                                            thì”, một xóm lao động hơi “náo nhiệt”…, gần như tất cả những điều có vẻ bất
                                            ổn đó đã tạo nên Con Nhót Mót Chồng vô cùng gần gũi và chân thật.</p>
                                        <p class="card-text"><small class="text-muted">22 October 2013</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--  Post item: end  --}}
                    {{--  Post item  --}}
                    <div class="col">
                        <div class="card border-0">
                            <div class="row g-0">
                                <div class="col-lg-4 col-12">
                                    <img
                                        src="https://cdn.galaxycine.vn/media/2023/4/29/450_1682743963042.jpg"
                                        class="img-fluid w-100 mt-3" alt="...">
                                </div>
                                <div class="col-lg-8 col-12">
                                    <div class="card-body">
                                        <h5 class="card-title"
                                            style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical">
                                            [Review] Lật Mặt 6: Khẳng
                                            Định Giá Trị Thương Hiệu Trăm
                                            Tỷ
                                        </h5>
                                        <p class="card-text text-truncate">
                                            Lật Mặt 6: Tấm Vé Định Mệnh đã ra mắt tại
                                            phòng vé và tiếp tục tạo cơn địa chấn đáng chú ý vào dịp Lễ.
                                        </p>
                                        <p class="card-text"><small class="text-muted">22 October 2013</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--  Post item: end  --}}
                </div>
                <div class="row m-2 mb-5 justify-content-end">
                    <a class="btn btn-outline-warning w-auto">@lang('lang.more') ></a>
                </div>
            </div>

        </div>
    </section>
    <section>
        <div class="container ">
            <div class="row d-flex justify-content-end">
                <div class="col-md-8 col-lg-6 col-xl-4">

                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center p-3"
                             style="border-top: 4px solid #ffa900;">
                            <h5 class="mb-0">Chat messages</h5>
                            <div class="d-flex flex-row align-items-center">
                                <span class="badge bg-warning me-3">20</span>
                                <i class="fas fa-minus me-3 text-muted fa-xs"></i>
                                <i class="fas fa-comments me-3 text-muted fa-xs"></i>
                                <i class="fas fa-times text-muted fa-xs"></i>
                            </div>
                        </div>
                        <div class="card-body" data-mdb-perfect-scrollbar="true" style="position: relative; height: 400px">

                            <div class="d-flex justify-content-between">
                                <p class="small mb-1">Timona Siera</p>
                                <p class="small mb-1 text-muted">23 Jan 2:00 pm</p>
                            </div>
                            <div class="d-flex flex-row justify-content-start">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava5-bg.webp"
                                     alt="avatar 1" style="width: 45px; height: 100%;">
                                <div>
                                    <p class="small p-2 ms-3 mb-3 rounded-3" style="background-color: #f5f6f7;">For what reason
                                        would it
                                        be advisable for me to think about business content?</p>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between">
                                <p class="small mb-1 text-muted">23 Jan 2:05 pm</p>
                                <p class="small mb-1">Johny Bullock</p>
                            </div>
                            <div class="d-flex flex-row justify-content-end mb-4 pt-1">
                                <div>
                                    <p class="small p-2 me-3 mb-3 text-white rounded-3 bg-warning">Thank you for your believe in
                                        our
                                        supports</p>
                                </div>
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava6-bg.webp"
                                     alt="avatar 1" style="width: 45px; height: 100%;">
                            </div>

                            <div class="d-flex justify-content-between">
                                <p class="small mb-1">Timona Siera</p>
                                <p class="small mb-1 text-muted">23 Jan 5:37 pm</p>
                            </div>
                            <div class="d-flex flex-row justify-content-start">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava5-bg.webp"
                                     alt="avatar 1" style="width: 45px; height: 100%;">
                                <div>
                                    <p class="small p-2 ms-3 mb-3 rounded-3" style="background-color: #f5f6f7;">Lorem ipsum dolor
                                        sit amet
                                        consectetur adipisicing elit similique quae consequatur</p>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between">
                                <p class="small mb-1 text-muted">23 Jan 6:10 pm</p>
                                <p class="small mb-1">Johny Bullock</p>
                            </div>
                            <div class="d-flex flex-row justify-content-end mb-4 pt-1">
                                <div>
                                    <p class="small p-2 me-3 mb-3 text-white rounded-3 bg-warning">Dolorum quasi voluptates quas
                                        amet in
                                        repellendus perspiciatis fugiat</p>
                                </div>
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava6-bg.webp"
                                     alt="avatar 1" style="width: 45px; height: 100%;">
                            </div>

                        </div>
                        <div class="card-footer text-muted d-flex justify-content-start align-items-center p-3">
                            <div class="input-group mb-0">
                                <input type="text" class="form-control" placeholder="Type message"
                                       aria-label="Recipient's username" aria-describedby="button-addon2" />
                                <button class="btn btn-warning" type="button" id="button-addon2" style="padding-top: .55rem;">
                                    Button
                                </button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>

@endsection
