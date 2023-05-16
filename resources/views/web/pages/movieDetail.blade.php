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
                        <li class="list-group-item d-flex align-items-center text-danger">169 min</li> {{--movie running time--}}
                        <li class="list-group-item d-flex align-items-center"><strong class="pe-1">Quốc gia: </strong>Việt
                            Nam
                        </li>
                        <li class="list-group-item d-flex align-items-center"><strong class="pe-1">Ngày khởi
                                chiếu: </strong>26/04/2023
                        </li>
                        <li class="list-group-item d-flex align-items-center"><strong class="pe-1">Thể loại: </strong>
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

        @include('web.layout.schedulesByMovie')

    </section>
@endsection
