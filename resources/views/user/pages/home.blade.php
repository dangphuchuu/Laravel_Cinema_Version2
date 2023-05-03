@extends('user.layout.index')
@section('content')
    <section>
        <!-- Search bar -->
        <div class="px-5 py-4 d-flex justify-content-end aligns-items-center" style="background: #2e292e">
            <div class="row">
                <div class="input-group col-5">
                    <label>
                        <select class="form-select">
                            <option class="text-light" value="1" style="background: #2e292e" selected>Tất cả
                            </option>
                            <option class="text-light" value="2" style="background: #2e292e">Phim</option>
                            <option class="text-light" value="3" style="background: #2e292e">Diễn viên</option>
                            <option class="text-light" value="4" style="background: #2e292e">Đạo diễn</option>
                            <option class="text-light" value="5" style="background: #2e292e">Năm</option>
                        </select>
                    </label>
                    <input type="text" class="form-control" placeholder="Search..."
                           aria-label="Recipient's username with two button addons">
                    <button class="btn btn-danger" type="button">Tìm kiếm</button>
                </div>
            </div>
        </div>


        <!-- Slider -->
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img
                        src="https://ocwckgy6c1obj.vcdn.cloud/media/banner/cache/1/b58515f018eb873dafa430b6f9ae0c1e/9/8/980x448px_4.jpg"
                        class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img
                        src="https://ocwckgy6c1obj.vcdn.cloud/media/banner/cache/1/b58515f018eb873dafa430b6f9ae0c1e/9/8/980x448__8.jpg"
                        class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img
                        src="https://ocwckgy6c1obj.vcdn.cloud/media/banner/cache/1/b58515f018eb873dafa430b6f9ae0c1e/9/8/980x448_1__36.jpg"
                        class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img
                        src="https://ocwckgy6c1obj.vcdn.cloud/media/banner/cache/1/b58515f018eb873dafa430b6f9ae0c1e/9/8/980wx448h_29.jpg"
                        class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img
                        src="https://ocwckgy6c1obj.vcdn.cloud/media/banner/cache/1/b58515f018eb873dafa430b6f9ae0c1e/9/8/980x448_213.jpg"
                        class="d-block w-100" alt="...">
                </div>
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
        <section class="m-4 overflow-hidden">
            <div class="container">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="h5 nav-link active" aria-current="page" href="#">Phim đang chiếu</a>
                    </li>
                    <li class="nav-item">
                        <a class="h5 nav-link" href="#">Phim sắp chiếu</a>
                    </li>
                </ul>

                <div class="row gy-2 mt-2 justify-content-center">
                    @foreach($movies as $movie)
                        <!-- Movie  -->
                        <div class="card mb-3 col-sm-10 col-12 col-xl-5 mx-2"
                             style="max-width: 540px; background: #f5f5f5">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="{{ $movie->poster }}" class="img-fluid rounded-start"
                                         alt="{{ $movie->name }}">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$movie->name}}</h5>
                                        <p class="card-text text-danger">{{ $movie->runningTime }} min</p>
                                        <p class="card-text"><a href="#">Sci-Fi</a> | <a href="#">Thriller</a> | <a
                                                href="#">Drama</a></p>
                                        <p class="card-text">Rated: {{$movie->rated}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Movie : end -->
                    @endforeach

                    @for($i = 0; $i < 8; $i++)
                        <!-- Movie -->
                        <div class="card mb-3 col-sm-10 col-12 col-xl-5 mx-2"
                             style="max-width: 540px;background: #f5f5f5">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="..." class="img-fluid rounded-start"
                                         alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">Gravity (2003)</h5>
                                        <p class="card-text text-danger">91 min</p>
                                        <p class="card-text"><a href="#">Sci-Fi</a> | <a href="#">Thriller</a> | <a
                                                href="#">Drama</a></p>
                                        <p class="card-text">Rated: C13</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Movie: end -->
                    @endfor
                </div>
            </div>

            <div class="container mt-5">
                <h5 class="page-heading">Latest news</h5>

                <div class="row gy-2 mt-2 justify-content-start">
                    @for($i = 0; $i < 3; $i++)
                        {{--  Post item  --}}
                        <div class="card mb-3 col-12 col-sm-6 col-xl-4 mx-2 border-0 w-100" style="max-width: 420px">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img
                                        src="https://cdn.galaxycine.vn/media/2023/4/30/guardians-of-the-galaxy-vol-3-lay-lai-niem-tin-danh-cho-dong-phim-sieu-anh-hung-2_1682827769754.jpg"
                                        class="img-fluid rounded-start w-100 mt-3" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title ">30th Annual Night Of Stars Presented</h5>
                                        <p class="card-text  text-truncate">This content is a little bit
                                            longer.jzxnc,mzxnczx,mnczx,mnczm,cnzx,mcnzx,mcn,mnxcz</p>
                                        <p class="card-text"><small class="text-muted">22 October 2013</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--  Post item: end  --}}
                    @endfor
                </div>
            </div>
        </section>

@endsection
