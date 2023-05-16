@extends('web.layout.index')
@section('movies')
    active
@endsection
@section('content')
    <section class="container-lg clearfix">
        <!-- Main content -->
        <div class="mt-5" id="Movies">
            <ul class="nav justify-content-start mb-4">
                <li class="nav-item">
                    <button class="h5 nav-link link-warning active fw-bold border-bottom border-2 border-warning"
                            aria-expanded="true"
                            data-bs-toggle="collapse"
                            data-bs-target="#phimdangchieu" disabled>
                        Phim đang chiếu
                    </button>
                </li>
                <li class="vr mx-5"></li>
                <li class="nav-item me-auto">
                    <button class="h5 nav-link link-secondary"
                            aria-expanded="false"
                            data-bs-toggle="collapse" data-bs-target="#phimsapchieu">
                        Phim sắp chiếu
                    </button>
                </li>

                <div class="form-group ms-2">
                    <label class="form-label" for="cast">Diễn viên</label>
                    <input id="cast" name="cast" type="text" class="form-control">
                </div>

                <div class="form-group ms-2">
                    <label class="form-label" for="director">Đạo diễn</label>
                    <input id="cast" name="director" type="text" class="form-control">
                </div>

                <div class="form-group ms-2">
                    <label class="form-label" for="director">Thể loại</label>
                    <select id="cast" name="director" class="form-select dropdown"></select>
                    <ul class="dropdown-menu">
                        @foreach($movieGenres as $gen)
                        <li class="dropdown-item">{!! $gen->name !!} </li>
                        @endforeach
                    </ul>
                </div>
            </ul>

            <div id="phimsapchieu" class="row g-4 mt-2 row-cols-1 row-cols-md-2 collapse"
                 data-bs-parent="#Movies">
                @for($i = 0; $i < 6; $i++)
                    <!-- Movie -->
                    <div class="col">
                        <div class="card px-0 overflow-hidden"
                             style="background: #f5f5f5">
                            <div class="row g-0">
                                <div class="col-lg-4 col-12">
                                    <a href="/movie/1">
                                        <img
                                            src="https://www.cgv.vn/media/catalog/product/cache/1/thumbnail/190x260/2e2b8cd282892c71872b9e67d2cb5039/t/h/the_accursed.c_n_th_nh_n_t_c_i_m_-_payoff_poster_-_kc_12.05.2023_1_.jpg"
                                            class="img-fluid w-100"
                                            alt="...">
                                    </a>
                                </div>
                                <div class="col-lg-8 col-12">
                                    <div class="card-body">
                                        <a href="/movie/1">
                                            <h5 class="card-title">LẬT MẶT 6: TẤM VÉ ĐỊNH MỆNH</h5>
                                            <p class="card-text text-danger">132 phút</p>
                                            <p class="card-text">
                                                <a class="link link-dark" href="#">Hài</a> |
                                                <a class="link link-dark" href="#">Hành động</a> |
                                                <a class="link link-dark" href="#">Tâm lý</a>
                                            </p>
                                            <p class="card-text">Rated: <b class="text-danger">C16</b> - PHIM ĐƯỢC PHỔ
                                                BIẾN
                                                ĐẾN
                                                NGƯỜI XEM TỪ ĐỦ 16 TUỔI
                                                TRỞ LÊN (16+)</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Movie: end -->
                @endfor
            </div>

            <div id="phimdangchieu" class="row g-4 mt-2 row-cols-1 row-cols-md-2 collapse show"
                 data-bs-parent="#Movies">
                @for($i = 0; $i < 6; $i++)
                    <!-- Movie -->
                    <div class="card-col">
                        <article class="card px-0 overflow-hidden"
                                 style="background: #f5f5f5">
                            <div class="row g-0">
                                <div class="col-lg-4 col-12">
                                    <a href="/movie/1">
                                        <img
                                            src="https://ocwckgy6c1obj.vcdn.cloud/media/catalog/product/cache/1/image/c5f0a1eff4c394a251036189ccddaacd/l/m/lm6_2x3_layout.jpg"
                                            class="img-fluid rounded w-100"
                                            alt="...">
                                    </a>
                                </div>
                                <div class="col-lg-8 col-12">
                                    <div class="card-body">
                                        <a href="movie/1" class="link link-dark text-decoration-none">
                                            <h5 class="card-title">LẬT MẶT 6: TẤM VÉ ĐỊNH MỆNH</h5>
                                            <p class="card-text text-danger">132 phút</p>
                                            <p class="card-text">
                                                <a class="link link-dark" href="#">Hài</a> |
                                                <a class="link link-dark" href="#">Hành động</a> |
                                                <a class="link link-dark" href="#">Tâm lý</a>
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
