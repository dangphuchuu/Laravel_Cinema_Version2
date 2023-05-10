@extends('web.layout.index')
@section('content')
    <section class="container-lg">
        {{--  Breadcrumb  --}}
        <nav aria-label="breadcrumb mt-5">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#" class="link link-dark">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="#" class="link link-dark">Phim đang chiếu</a></li>
                <li class="breadcrumb-item"><a href="#" class="link link-dark"> MẶT 6: TẤM VÉ ĐỊNH MỆNH</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="#"
                                                                          class="link link-secondary disabled text-decoration-none">Mua
                        vé</a></li>
            </ol>
        </nav>

        <ul class="nav justify-content-center">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Active</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#">Link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled">Disabled</a>
            </li>
        </ul>

        <div class="mt-5">
            <h4>Thông tin vé</h4>
            <div class="card mb-3 text-light" style="background: #2e292e;">
                <div class="row g-0">
                    <div class="col-md-3">
                        <img
                            src="https://ocwckgy6c1obj.vcdn.cloud/media/catalog/product/cache/1/image/c5f0a1eff4c394a251036189ccddaacd/l/m/lm6_2x3_layout.jpg"
                            class="img-fluid rounded-start h-auto" alt="...">
                    </div>
                    <div class="col-md-9">
                        <div class="card-body">
                            <h5 class="card-title">LẬT MẶT 6: TẤM VÉ ĐỊNH MỆNH</h5>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item bg-transparent d-flex align-items-center text-light">
                                <strong
                                    class="pe-1">Suất chiếu: </strong>07/05/2023 19:00
                            </li> {{--movie running time--}}
                            <li class="list-group-item bg-transparent d-flex align-items-center text-light">
                                <strong
                                    class="pe-1">Rạp: </strong> HuuMinh Cinema 1
                            </li>
                            <li class="list-group-item bg-transparent d-flex align-items-center text-light">
                                <strong
                                    class="pe-1">Phòng: </strong> Room 1
                            </li>
                            <li class="list-group-item bg-transparent d-flex align-items-center text-light">
                                <strong
                                    class="pe-1">Rated: </strong><img
                                    class="img-fluid rounded-1 border-2" src="images/rated/C16.png" alt="..."
                                    style="max-width: 50px"></li>
                        </ul>
                        <ul class="list-group list-group-flush bg-dark ">
                            <li class="list-group-item bg-transparent d-flex align-items-center text-light justify-content-between">
                                <span><i class="fa-solid fa-popcorn"></i>&numsp;Combo:</span>
                                <span>0 đ</span>
                            </li>
                            <li class="list-group-item bg-transparent d-flex align-items-center text-light justify-content-between">
                                <span><i class="fa-solid fa-seat-airline text-uppercase"></i>&numsp;Ghế:</span>
                                <span>G9</span>
                            </li>
                            <li class="list-group-item bg-transparent d-flex align-items-center text-light justify-content-between">
                                <span><i class="fa-solid fa-equals"></i>&numsp;Tổng thanh toán:</span>
                                <p>0 đ</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-5">
            <h4>Chọn ghế</h4>

            <div class="container">
                @for($i = 65; $i < 80; $i++)
                    @if($i != 0)
                        <div class="row">
                            <div class="col-1 d-block m-1 border border-1 border-dark p-1 text-center"
                                 style="width: 40px; height: 40px"><span class="align-middle">{{ chr($i) }}</span></div>
                            <div class="col-11">
                                <div class="row w-100 d-inline-flex justify-content-center">
                                    @for($j = 0; $j <= 12; $j++)
                                        @if($j != 0)
                                            <div class="w-auto gx-2">
                                                <a href="/tickets/1"
                                                   class="link link-dark text-decoration-none d-block m-1 border border-1 border-dark p-1 text-center"
                                                   style="width: 40px; height: 40px">
                                                    <span class="align-middle">{{ $j }}</span>
                                                </a>
                                            </div>
                                        @endif
                                    @endfor
                                </div>
                            </div>
                        </div>
                    @endif
                @endfor
                <div class="row mt-5">
                    <div class="col-1 d-block m-1 border border-0 border-dark p-1 text-center"
                         style="width: 40px; height: 40px"><span class="align-middle"></span></div>
                    <div class="col-11">
                        <div class="row w-100 d-inline-flex justify-content-center">
                            @for($j = 0; $j <= 12; $j++)
                                @if($j != 0)
                                    <div class="w-auto gx-2">
                                        <div
                                            class="link link-dark text-decoration-none d-block m-1 border border-1 border-dark p-1 text-center"
                                            style="width: 40px; height: 40px">
                                            <span class="align-middle">{{ $j }}</span>
                                        </div>
                                    </div>
                                @endif
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
