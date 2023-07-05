@extends('admin.layout.index')
@section('content')
    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1">
                BÁN VÉ
            </div>

            <div class="card-body pt-2">
                <div id="lichtheorap" class="collapse show" data-bs-parent="#schedules">
                    <div id="theaterParent">
                        <form action="/admin/buyTicket" method="get">
                            @csrf
                            <div class="row container mt-5">
                                <div class="col-10">
                                    <div class="input-group">
                                        <span class="input-group-text bg-gray-200"> @lang('lang.show_date')</span>
                                        <input class="form-control ps-2" type="date" min="{{ date('Y-m-d') }}" name="date" value="{{ $date_cur }}"
                                               aria-label="">
                                    </div>
                                </div>
                                <div class="col-2">
                                    <button type="submit" class="btn btn-primary">@lang('lang.submit')</button>
                                </div>
                            </div>
                        </form>

                        <div id="theaterSchedulesParent">
                            <div id="TheaterSchedules_{{$theater->id}}">
                                <div class="mt-5">
                                    <h4>Lịch chiếu phim</h4>
                                    <div>
                                        <div class="d-block mt-2 mb-5">
                                            @foreach($movies as $movie)
                                                @if($movie->schedulesByDateAndTheater($date_cur, $theater->id)->count() > 0)

                                                    <div class="p-2 d-flex flex-row m-1 align-items-center rounded" style="background: #f5f5f5">

                                                        <div class="flex-shrink-0 p-2 border-end border-4 border-white">
                                                            <h5>{{$movie->name}}</h5>
                                                            @if(strstr($movie->image,"https") === "")
                                                                <img class="rounded d-block" style="width: 180px" alt="..."
                                                                     src="https://res.cloudinary.com/{{ $cloud_name }}/image/upload/{{ $movie->image }}.jpg">
                                                            @else
                                                                <img class="rounded d-block" style="width: 180px" alt="..." src="{{ $movie->image }}">
                                                            @endif
                                                        </div>
                                                        {{-- a Theater schedule --}}
                                                        <div class="flex-grow-1 border-start border-5 border-white p-2 ps-4">

                                                            @foreach($roomTypes as $roomType)
                                                                @if($roomType->schedulesByDateAndTheaterAndMovie($date_cur, $theater->id, $movie->id)->count() > 0)
                                                                    <div class="d-flex flex-column flex-nowrap overflow-auto mb-4">
                                                                        <div class="fw-bold">{{ $roomType->name }}</div>
                                                                        <div class="d-flex flex-wrap overflow-wrapper">
                                                                            @foreach($roomType->schedulesByDateAndTheaterAndMovie($date_cur, $theater->id, $movie->id) as $schedule)
                                                                                <a href="/admin/buyTicket/{{$schedule->id}}"
                                                                                   class="btn btn-warning rounded-0 p-1 m-0 me-4 border-2 border-light"
                                                                                   style="border-width: 2px; border-style: solid dashed; min-width: 85px">
                                                                                    <p class="btn btn-warning rounded-0 m-0 border border-light border-1">
                                                                                        {{ date('H:i', strtotime($schedule->startTime ))}}
                                                                                    </p>
                                                                                </a>
                                                                            @endforeach
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                        {{-- a Theater schedule: end --}}
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        @if(session('success'))
        Swal.fire({
            title: '{{session('success')}}',
            icon: 'success',
            confirmButtonText: 'Ok'
        })
        @endif
        @if(session('fail'))
        Swal.fire({
            title: '{{session('fail')}}',
            icon: 'error',
            confirmButtonText: 'Ok'
        })
        @endif
    </script>
@endsection
