@extends('web.layout.index')
@section('events')
    active
@endsection
@section('content')
    <section class="container-lg clearfix">
        <!-- Main content -->
        <div class="mt-5" id="Events">
            <ul class="nav justify-content-start mb-4 align-items-center">
                <li class="nav-item">
                    <button class="h5 nav-link link-warning active fw-bold border-bottom border-2 border-warning"
                            aria-expanded="true"
                            data-bs-toggle="collapse"
                            data-bs-target="#tintuc" disabled>
                        Tin tức
                    </button>
                </li>
                <li class="vr mx-5"></li>
                <li class="nav-item">
                    <button class="h5 nav-link link-secondary"
                            aria-expanded="false"
                            data-bs-toggle="collapse" data-bs-target="#sukien">
                        Sự kiện
                    </button>
                </li>

            </ul>

            <div id="tintuc" class="d-flex flex-column" data-bs-parent="#Events">
                @for($i = 0; $i < 6; $i++)
                    @if($i % 2 == 0)
                        <!-- Post -->
                        <div class="d-flex p-2 m-1 w-100" style="background: #f5f5f5">
                            <div class="flex-shrink-0 px-3">
                                <a href="/movie/1">
                                    <img
                                        src="https://www.cgv.vn/media/catalog/product/cache/1/thumbnail/190x260/2e2b8cd282892c71872b9e67d2cb5039/t/h/the_accursed.c_n_th_nh_n_t_c_i_m_-_payoff_poster_-_kc_12.05.2023_1_.jpg"
                                        class="img-fluid w-100" alt="...">
                                </a>
                            </div>
                            <div class="flex-grow-1 d-flex flex-column">
                                    <h5></h5>
                                    Lật Mặt 6: Tấm Vé Định Mệnh đã ra mắt tại
                                    phòng vé và tiếp tục tạo cơn địa chấn đáng chú ý vào dịp Lễ.
                                    Lật Mặt 6: Tấm Vé Định Mệnh đã ra mắt tại
                                    phòng vé và tiếp tục tạo cơn địa chấn đáng chú ý vào dịp Lễ.
                                    Lật Mặt 6: Tấm Vé Định Mệnh đã ra mắt tại
                                    phòng vé và tiếp tục tạo cơn địa chấn đáng chú ý vào dịp Lễ.
                                    Lật Mặt 6: Tấm Vé Định Mệnh đã ra mắt tại
                                    phòng vé và tiếp tục tạo cơn địa chấn đáng chú ý vào dịp Lễ.
                                    Lật Mặt 6: Tấm Vé Định Mệnh đã ra mắt tại
                                    phòng vé và tiếp tục tạo cơn địa chấn đáng chú ý vào dịp Lễ.
                                    Lật Mặt 6: Tấm Vé Định Mệnh đã ra mắt tại
                                    phòng vé và tiếp tục tạo cơn địa chấn đáng chú ý vào dịp Lễ.Lật Mặt 6: Tấm Vé Định
                                    Mệnh đã ra mắt tại
                                    phòng vé và tiếp tục tạo cơn địa chấn đáng chú ý vào dịp Lễ.Lật Mặt 6: Tấm Vé Định
                                    Mệnh đã ra mắt tại
                                    phòng vé và tiếp tục tạo cơn địa chấn đáng chú ý vào dịp Lễ.
                                    Lật Mặt 6: Tấm Vé Định Mệnh đã ra mắt tại
                                    phòng vé và tiếp tục tạo cơn địa chấn đáng chú ý vào dịp Lễ.
                            </div>
                            <a href="#" class="btn btn-warning btn-sm position-absolute bottom-0 end-0">XEM THÊM</a>
                        </div>
                        <!-- Post: end -->
                    @else
                        <!-- Post -->
                        <div class="d-flex p-2 m-1 align-items-stretch" style="background: #f5f5f5">
                            <div class="flex-grow-1 position-relative">
                                <a href="/movie/1" class="link link-dark text-decoration-none">
                                    <h5 class="w-100 fw-bold">LẬT MẶT 6: TẤM VÉ ĐỊNH MỆNH</h5>
                                    <p class="mb-auto">

                                    </p>
                                </a>
                                <a href="#" class="btn btn-warning btn-sm position-absolute bottom-0 start-0">XEM
                                    THÊM</a>
                            </div>
                            <div class="flex-shrink-0 px-3">
                                <a href="/movie/1">
                                    <img
                                        src="https://www.cgv.vn/media/catalog/product/cache/1/thumbnail/190x260/2e2b8cd282892c71872b9e67d2cb5039/t/h/the_accursed.c_n_th_nh_n_t_c_i_m_-_payoff_poster_-_kc_12.05.2023_1_.jpg"
                                        class="img-fluid w-100" alt="...">
                                </a>
                            </div>
                        </div>
                        <!-- Post: end -->
                    @endif
                @endfor
            </div>

            <div id="sukien" class="row g-4 mt-2 row-cols-1 row-cols-md-2 collapse show" data-bs-parent="#Events">
                @for($i = 0; $i < 6; $i++)
                    <!-- Movie -->
                    <div class="card-col">
                        <article class="card px-0 overflow-hidden" style="background: #f5f5f5">
                            <div class="row g-0">
                                <div class="col-lg-4 col-12">
                                    <a href="/movie/1">
                                        <img
                                            src="https://ocwckgy6c1obj.vcdn.cloud/media/catalog/product/cache/1/image/c5f0a1eff4c394a251036189ccddaacd/l/m/lm6_2x3_layout.jpg"
                                            class="img-fluid rounded w-100" alt="...">
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
        $("#Events .nav .nav-item .nav-link").on("click", function () {
            $("#Events .nav-item").find(".active").removeClass("active link-warning fw-bold border-bottom border-2 border-warning").addClass("link-secondary").prop('disabled', false);
            $(this).addClass("active link-warning fw-bold border-bottom border-2 border-warning").removeClass("link-secondary").prop('disabled', true);
        });
    </script>
@endsection
