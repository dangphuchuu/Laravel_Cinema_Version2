@extends('web.layout.index')
@section('content')
    <section class="container-lg">
        {{--  Breadcrumb  --}}
        <nav aria-label="breadcrumb mt-5">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#" class="link link-dark text-decoration-none">@lang('lang.home')</a></li>
                <li class="breadcrumb-item"><a href="#" class="link link-dark text-decoration-none">@lang('lang.movie_is_playing')</a></li>
                <li class="breadcrumb-item active" aria-current="page">{!! $movie['name'] !!}</li>
            </ol>
        </nav>

        <div class="movie mt-5">
            {{--  Movie title  --}}
            <h2 class="mt-2">{!! $movie['name'] !!}</h2>

            <div class="row">
                <div class="col-sm-6 col-lg-3">
                    <div class="card border border-4 border-warning rounded-0">
                        @if(strstr($movie['image'],"https") == "")
                            <img class="card-img-top rounded-0" alt='...'
                                 src="https://res.cloudinary.com/{!! $cloud_name !!}/image/upload/{!! $movie['image'] !!}.jpg">
                        @else
                            <img class="card-img-top rounded-0" alt='...'
                                 src="{!! $movie['image'] !!}">
                        @endif
                    </div>
                    <div class="card-body border border-4 border-warning border-top-0 d-flex align-items-center">
                        <strong class="card-text p-2">@lang('lang.evaluate'): </strong>
                        <div id='score' class="score"></div>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-9">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex align-items-center text-danger">{{ $movie->showTime }} @lang('lang.minutes')
                        </li> {{--movie running time--}}
                        <li class="list-group-item d-flex align-items-center"><strong class="pe-1">@lang('lang.national')
                                : </strong>{!! $movie['national'] !!}
                        </li>
                        <li class="list-group-item d-flex align-items-center"><strong class="pe-1">@lang('lang.release_date')
                                : </strong>{!! $movie['releaseDate'] !!}
                        </li>
                        <li class="list-group-item d-flex align-items-center"><strong class="pe-1">@lang('lang.genre'): </strong>
                            @foreach($movie->movieGenres as $genre)
                                @if ($loop->first)
                                    {{ $genre->name }}
                                @else
                                    , {{ $genre->name }}
                                @endif
                            @endforeach
                        </li>
                        <li class="list-group-item d-flex align-items-center">
                            <strong class="pe-1">@lang('lang.directors'): </strong>
                            @foreach($movie->directors as $director)
                                @if ($loop->first)
                                    {{ $director->name }}
                                @else
                                    , {{ $director->name }}
                                @endif
                            @endforeach
                        </li>
                        <li class="list-group-item d-flex align-items-center text-truncate">
                            <strong class="pe-1">@lang('lang.casts'): </strong>
                            @foreach($movie->casts as $cast)
                                @if ($loop->first)
                                    {{ $cast->name }}
                                @else
                                    , {{ $cast->name }}
                                @endif
                            @endforeach
                        </li>
                        <li class="list-group-item d-flex align-items-center"><strong class="pe-1">@lang('lang.rated'): </strong>
                            <span class="badge @if($movie->rating->name == 'C18') bg-danger
                            @elseif($movie->rating->name == 'C16') bg-warning
                            @elseif($movie->rating->name == 'P') bg-success
                            @elseif($movie->rating->name == 'P') bg-primary
                            @else bg-info
                            @endif me-1">
                                {{ $movie->rating->name }}
                            </span> - {{ $movie->rating->description }}
                        </li>
                    </ul>
                </div>
            </div>

            <div class="row container">
                <div class="accordion-item">
                    <div class="accordion-header">
                        <h4 class="mt-4">@lang('lang.content')</h4>
                    </div>
                    <div class="accordion-body">
                        {!! $movie['description'] !!}
                    </div>
                </div>
            </div>
            <div class="row container">
                <h4 class="mt-4">Trailer</h4>

                <div class="">
                    <iframe width="800" height="500" src="https://www.youtube.com/embed/{!! $movie['trailer'] !!}"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen>
                    </iframe>
                </div>
            </div>
        </div>

        <form action="/movie/{{$movie->id}}" method="get">
            @csrf
            <div class="row container mt-5">
                <div class="col-5">
                    <div class="input-group">
                        <span class="input-group-text bg-gray-200"> @lang('lang.city')</span>
                        <select class="form-select ps-2" name="city" aria-label="">
                            @foreach($cities as $city)
                                <option id="{{str_replace(' ', '', $city)}}" value="{{$city}}" @if($city_cur == $city) selected @endif>
                                    {{$city}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-5">
                    <div class="input-group">
                        <span class="input-group-text bg-gray-200"> @lang('lang.show_date')</span>
                        <input class="form-control ps-2" type="date" name="date" value="{{ date("Y-m-d",strtotime($date_cur)) }}" aria-label="">
                    </div>
                </div>
                <div class="col-2">
                    <button type="submit" class="btn btn-primary">@lang('lang.submit')</button>
                </div>
            </div>
        </form>
        @include('web.layout.movieDetailSchedules')

    </section>
@endsection
@section('js')
@endsection
