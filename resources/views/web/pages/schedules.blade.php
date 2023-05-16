@extends('web.layout.index')
@section('schedules')
    active
@endsection

@section('content')
    <section class="container-lg clearfix">
        <!-- Main content -->
        <div class="mt-5" id="schedules">
            <ul class="nav justify-content-center mb-4">
                <li class="nav-item">
                    <button class="h5 nav-link link-warning active fw-bold border-bottom border-2 border-warning"
                            aria-expanded="true"
                            data-bs-toggle="collapse"
                            data-bs-target="#lichtheophim" disabled>
                        Lịch chiếu theo phim
                    </button>
                </li>
                <li class="vr mx-5"></li>
                <li class="nav-item">
                    <button class="h5 nav-link link-secondary"
                            aria-expanded="false"
                            data-bs-toggle="collapse" data-bs-target="#lichtheorap">Lịch chiếu theo rạp
                    </button>
                </li>
            </ul>

            <div id="lichtheorap" class="collapse" data-bs-parent="#schedules">
                <div class="d-flex flex-row mt-4">
                    <div class="flex-city p-2 m-1 border-0">
                        <button class="btn btn-warning p-3" aria-expanded="true" data-bs-toggle="collapse"
                                data-bs-target="#tphcm" disabled>TP Hồ Chí Minh
                        </button>
                    </div>
                    <div class="flex-city p-2 m-1 border-0">
                        <button class="btn btn-secondary p-3" aria-expanded="false" data-bs-toggle="collapse"
                                data-bs-target="#hanoi">Hà Nội
                        </button>
                    </div>
                    <div class="flex-city p-2 m-1 border-0">
                        <button class="btn btn-secondary  p-3" aria-expanded="false" data-bs-toggle="collapse"
                                data-bs-target="#danang">Đà Nẵng
                        </button>
                    </div>
                </div>
                <div id="theater">
                    <div id="tphcm" data-bs-parent="#theater"
                         class="row g-4 mt-2 row-cols-1 row-cols-sm-2 row-cols-md-4 show collapse">
                        @for($i = 0; $i < 6; $i++)
                            <!-- Movie -->
                            <div class="col">
                                <div class="card px-0 overflow-hidden"
                                     style="background: #f5f5f5">
                                    <div class="card-body">
                                        <a href="/schedules/#" class="link link-dark text-decoration-none text-center">
                                            <h5 class="card-title fs-4">Theater {{ $i }}</h5>
                                            <p class="card-text fs-6 text-secondary">
                                                <i class="fa-solid fa-location-dot"></i> 180 Cao Lỗ, Phường 4, Quận 8,
                                                TP.HCM
                                            </p>
                                        </a>
                                    </div>
                                    <div class="card-footer">
                                        <a href="https://goo.gl/maps/hfTBKWjGTjVxTHi98"
                                           class="btn w-100 h-100 text-uppercase" target="_blank">xem Bản đồ</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Movie: end -->
                        @endfor
                    </div>

                    <div id="hanoi" data-bs-parent="#theater"
                         class="row g-4 mt-2 row-cols-1 row-cols-sm-2 row-cols-md-4 collapse">
                        @for($i = 0; $i < 4; $i++)
                            <!-- Movie -->
                            <div class="col">
                                <div class="card px-0 overflow-hidden"
                                     style="background: #f5f5f5">
                                    <div class="card-body">
                                        <a href="/schedules/#" class="link link-dark text-decoration-none text-center">
                                            <h5 class="card-title fs-4">Theater {{ $i }}</h5>
                                            <p class="card-text fs-6 text-secondary">
                                                <i class="fa-solid fa-location-dot"></i> 180 Cao Lỗ, Phường 4, Quận 8,
                                                TP.HCM
                                            </p>
                                        </a>
                                    </div>
                                    <div class="card-footer">
                                        <a href="https://goo.gl/maps/hfTBKWjGTjVxTHi98"
                                           class="btn w-100 h-100 text-uppercase" target="_blank">xem Bản đồ</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Movie: end -->
                        @endfor
                    </div>

                    <div id="danang" data-bs-parent="#theater"
                         class="row g-4 mt-2 row-cols-1 row-cols-sm-2 row-cols-md-4 collapse">
                        @for($i = 0; $i < 2; $i++)
                            <!-- Movie -->
                            <div class="col">
                                <div class="card  text-bg-warning px-0 overflow-hidden">
                                    <button class="btn" aria-expanded="true"
                                            data-bs-toggle="collapse" data-bs-target="#schedulesByTheater">
                                        <div class="card-body">
                                            <h5 class="card-title text-center fs-4">Theater {{ $i }}</h5>
                                            <p class="card-text fs-6">
                                                <i class="fa-solid fa-location-dot"></i> 180 Cao Lỗ, Phường 4, Quận 8,
                                                TP.HCM
                                            </p>
                                        </div>
                                    </button>
                                    <div class="card-footer">
                                        <a href="https://goo.gl/maps/hfTBKWjGTjVxTHi98" class="btn w-100 h-100"
                                           target="_blank">xem Bản đồ</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Movie: end -->
                        @endfor
                    </div>
                </div>

                @include('web.layout.schedulesByTheater')
            </div>

            <div id="lichtheophim" class="collapse show" data-bs-parent="#schedules">
                {{-- Carousel Movies --}}
                <div class="d-flex flex-row flex-nowrap overflow-auto mb-4">
                    @for($i = 0; $i < 10; $i++)
                        <button class="btn btn-block border-0 p-2">
                            <img
                                src="https://www.cgv.vn/media/catalog/product/cache/1/thumbnail/190x260/2e2b8cd282892c71872b9e67d2cb5039/t/h/the_accursed.c_n_th_nh_n_t_c_i_m_-_payoff_poster_-_kc_12.05.2023_1_.jpg"
                                class="rounded d-block"
                                alt="..." style="max-width: 320px">
                        </button>
                    @endfor
                </div>

                <!-- Movie -->
                <div class="d-flex flex-column flex-sm-row align-items-center" style="background: #f5f5f5">
                    <div class="flex-shrink-0 justify-content-center">
                        <a href="/movie/1">
                            <img
                                src="https://ocwckgy6c1obj.vcdn.cloud/media/catalog/product/cache/1/image/c5f0a1eff4c394a251036189ccddaacd/l/m/lm6_2x3_layout.jpg"
                                class="img-fluid"
                                alt="..." style="max-height: 361px; max-width: 241px">
                        </a>
                    </div>
                    <div class="flex-grow-1 ms-3 mt-3 mt-sm-0">
                        <h5 class="fw-bold text-center text-sm-start">LẬT MẶT 6: TẤM VÉ ĐỊNH MỆNH</h5>
                        <p class="card-text text-danger text-center text-sm-start">132 phút</p>
                        <p class="card-text text-center text-sm-start">
                            <a class="link link-dark" href="#!2">Hài</a> |
                            <a class="link link-dark" href="#!2">Hành động</a> |
                            <a class="link link-dark" href="#!2">Tâm lý</a>
                        </p>
                        <p class="card-text">Rated: <b class="text-danger">C16</b> - PHIM ĐƯỢC
                            PHỔ
                            BIẾN ĐẾN
                            NGƯỜI XEM TỪ ĐỦ 16 TUỔI
                            TRỞ LÊN (16+)</p>
                    </div>
                </div>
                <!-- Movie: end -->

                @include('web.layout.schedulesByMovie')
            </div>


        </div>
    </section>
@endsection

@section('js')
    <script>
        $("#schedules .nav .nav-item .nav-link").on("click", function () {
            $("#schedules .nav-item").find(".active").removeClass("active link-warning fw-bold border-bottom border-2 border-warning").addClass("link-secondary").prop('disabled', false);
            $(this).addClass("active link-warning fw-bold border-bottom border-2 border-warning").removeClass("link-secondary").prop('disabled', true);
        });

        $("#lichtheorap .d-flex .flex-city .btn").on("click", function () {
            $("#lichtheorap .flex-city").find(".btn").removeClass("btn-warning").addClass("btn-secondary").prop('disabled', false);
            $(this).addClass("btn-warning").removeClass("btn-secondary").prop('disabled', true);
        });
    </script>
@endsection
