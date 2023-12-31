@extends('web.layout.index')
@section('events')
active link-danger
@endsection
@section('content')
<section class="container-lg py-5">
    <!-- Main content -->
    <div class="mt-5" id="Events">

        <div class="d-flex justify-content-center my-5">
            <h2 class="fw-bold">
                @lang('lang.events')
            </h2>
        </div>

        <div id="tintuc" class="container">
            <div class="row row-cols-1 row-cols-lg-4 g-2">
                @foreach($posts->where('status',1) as $value)
                <div class="col" style="height: 420px">
                    <a href="/events-detail/{!! $value['id'] !!}" class="btn p-0 m-0 border-0">
                        <div class="card bg-body-tertiary " style="height: 420px;width:100%">
                            @if(strstr($value->image,"https") == "")
                            <img class="card-img-top " height="50%" src="https://res.cloudinary.com/{!! $cloud_name !!}/image/upload/{{ $value->image }}.jpg" alt="">
                            @else
                            <img class="card-img-top " height="50%" src="{{ $value->image }}" alt="">
                            @endif
                            <div class="card-body">
                                <p class="card-text text-secondary text-start">{{ date('d/m/Y', strtotime($value->created_at)) }}</p>
                                <h5 class="card-title text-start">{{ $value->title }}</h5>
                                <p class="card-text text-start text-secondary" style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical">
                                    {{ strip_tags($value->content) }}
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>


    </div>
</section>
@endsection