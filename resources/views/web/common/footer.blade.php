<footer class="container-fluid mt-5 py-5 shadow" style="background: #fafafa">
    <section class="container">
        <div class="row">
            <div class="col-sm-4 col-xl-2">
                <h5>{{$info['name']}}</h5>
                <ul class="list-unstyled text-small">
                    <li><a class="link-secondary" href="#">Giới thiệu</a></li>
                    <li><a class="link-secondary" href="movie-list-left.html">Phim</a></li>
                    <li><a class="link-secondary" href="trailer.html">Trailers</a></li>
                    <li><a class="link-secondary" href="rates-left.html">Rates</a></li>
                </ul>
            </div>
            <div class="col-sm-4 col-xl-2">
                <h5>@lang('lang.terms_of_use')</h5>
                <ul class="list-unstyled text-small">
                    <li><a class="link-secondary" href="coming-soon.html">Điều khoản chung</a></li>
                    <li><a class="link-secondary" href="cinema-list.html">Chính sách thanh toán</a></li>
                    <li><a class="link-secondary" href="offers.html">Chính sách bảo mật</a></li>
                    <li><a class="link-secondary" href="news-left.html">Câu hỏi thường gặp</a></li>
                </ul>
            </div>
            <div class="col-sm-4 col-xl-2">
                <h5>@lang('lang.support')</h5>
                <ul class="list-unstyled text-small">
                    <li><a class="link-secondary" href="#">Liên hệ</a></li>
                    <li><a class="link-secondary" href="gallery-four.html">Góp ý</a></li>
                </ul>
            </div>
            <div class="col-sm-12 col-xl-6">
                <h5>@lang('lang.contact')</h5>
                <div class="row">
                    <p class="fs-4 col-sm-12 col-xl-6">
                        {{$info['email']}}
                    </p>
                    <div class="social col-sm-12 col-xl-6">
                        <a class="link link-dark text-decoration-none rounded-circle fs-4" href="{!! $info['facebook'] !!}"><i class="fa-brands fa-facebook"></i></a>
                        <a class="link link-dark text-decoration-none rounded-circle fs-4" href="{!! $info['twitter'] !!}"><i class="fa-brands fa-twitter"></i></a>
                        <a class="link link-dark text-decoration-none rounded-circle fs-4" href="{!! $info['instagram'] !!}"><i class="fa-brands fa-instagram"></i></a>
                        <a class="link link-dark text-decoration-none rounded-circle fs-4" href="{!! $info['youtube'] !!}"><i class="fa-brands fa-youtube"></i></a>
                    </div>
                </div>
                <div class="row">
                    <p class="link-info">
                        {{$info['worktime']}}
                    </p>
                </div>
                <div class="row">
                    <p class="link-info">
                        Hotline: {{$info['phone']}}
                    </p>
                </div>
                <p class="copy mt-4">{{$info['copyright']}}</p>
            </div>
        </div>
    </section>
</footer>