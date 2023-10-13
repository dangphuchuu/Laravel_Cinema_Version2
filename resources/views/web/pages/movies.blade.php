@extends('web.layout.index')
@section('movies')
active link-danger
@endsection
@section('content')
    <section class="container-lg clearfix py-5">
        <!-- Main content -->
        <div class="mt-5 h-auto" id="Movies" style="height: 1600px">
            <ul class="nav justify-content-start mb-4 align-items-center">
                <li class="nav-item">
                    <button class="h5 nav-link link-danger active fw-bold border-bottom border-2 border-danger"
                            aria-expanded="true"
                            data-bs-toggle="collapse"
                            data-bs-target="#phimdangchieu" disabled>
                        @lang('lang.movie_is_playing')
                    </button>
                </li>
                <li class="vr mx-5"></li>
                <li class="nav-item">
                    <button class="h5 nav-link link-secondary"
                            aria-expanded="false"
                            data-bs-toggle="collapse" data-bs-target="#phimsapchieu">
                        @lang('lang.movie_upcoming')
                    </button>
                </li>

                <li class="vr mx-5"></li>
                <li class="nav-item me-auto">
                    <button class="h5 nav-link link-secondary"
                            aria-expanded="false"
                            data-bs-toggle="collapse" data-bs-target="#vebantruoc">
                        @lang('lang.pre_sale')
                    </button>
                </li>

                <button class="btn" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                    <i class="fa-solid fa-filter"></i> @lang('lang.sort_by')
                </button>
            </ul>


            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight"
                 aria-labelledby="offcanvasRightLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasRightLabel">@lang('lang.sort_by')</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <form action="/movies/filter" method="get">
                        @csrf
                        <div class="form-group m-2 mb-3">
                            <label for="cast" class="form-label">@lang('lang.casts')</label>
                            <select id="cast" class="form-control cast-input" name="casts[]" multiple>
                                @foreach($casts as $cast)
                                    <option value="{{ $cast->id }}">{{ $cast->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group m-2 mb-3">
                            <label for="director" class="form-control-label">@lang('lang.directors')</label>
                            <select id="director" class="form-control director-input" name="directors[]" multiple>
                                @foreach($directors as $director)
                                    <option value="{{ $director->id }}">{{ $director->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="m-2 form-group mb-3">
                            <label class="form-label" for="movieGenres">@lang('lang.genre')</label>
                            <select id="movieGenres" class="form-control director-input" name="movieGenres[]" multiple>
                                @foreach($movieGenres->where('status',1) as $movieGenre)
                                    <option value="{{ $movieGenre->id }}">{{ $movieGenre->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="m-2 form-group mb-3">
                            <label class="form-label" for="rating">@lang('lang.rated')</label>
                            <select id="rating" class="form-select" name="rating">
                                <option value="" selected>@lang('lang.all')</option>
                                @foreach($rating as $value)
                                    <option value="{{ $value->id }}"
                                            title="{{ $value->description }}">
                                        {{ $value->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary m-2 mt-4 w-100">@lang('lang.submit')</button>
                    </form>
                </div>
            </div>

            <div id="phimdangchieu" class="row g-4 mt-2 row-cols-2 row-cols-sm-4 row-cols-lg-6 collapse show" data-bs-parent="#Movies">
                @foreach($movies as $movie)
                    <!-- Movie -->
                    <div class="col" style="height: 350px">
                        <div class="card bg-transparent border-0">
                            <a href="/movie/{{ $movie->id }}">
                                <div class="position-relative">
                                    @if(strstr($movie->image,"https") == "")
                                    <img class="card-img-top rounded rounded-4 shadow shadow-light" src="https://res.cloudinary.com/{!! $cloud_name !!}/image/upload/{!! $movie['image'] !!}.jpg" alt="{{ $movie->name }}" style="height: 300px">
                                    @else
                                    <img class="card-img-top rounded rounded-4 shadow shadow-light" src="{{ $movie->image }}" alt="{{ $movie->name }}" style="height: 300px">
                                    @endif
                                    <span class="position-absolute top-0 start-100 translate-middle badge @if($movie->rating->name == 'C18') bg-danger
                                        @elseif($movie->rating->name == 'C16') bg-warning
                                        @elseif($movie->rating->name == 'P') bg-success
                                        @elseif($movie->rating->name == 'P') bg-primary
                                        @else bg-info
                                        @endif"
                                    >
                                    {{ $movie->rating->name }}
                                </span>
                                </div>
                            </a>
                            
                            <div class="card-title p-1">
                                <p class="card-text fs-6 text-uppercase fw-bold">
                                    {{ $movie->name }}
                                </p>
                            </div>    
                        </div>
                    </div>
                    <!-- Movie: end -->
                @endforeach
            </div>

            <div id="phimsapchieu" class="row g-4 mt-2 row-cols-2 row-cols-sm-4 row-cols-lg-6 collapse" data-bs-parent="#Movies">
                @foreach($moviesSoon as $movie)
                    <!-- Movie -->
                    <div class="col" style="height: 350px">
                        <div class="card bg-transparent border-0">
                            <a href="/movie/{{ $movie->id }}">
                                <div class="position-relative">
                                    @if(strstr($movie->image,"https") == "")
                                    <img class="card-img-top rounded rounded-4 shadow shadow-light" src="https://res.cloudinary.com/{!! $cloud_name !!}/image/upload/{!! $movie['image'] !!}.jpg" alt="{{ $movie->name }}" style="height: 300px">
                                    @else
                                    <img class="card-img-top rounded rounded-4 shadow shadow-light" src="{{ $movie->image }}" alt="{{ $movie->name }}" style="height: 300px">
                                    @endif
                                    <span class="position-absolute top-0 start-100 translate-middle badge @if($movie->rating->name == 'C18') bg-danger
                                        @elseif($movie->rating->name == 'C16') bg-warning
                                        @elseif($movie->rating->name == 'P') bg-success
                                        @elseif($movie->rating->name == 'P') bg-primary
                                        @else bg-info
                                        @endif"
                                    >
                                    {{ $movie->rating->name }}
                                </span>
                                </div>
                            </a>
                            
                            <div class="card-title p-1">
                                <p class="card-text fs-6 text-uppercase fw-bold">
                                    {{ $movie->name }}
                                </p>
                            </div>    
                        </div>
                    </div>
                    <!-- Movie: end -->
                @endforeach
            </div>


            <div id="vebantruoc" class="row g-4 mt-2 row-cols-2 row-cols-sm-4 row-cols-lg-6 collapse" data-bs-parent="#Movies">
                @foreach($moviesEarly as $movie)
                    <!-- Movie -->
                    <div class="col" style="height: 350px">
                        <div class="card bg-transparent border-0">
                            <a href="/movie/{{ $movie->id }}">
                                <div class="position-relative">
                                    @if(strstr($movie->image,"https") == "")
                                    <img class="card-img-top rounded rounded-4 shadow shadow-light" src="https://res.cloudinary.com/{!! $cloud_name !!}/image/upload/{!! $movie['image'] !!}.jpg" alt="{{ $movie->name }}" style="height: 300px">
                                    @else
                                    <img class="card-img-top rounded rounded-4 shadow shadow-light" src="{{ $movie->image }}" alt="{{ $movie->name }}" style="height: 300px">
                                    @endif
                                    <span class="position-absolute top-0 start-100 translate-middle badge @if($movie->rating->name == 'C18') bg-danger
                                        @elseif($movie->rating->name == 'C16') bg-warning
                                        @elseif($movie->rating->name == 'P') bg-success
                                        @elseif($movie->rating->name == 'P') bg-primary
                                        @else bg-info
                                        @endif"
                                    >
                                    {{ $movie->rating->name }}
                                </span>
                                </div>
                            </a>
                            
                            <div class="card-title p-1">
                                <p class="card-text fs-6 text-uppercase fw-bold">
                                    {{ $movie->name }}
                                </p>
                            </div>    
                        </div>
                    </div>
                    <!-- Movie: end -->
                @endforeach
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script>
        $(document).ready(function () {
            $('.director-input').select2({
                tags: true
            });

            $('#rating').select2({
                tags: true
            })

            $('#movieGenres').select2({
                tags: true
            });

            $('.cast-input').select2({
                tags: true
            });

            $("#Movies .nav .nav-item .nav-link").on("click", function () {
                $("#Movies .nav-item").find(".active").removeClass("active link-danger fw-bold border-bottom border-2 border-danger").addClass("link-secondary").prop('disabled', false);
                $(this).addClass("active link-danger fw-bold border-bottom border-2 border-danger").removeClass("link-secondary").prop('disabled', true);
            });
        });
    </script>
@endsection
