@extends('web.layout.index')
@section('content')
    <section class="container-lg">
        {{--  Breadcrumb  --}}
        <nav aria-label="breadcrumb mt-5">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="#">Phim đang chiếu</a></li>
                <li class="breadcrumb-item" a>LẬT MẶT 6: TẤM VÉ ĐỊNH MỆNH</li>
                <li class="breadcrumb-item active" aria-current="page">Mua vé</li>
            </ol>
        </nav>

        <div class="mt-5">
            <h4>Thông tin vé</h4>
            <div class="card mb-3 text-light" style="background: #2e292e">
                <div class="row g-0">
                    <div class="col-md-3">
                        <img
                            src="https://ocwckgy6c1obj.vcdn.cloud/media/catalog/product/cache/1/image/c5f0a1eff4c394a251036189ccddaacd/l/m/lm6_2x3_layout.jpg"
                            class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-9">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item bg-transparent d-flex align-items-center text-danger">169 min
                                </li> {{--movie running time--}}
                                <li class="list-group-item bg-transparent d-flex align-items-center text-light"><strong class="pe-1">Quốc
                                        gia: </strong> Việt Nam
                                </li>
                                <li class="list-group-item bg-transparent d-flex align-items-center text-light"><strong class="pe-1">Ngày khởi
                                        chiếu: </strong>26/04/2023
                                </li>
                                <li class="list-group-item bg-transparent d-flex align-items-center text-light"><strong class="pe-1">Đạo
                                        diễn: </strong>Lý
                                    Hải
                                </li>
                                <li class="list-group-item bg-transparent d-flex align-items-center text-light"><strong
                                        class="pe-1">Rated: </strong><img
                                        class="img-fluid rounded-1 border-2" src="images/rated/C16.png" alt="..."
                                        style="max-width: 50px"></li>
                            </ul>
                        </div>
                        <div class="card-body bg-dark">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item bg-transparent d-flex align-items-center text-light justify-content-between">
                                    Combo: <p class="align-items- mb-0">0 đ</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
