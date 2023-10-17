@extends('web.layout.index')
@section('home')
active link-danger
@endsection
@section('css')

@endsection
@section('content')
<section class="clearfix pb-5">
    <div class="w-100">
        <!-- Slider -->
        <div id="carouselExampleAutoplaying" class="carousel slide shadow" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach($banners as $banner)
                <div class="carousel-item @if($loop->first) active @endif">
                    @if(strstr($banner->image,"https") == "")
                    <img class="d-block h-auto w-100" width="1920px" height="1080px" style="object-fit: contain; object-position: 50% 100%" src="https://res.cloudinary.com/{!! $cloud_name !!}/image/upload/{!! $banner['image'] !!}.jpg" alt="banner">
                    @else
                    <img class="d-block h-auto w-100" width="1920px" height="1080px" style="object-fit: contain; object-position: 50% 100%" src="{{ $banner->image }}" alt="banner">
                    @endif
                </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                <i class="fa-regular fa-circle-chevron-left fa-2xl"></i>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                <i class="fa-regular fa-circle-chevron-right fa-2xl"></i>
            </button>
        </div>
        <!--end slider -->
    </div>

    <!-- Main content -->
    <div class="container-lg mt-5" id="mainContent">
        <div class="row">
            {{-- movies --}}
            <div class="col-12 col-lg-9">
                <div>
                    <div class="d-flex justify-content-between mb-3">
                        <h3 class="fw-bold"><i class="fa-solid fa-circle fa-2xs"></i> @lang('lang.movie_is_playing')</h3>
                        <a class="link link-dark fs-5" href="/movies">@lang("lang.see-all")</a>
                    </div>

                    <div class="row row-cols-2 row-cols-sm-3 row-cols-lg-4 g-3">
                        @foreach($movies as $movie)
                        <div class="col">
                            <div class="card bg-transparent border-0" style="height: 500px">
                                <a href="/movie/{{ $movie->id }}" class="position-relative">
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
                                        @endif">
                                        {{ $movie->rating->name }}
                                    </span>
                                </a>
                                <div class="card-text p-1">
                                    <div class="d-flex">

                                        <p class="text-secondary fs-6 float-end">
                                            {{ date('d/m/Y', strtotime($movie->releaseDate)) }}
                                        </p>
                                    </div>
                                </div>
                                <div class="card-title p-1">
                                    <p class="card-text fs-5 text-uppercase fw-bold">
                                        {{ $movie->name }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="text-dark my-5">
                    <hr>
                </div>

                <div>
                    <div class="d-flex justify-content-between mb-3">
                        <h3 class="fw-bold"><i class="fa-solid fa-circle fa-2xs"></i> @lang('lang.movie_upcoming')</h3>
                        <a class="link link-dark fs-5" href="/movies">@lang("lang.see-all")</a>
                    </div>

                    <div class="row row-cols-2 row-cols-sm-3 row-cols-lg-4 g-3">
                        @foreach($moviesEarly as $movie)
                        <div class="col">
                            <div class="card bg-transparent border-0" style="height: 500px">
                                <a href="/movie/{{ $movie->id }}" class="position-relative">
                                    @if(strstr($movie->image,"https") == "")
                                    <img class="card-img-top rounded rounded-4 shadow shadow-light" src="https://res.cloudinary.com/{!! $cloud_name !!}/image/upload/{!! $movie['image'] !!}.jpg" alt="{{ $movie->name }}" style="height: 300px">
                                    @else
                                    <img class="card-img-top rounded rounded-4 shadow shadow-light" src="{{ $movie->image }}" alt="{{ $movie->name }}" style="height: 300px">
                                    @endif
                                    <span class="position-absolute top-0 start-100 translate-middle badge 
                                            @if($movie->rating->name == 'C18') bg-danger
                                            @elseif($movie->rating->name == 'C16') bg-warning
                                            @elseif($movie->rating->name == 'P') bg-success
                                            @elseif($movie->rating->name == 'P') bg-primary
                                            @else bg-info
                                            @endif">
                                        {{ $movie->rating->name }}
                                    </span>
                                </a>
                                <div class="card-text p-1">
                                    <div class="d-flex">
                                        <p class="text-secondary fs-6 float-end">
                                            {{ date('d/m/Y', strtotime($movie->releaseDate)) }}
                                        </p>
                                    </div>
                                </div>
                                <div class="card-title p-1">
                                    <p class="card-text fs-5 text-uppercase fw-bold">
                                        {{ $movie->name }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

            </div>

            {{-- news --}}
            <div class="col-12 col-lg-3">
                <div>
                    <div class="d-flex justify-content-between mb-3">
                        <h3 class="fw-bold">@lang('lang.news')</h3>
                        <a href="/news" class="link link-dark fs-5">@lang("lang.see-all")</a>
                    </div>

                    <div class="h-auto w-100" width="150px" height="800px">
                        <div id="carouselExampleIndicatorsNews" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                @if($news->count() > 0)
                                <button type="button" data-bs-target="#carouselExampleIndicatorsNews" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                @endif
                                @if($news->count() > 3)
                                <button type="button" data-bs-target="#carouselExampleIndicatorsNews" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                @endif
                                @if($news->count() > 6)
                                <button type="button" data-bs-target="#carouselExampleIndicatorsNews" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                @endif
                            </div>
                            <div class="carousel-inner">
                                @if($news->count() > 0)
                                <div class="carousel-item active">
                                    <div class="row row-cols-3 row-cols-lg-1 g-3">
                                        @foreach($news as $key => $newsItem)
                                        @if ($key < 3) <div class="col">
                                            <a class="link" href="/news-detail/{{ $newsItem->id }}">
                                                @if(strstr($newsItem['image'],"https") == "")
                                                <img class="d-block w-100 rounded rounded-3" style="max-height: 160px" src="https://res.cloudinary.com/{{ $cloud_name }}/image/upload/{{ $newsItem['image'] }}.jpg" alt="{{ $newsItem['id']}}">
                                                @else
                                                <img class="d-block w-100 rounded rounded-3" style="max-height: 160px" src="{{ $newsItem['image'] }}" alt="{{ $newsItem['id']}}">
                                                @endif
                                            </a>
                                    </div>
                                    @endif
                                    @endforeach
                                </div>
                            </div>
                            @endif
                            @if($news->count() > 3)
                            <div class="carousel-item">
                                <div class="row row-cols-3 row-cols-lg-1 g-3">
                                    @foreach($news as $key => $newsItem)
                                    @if ($key >= 3 && $key < 6) <div class="col">
                                        <a class="link" href="/news-detail/{{ $newsItem->id }}">
                                            @if(strstr($newsItem['image'],"https") == "")
                                            <img class="d-block w-100 rounded rounded-3" style="max-height: 160px" src="https://res.cloudinary.com/{{ $cloud_name }}/image/upload/{{ $newsItem['image'] }}.jpg" alt="{{ $newsItem['id']}}">
                                            @else
                                            <img class="d-block w-100 rounded rounded-3" style="max-height: 160px" src="{{ $newsItem['image'] }}" alt="{{ $newsItem['id']}}">
                                            @endif
                                        </a>
                                </div>
                                @endif
                                @endforeach
                            </div>
                        </div>
                        @endif
                        @if($news->count() > 6)
                        <div class="carousel-item">
                            <div class="row row-cols-3 row-cols-lg-1 g-3">
                                @foreach($news as $key => $newsItem)
                                @if ($key >=6 && $key < 9) <div class="col">
                                    <a class="link" href="/news-detail/{{ $newsItem->id }}">
                                        @if(strstr($newsItem['image'],"https") == "")
                                        <img class="d-block w-100 rounded rounded-3" style="max-height: 160px" src="https://res.cloudinary.com/{{ $cloud_name }}/image/upload/{{ $newsItem['image'] }}.jpg" alt="{{ $newsItem['id']}}">
                                        @else
                                        <img class="d-block w-100 rounded rounded-3" style="max-height: 160px" src="{{ $newsItem['image'] }}" alt="{{ $newsItem['id']}}">
                                        @endif
                                    </a>
                            </div>
                            @endif
                            @endforeach
                        </div>
                        @endif
                    </div>
                </div>
                <button class="carousel-control-prev d-none" type="button" data-bs-target="#carouselExampleIndicatorsNews" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next d-none" type="button" data-bs-target="#carouselExampleIndicatorsNews" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>

    </div>
    <div>
        <div class="d-flex justify-content-between mt-5 mb-3">
            <h3 class="fw-bold">@lang('lang.events')</h3>
            <a href="/events" class="link link-dark fs-5">@lang("lang.see-all")</a>
        </div>

        <div id="carouselExampleIndicatorsEvents" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                @if($events->count()>0)
                <button type="button" data-bs-target="#carouselExampleIndicatorsEvents" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                @endif
                @if($events->count() > 3)
                <button type="button" data-bs-target="#carouselExampleIndicatorsEvents" data-bs-slide-to="1" aria-label="Slide 2"></button>
                @endif
                @if($events->count() > 6)
                <button type="button" data-bs-target="#carouselExampleIndicatorsEvents" data-bs-slide-to="2" aria-label="Slide 3"></button>
                @endif
            </div>
            <div class="carousel-inner">
                @if($events->count()>0)
                <div class="carousel-item active">
                    <div class="row row-cols-3 row-cols-lg-1 g-3">
                        @foreach($events as $key => $eventItem)
                        @if ($key < 3) <div class="col">
                            <a class="link" href="/events-detail/{{ $eventItem->id }}">
                                @if(strstr($eventItem['image'],"https") == "")
                                <img class="d-block w-100 rounded rounded-3" style="max-height: 160px" src="https://res.cloudinary.com/{{ $cloud_name }}/image/upload/{{ $eventItem['image'] }}.jpg" alt="{{ $eventItem['id']}}">
                                @else
                                <img class="d-block w-100 rounded rounded-3" style="max-height: 160px" src="{{ $eventItem['image'] }}" alt="{{ $eventItem['id']}}">
                                @endif
                            </a>
                    </div>
                    @endif
                    @endforeach
                </div>
                @endif
            </div>
            @if($events->count() > 3)
            <div class="carousel-item">
                <div class="row row-cols-3 row-cols-lg-1 g-3">
                    @foreach($events as $key => $eventItem)
                    @if ($key >= 3 && $key < 6) <div class="col">
                        <a class="link" href="/events-detail/{{ $eventItem->id }}">
                            @if(strstr($eventItem['image'],"https") == "")
                            <img class="d-block w-100 rounded rounded-3" style="max-height: 160px" src="https://res.cloudinary.com/{{ $cloud_name }}/image/upload/{{ $eventItem['image'] }}.jpg" alt="{{ $eventItem['id']}}">
                            @else
                            <img class="d-block w-100 rounded rounded-3" style="max-height: 160px" src="{{ $eventItem['image'] }}" alt="{{ $eventItem['id']}}">
                            @endif
                        </a>
                </div>
                @endif
                @endforeach
            </div>
            @endif
        </div>
        @if($events->count() > 6)
        <div class="carousel-item">
            <div class="row row-cols-3 row-cols-lg-1 g-3">
                @foreach($events as $key => $eventItem)
                @if ($key >=6 && $key < 9) <div class="col">
                    <a class="link" href="/events-detail/{{ $eventItem->id }}">
                        @if(strstr($eventItem['image'],"https") == "")
                        <img class="d-block w-100 rounded rounded-3" style="max-height: 160px" src="https://res.cloudinary.com/{{ $cloud_name }}/image/upload/{{ $eventItem['image'] }}.jpg" alt="{{ $eventItem['id']}}">
                        @else
                        <img class="d-block w-100 rounded rounded-3" style="max-height: 160px" src="{{ $eventItem['image'] }}" alt="{{ $eventItem['id']}}">
                        @endif
                    </a>
            </div>
            @endif
            @endforeach
        </div>
        @endif
    </div>
    </div>
    <button class="carousel-control-prev d-none" type="button" data-bs-target="#carouselExampleIndicatorsEvents" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next d-none" type="button" data-bs-target="#carouselExampleIndicatorsEvents" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
    </div>
    </div>
    </div>
    </div>
    </div>
</section>

@endsection