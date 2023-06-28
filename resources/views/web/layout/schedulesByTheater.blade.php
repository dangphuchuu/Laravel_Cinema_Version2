<div class="collapse @if($loop->first) show @endif" id="TheaterSchedules_{{$theater->id}}" data-bs-parent="#theaterSchedulesParent">
    <div class="mt-5">
        <h4>Lịch chiếu phim</h4>
        <div>
            <div class="d-block mt-2 mb-5">
                @foreach($movies as $movie)
                    {{--                    {{ dd($movie->schedulesByDate($date_cur)) }}--}}
                    @if($movie->schedulesByDateAndTheater($date_cur, $theater->id)->count() > 0)
                        <div class="p-2 d-flex flex-row m-1 align-items-center rounded" style="background: #f5f5f5">
                            <div class="flex-shrink-0 p-2 border-end border-4 border-white">
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
                                                    @if(date('Y-m-d H:i:s', strtotime('- 20 minutes', strtotime($schedule->startTime))) >=
                                                    date('Y-m-d H:i:s'))
                                                        @if(Auth::check())
                                                            <a href="/tickets/{{$schedule->id}}"
                                                               class="btn btn-warning rounded-0 p-1 m-0 me-4 border-2 border-light"
                                                               style="border-width: 2px; border-style: solid dashed; min-width: 85px">
                                                                <p class="btn btn-warning rounded-0 m-0 border border-light border-1">
                                                                    {{ date('H:i', strtotime($schedule->startTime ))}}
                                                                </p>
                                                            </a>
                                                        @else
                                                            <a class="btn btn-warning rounded-0 p-1 m-0 me-4 border-2 border-light"
                                                               data-bs-toggle="modal"
                                                               data-bs-target="#loginModal"
                                                               style="border-width: 2px; border-style: solid dashed; min-width: 85px">
                                                                <p class="btn btn-warning rounded-0 m-0 border border-light border-1">
                                                                    {{ date('H:i', strtotime($schedule->startTime ))}}
                                                                </p>
                                                            </a>
                                                        @endif
                                                    @endif
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
