@extends('web.layout.index')
@section('events')
    active
@endsection
@section('content')
    <section class="container-lg">
        <!-- Main content -->
        <div class="mt-5" id="Events">
            <ul class="nav justify-content-start mb-4 align-items-center">
                <li class="nav-item">
                    <a class="h5 nav-link link-warning active fw-bold border-bottom border-2 border-warning"
                       href="#tintuc"
                       role="button"
                       data-bs-target="#tintuc" disabled>
                        @lang('lang.news')
                    </a>
                </li>
            </ul>

            <div id="tintuc" class="d-flex flex-column" data-bs-parent="#Events">
                <?php $i = 1 ?>
                @foreach($posts as $post)
                        <?php $i++ ?>
                    @if($i % 2 == 0)
                        <!-- Post -->
                        <div class="card text-bg-light mb-3">
                            <div class="d-flex">
                                <div class="flex-shrink-0">
                                    <a href="/movie/1">
                                        @if(strstr($post->image,"https") === "")
                                            <img class="img-fluid rounded-start"
                                                 src="https://res.cloudinary.com/{!! $cloud_name !!}/image/upload/{{ $post->image }}.jpg"
                                                 alt="">
                                        @else
                                            <img class="img-fluid rounded-start" src="{{ $post->image }}" alt="">
                                        @endif
                                    </a>
                                </div>
                                <div class="flex-grow-1">
                                    <div class="card-body h-75">
                                        <h5 class="card-title">{{ $post->title }}</h5>
                                        <p class="card-text"
                                           style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 2;
                                           -webkit-box-orient: vertical">
                                            {{ $post->content }}
                                        </p>
                                        <p class="card-text">
                                            <small class="text-body-secondary">{{ date('d-m-Y H:i', strtotime($post->created_at)) }}</small>
                                        </p>
                                    </div>
                                    <div class="card-footer h-25">
                                        <a class="btn btn-primary float-end">XEM</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Post: end -->
                    @else
                        <!-- Post -->
                        <div class="card text-bg-light mb-3">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <div class="card-body h-75">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional
                                            content. This content is a little bit longer.</p>
                                        <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                                    </div>
                                    <div class="card-footer h-25">
                                        <a class="btn btn-primary float-start">XEM</a>
                                    </div>
                                </div>
                                <div class="flex-shrink-0">
                                    <a href="/movie/1">
                                        <img
                                            src="https://www.cgv.vn/media/catalog/product/cache/1/thumbnail/190x260/2e2b8cd282892c71872b9e67d2cb5039/t/h/the_accursed.c_n_th_nh_n_t_c_i_m_-_payoff_poster_-_kc_12.05.2023_1_.jpg"
                                            class="img-fluid rounded-start" alt="...">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- Post: end -->
                    @endif
                @endforeach
            </div>

            {{--            <div id="sukien" class="d-flex flex-column collapse" data-bs-parent="#Events">--}}
            {{--                @for($i = 0; $i < 4; $i++)--}}
            {{--                    @if($i % 2 == 0)--}}
            {{--                        <!-- Post -->--}}
            {{--                        <div class="card text-bg-light mb-3">--}}
            {{--                            <div class="d-flex">--}}
            {{--                                <div class="flex-shrink-0">--}}
            {{--                                    <a href="/movie/1">--}}
            {{--                                        <img--}}
            {{--                                            src="https://www.cgv.vn/media/banner/cache/1/b58515f018eb873dafa430b6f9ae0c1e/b/i/birthday_popcorn_box_240x201.png"--}}
            {{--                                            class="img-fluid rounded-start" alt="...">--}}
            {{--                                    </a>--}}
            {{--                                </div>--}}
            {{--                                <div class="flex-grow-1">--}}
            {{--                                    <div class="card-body h-75">--}}
            {{--                                        <h5 class="card-title">Card title</h5>--}}
            {{--                                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional--}}
            {{--                                            content. This content is a little bit longer.</p>--}}
            {{--                                        <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>--}}
            {{--                                    </div>--}}
            {{--                                    <div class="card-footer h-25">--}}
            {{--                                        <a class="btn btn-primary float-end">XEM</a>--}}
            {{--                                    </div>--}}
            {{--                                </div>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                        <!-- Post: end -->--}}
            {{--                    @else--}}
            {{--                        <!-- Post -->--}}
            {{--                        <div class="card text-bg-light mb-3">--}}
            {{--                            <div class="d-flex">--}}
            {{--                                <div class="flex-grow-1">--}}
            {{--                                    <div class="card-body h-75">--}}
            {{--                                        <h5 class="card-title">Card title</h5>--}}
            {{--                                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional--}}
            {{--                                            content. This content is a little bit longer.</p>--}}
            {{--                                        <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>--}}
            {{--                                    </div>--}}
            {{--                                    <div class="card-footer h-25">--}}
            {{--                                        <a class="btn btn-primary float-start">XEM</a>--}}
            {{--                                    </div>--}}
            {{--                                </div>--}}
            {{--                                <div class="flex-shrink-0">--}}
            {{--                                    <a href="/movie/1">--}}
            {{--                                        <img--}}
            {{--                                            src="https://www.cgv.vn/media/banner/cache/1/b58515f018eb873dafa430b6f9ae0c1e/b/i/birthday_popcorn_box_240x201.png"--}}
            {{--                                            class="img-fluid rounded-start" alt="...">--}}
            {{--                                    </a>--}}
            {{--                                </div>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                        <!-- Post: end -->--}}
            {{--                    @endif--}}
            {{--                @endfor--}}
            {{--            </div>--}}
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
