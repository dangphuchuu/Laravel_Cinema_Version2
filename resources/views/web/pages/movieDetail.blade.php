@extends('web.layout.index')
@section('content')
    <section class="container-lg">
        {{--  Breadcrumb  --}}
        <nav aria-label="breadcrumb mt-5">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="#">Phim đang chiếu</a></li>
                <li class="breadcrumb-item active" aria-current="page">LẬT MẶT 6: TẤM VÉ ĐỊNH MỆNH</li>
            </ol>
        </nav>

        <div class="movie mt-5">
            {{--  Movie title  --}}
            <h2 class="mt-2">LẬT MẶT 6: TẤM VÉ ĐỊNH MỆNH</h2>

            <div class="row">
                <div class="col-sm-6 col-lg-3">
                    <div class="card border border-4 border-warning rounded-0">
                        <img class="card-img-top rounded-0" alt='...'
                             src="https://ocwckgy6c1obj.vcdn.cloud/media/catalog/product/cache/1/image/c5f0a1eff4c394a251036189ccddaacd/l/m/lm6_2x3_layout.jpg">
                    </div>
                    <div class="card-body border border-4 border-warning border-top-0 d-flex align-items-center">
                        <strong class="card-text p-2">Đánh giá: </strong>
                        <div id='score' class="score"></div>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-9">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex align-items-center">169 min</li> {{--movie running time--}}
                        <li class="list-group-item d-flex align-items-center"><strong class="pe-1">Quốc gia: </strong>Việt
                            Nam
                        </li>
                        <li class="list-group-item d-flex align-items-center"><strong class="pe-1">Ngày khởi
                                chiếu: </strong>26/04/2023
                        </li>
                        <li class="list-group-item d-flex align-items-center"><strong class="pe-1">Thể loại: </stro
                                <a class="link link-dark ps-1" href="#!">Hài</a>,
                                <a class="link link-dark ps-1" href="#!">Tình Cảm</a>,
                                <a class="link link-dark ps-1" href="#!">Tâm Lý</a>,
                                <a class="link link-dark ps-1" href="#!">Hành Động</a>
                        </li>
                        <li class="list-group-item d-flex align-items-center"><strong class="pe-1">Đạo diễn: </strong>Lý
                            Hải
                        </li>
                        <li class="list-group-item d-flex align-items-center text-truncate"><strong class="pe-1">Diễn
                                viên: </strong>
                            Hoàng Mèo, Trần Kim Hải, Thanh Thức, Huy Khánh, Quốc Cường, Trung Dũng
                        </li>
                        <li class="list-group-item d-flex align-items-center"><strong class="pe-1">Rated: </strong><img
                                class="img-fluid rounded-1 border-2" src="images/rated/C16.png" alt="..."
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
                        Một nhóm bạn thân lâu năm bất ngờ nhận được cơ hội đổi đời khi biết tấm vé của cả nhóm trúng
                        giải độc đắc 136.8 tỷ. Đột nhiên An, người nắm giữ tấm vé bất ngờ gặp tai nạn không qua
                        khỏi. Đứng trước món tiền trúng số đáng mơ ước lẽ ra sẽ dễ dàng có được trong tầm tay, nhóm
                        bạn bước chân vào hành trình đi tìm tờ vé số. Nhưng đó chỉ là khởi đầu của vô số những sự
                        kiện không ngờ đến. Liệu hành trình tìm kiếm và chia chác món tiền trong mơ béo bở này sẽ
                        thực sự dẫn đưa cả nhóm đến đâu? Phim mới Lật Mặt 6: Tấm Vé Định Mệnh ra mắt tại các rạp
                        chiếu phim từ 28.04.2023.
                    </div>
                </div>
            </div>
            <div class="row container">
                <h4 class="mt-4">Trailer</h4>

                <div class="">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/OobBWy3avUo"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen>
                    </iframe>
                </div>
            </div>
        </div>

        <h4 class="mt-5">Lịch chiếu phim</h4>
        <div class="row">
            <div class="form-group col-6">
                <form id='select' class="select" method='get'>
                    <label for="select-sort" class="form-label">Rạp</label>
                    <select name="select_item is-invalid" id="select-sort" class="form-select" tabindex="0">
                        <option value="1" selected>TP Hồ Chí Minh</option>
                        <option value="2">Hà Nội</option>
                        <option value="3">Đà Nẵng</option>
                        <option value="4">Hải Phòng</option>
                        <option value="5">Phú Yên</option>
                    </select>
                </form>
            </div>
            <div class="form-group col-6">
                <label class="form-label" for="datepicker">Ngày chiếu</label>
                <input type="date" id="datepicker" value="2023-05-07" class="form-control">
            </div>
            <div class="col-12 mt-2 mb-5">
                <div class="row" style="background: #f5f5f5">
                    @for($i = 1; $i <= 3; $i++)
                        <div class="col-3 d-flex align-items-center border-end border-bottom border-2 border-white">
                            <h4 class="align-middle" scope="row" rowspan="2">HuuMinh
                                Cinema {{ $i }}</h4>
                        </div>
                        {{-- a Theater schedule --}}
                        <div class="col-9 border-bottom border-2 border-white p-2">
                            <div class="row">
                                <div class="fw-bold">2D</div>
                                <div class="d-block gap-2">
                                    <a class="btn btn-warning rounded-0 p-1 m-0 me-4 border-2 border-light"
                                       style="border-width: 2px; border-style: solid dashed;"><p
                                            class="btn btn-warning rounded-0 m-0 border border-light border-1">19 :
                                            30</p></a>
                                    <a class="btn btn-warning rounded-0 p-1 m-0 me-4 border-2 border-light"
                                       style="border-width: 2px; border-style: solid dashed;"><p
                                            class="btn btn-warning rounded-0 m-0 border border-light border-1">22 :
                                            00</p>
                                    </a>
                                    <a class="btn btn-warning rounded-0 p-1 m-0 me-4 border-2 border-light"
                                       style="border-width: 2px; border-style: solid dashed;"><p
                                            class="btn btn-warning rounded-0 m-0 border border-light border-1">22 :
                                            00</p>
                                    </a>
                                </div>
                            </div>


                            <div class="row mt-2 ">
                                <div class="fw-bold">3D</div>
                                <div class="d-grid gap-2 d-md-block">
                                    <a class="btn btn-warning rounded-0 p-1 m-0 me-4 border-2 border-light"
                                       style="border-width: 2px; border-style: solid dashed;"><p
                                            class="btn btn-warning rounded-0 m-0 border border-light border-1">16 :
                                            30</p>
                                    </a>
                                    <a class="btn btn-warning rounded-0 p-1 m-0 me-4 border-2 border-light"
                                       style="border-width: 2px; border-style: solid dashed;"><p
                                            class="btn btn-warning rounded-0 m-0 border border-light border-1">18 :
                                            00</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        {{-- a Theater schedule: end --}}
                    @endfor
                </div>
            </div>
        </div>
    </section>
@endsection
