@extends('user.layout.index')
@section('content')
    <section class="container-lg">
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
        <div class="mt-5" id="mainContent">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="h5 nav-link active" href="#phimdangchieu"
                       aria-controls="phimdangchieu"
                       aria-expanded="true" data-bs-toggle="collapse" data-bs-target="#phimdangchieu">
                        Phim đang chiếu
                    </a>
                </li>
                <li class="nav-item">
                    <a class="h5 nav-link link-secondary" href="#phimsapchieu" aria-controls="phimsapchieu"
                       aria-expanded="false"
                       data-bs-toggle="collapse" data-bs-target="#phimsapchieu">Phim sắp chiếu</a>
                </li>
            </ul>

            <div id="phimsapchieu" class="row g-4 mt-2 row-cols-1 row-cols-md-2 collapse "
                 data-bs-parent="#mainContent">
                @for($i = 0; $i < 6; $i++)
                    <!-- Movie -->
                    <div class="col">
                        <div class="card px-0 overflow-hidden"
                             style="background: #f5f5f5">
                            <div class="row g-0">
                                <div class="col-lg-4 col-12">
                                    <img
                                        src="https://www.cgv.vn/media/catalog/product/cache/1/thumbnail/190x260/2e2b8cd282892c71872b9e67d2cb5039/t/h/the_accursed.c_n_th_nh_n_t_c_i_m_-_payoff_poster_-_kc_12.05.2023_1_.jpg"
                                        class="img-fluid w-100"
                                        alt="...">
                                </div>
                                <div class="col-lg-8 col-12">
                                    <div class="card-body">
                                        <h5 class="card-title">LẬT MẶT 6: TẤM VÉ ĐỊNH MỆNH</h5>
                                        <p class="card-text text-danger">132 phút</p>
                                        <p class="card-text">
                                            <a class="link link-dark" href="#">Hài</a> |
                                            <a class="link link-dark" href="#">Hành động</a> |
                                            <a class="link link-dark" href="#">Tâm lý</a>
                                        </p>
                                        <p class="card-text">Rated: <b class="text-danger">C16</b> - PHIM ĐƯỢC PHỔ BIẾN
                                            ĐẾN
                                            NGƯỜI XEM TỪ ĐỦ 16 TUỔI
                                            TRỞ LÊN (16+)</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Movie: end -->
                @endfor
            </div>

            <div id="phimdangchieu" class="row g-4 mt-2 row-cols-1 row-cols-md-2 collapse show"
                 data-bs-parent="#mainContent">
                @for($i = 0; $i < 6; $i++)
                    <!-- Movie -->
                    <div class="card-col">
                        <article class="card px-0 overflow-hidden"
                                 style="background: #f5f5f5">
                            <div class="row g-0">
                                <div class="col-lg-4 col-12">
                                    <a href="#!">
                                        <img
                                            src="https://ocwckgy6c1obj.vcdn.cloud/media/catalog/product/cache/1/image/c5f0a1eff4c394a251036189ccddaacd/l/m/lm6_2x3_layout.jpg"
                                            class="img-fluid rounded w-100"
                                            alt="...">
                                    </a>
                                </div>
                                <div class="col-lg-8 col-12">
                                    <div class="card-body">
                                        <a href="#!1" class="link link-dark text-decoration-none">
                                            <h5 class="card-title">LẬT MẶT 6: TẤM VÉ ĐỊNH MỆNH</h5>
                                            <p class="card-text text-danger">132 phút</p>
                                            <p class="card-text">
                                                <a class="link link-dark" href="#!2">Hài</a> |
                                                <a class="link link-dark" href="#!2">Hành động</a> |
                                                <a class="link link-dark" href="#!2">Tâm lý</a>
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
                @endfor
            </div>

            <div class="mt-5">
                <h5 class="page-heading">Tin tức mới nhất</h5>

                <div class="row mt-2 g-2 row-cols-1 row-cols-sm-2 row-cols-md-3 justify-content-start">
                    {{--  Post item  --}}
                    <div class="col">
                        <div class="card border-0">
                            <div class="row g-0">
                                <div class="col-lg-4 col-12">
                                    <a class="link" href="#!">
                                        <img
                                            src="https://cdn.galaxycine.vn/media/2023/4/30/guardians-of-the-galaxy-vol-3-lay-lai-niem-tin-danh-cho-dong-phim-sieu-anh-hung-2_1682827769754.jpg"
                                            class="img-fluid mt-3 w-100" alt="...">
                                    </a>
                                </div>
                                <div class="col-lg-8 col-12">
                                    <div class="card-body">
                                        <a href="#!1" class="link link-dark text-decoration-none">
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
                                            Tỷ</h5>
                                        <p class="card-text text-truncate">Lật Mặt 6: Tấm Vé Định Mệnh đã ra mắt tại
                                            phòng
                                            vé và tiếp tục tạo cơn địa chấn đáng chú ý vào dịp Lễ.</p>
                                        <p class="card-text"><small class="text-muted">22 October 2013</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--  Post item: end  --}}
                </div>
            </div>
        </div>

    </section>

@endsection
