<!-- Modal -->
<div class="modal fade modal-xl" id="RoomEditModal{{ $room->id }}" tabindex="-1" aria-labelledby="RoomEditModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="TheaterModalLabel">{{$room->name}}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="d-block overflow-x-auto text-center">
                    <div class="w-100 mt-2 my-auto mb-4 text-center justify-content-center">
                        Màn hình
                        <div class="bg-dark w-100 mx-auto" style="height: 2px; max-width: 540px"></div>

                        <div class="row d-block m-2" style="margin: 2px">
                            <div class="d-inline-block align-middle my-0 mx-1 py-1 px-0 disabled"
                                 style="width: 30px; height: 30px; line-height: 22px; font-size: 10px">

                            </div>
                        </div>
                        {{--                        @foreach($room->seats as $seat_row)--}}
                        {{--                            @if($loop->first)--}}
                        {{--                                    <?php $temp = '' ?>--}}
                        {{--                            @endif--}}
                        {{--                            @if($seat_row->row != $temp)--}}
                        {{--                                <div class="row d-block" style="margin: 2px">--}}
                        {{--                                    @else--}}
                        {{--                                        @foreach($room->seats as $seat_col)--}}
                        {{--                                            @if($seat_col->row == $seat_row->row)--}}
                        {{--                                                @for($m = 0; $m < $seat_col->ms; $m++)--}}
                        {{--                                                    <div class="d-inline-block align-middle disabled"--}}
                        {{--                                                         style="width: 30px; height: 30px; line-height: 22px; font-size: 10px; margin: 2px 0;"></div>--}}
                        {{--                                                @endfor--}}
                        {{--                                                <div class="d-inline-block cursor-pointer align-middle py-1 px-0"--}}
                        {{--                                                     style="--}}
                        {{--                                                background: #fff0c7;--}}
                        {{--                                                width: 30px;--}}
                        {{--                                                height: 30px;--}}
                        {{--                                                line-height: 22px;--}}
                        {{--                                                font-size: 10px;--}}
                        {{--                                                margin: 2px 0;--}}
                        {{--                                             ">--}}
                        {{--                                                    {{ $seat_col->row.$seat_col->col }}--}}
                        {{--                                                </div>--}}
                        {{--                                                @for($n = 0; $n < $seat_col->me; $n++)--}}
                        {{--                                                    <div class="d-inline-block align-middle disabled"--}}
                        {{--                                                         style="width: 30px; height: 30px; line-height: 22px; font-size: 10px; margin: 2px 0;"></div>--}}
                        {{--                                                @endfor--}}
                        {{--                                            @endif--}}
                        {{--                                        @endforeach--}}
                        {{--                                    @endif--}}
                        {{--                                    @if($seat_row->row != $temp)--}}
                        {{--                                </div>--}}

                        {{--                            @endif--}}
                        {{--                            @for($m = 0; $m < $seat_row->mb; $m++)--}}
                        {{--                                --}}
                        {{--                                <div class="row d-block" style="margin: 2px">--}}
                        {{--                                    <div class="d-inline-block align-middle disabled"--}}
                        {{--                                         style="width: 30px; height: 30px; line-height: 22px; font-size: 10px; margin: 2px 0;"></div>--}}
                        {{--                                </div>--}}
                        {{--                            @endfor--}}
                        {{--                                <?php $temp = $seat_row->row ?>--}}
                        {{--                        @endforeach--}}
                        @foreach($room->rows as $row)
                            <div class="row d-block" style="margin: 2px">
                                @foreach($room->seats as $seat)
                                    @if($seat->row == $row->row)
                                        @for($m = 0; $m < $seat->ms; $m++)
                                            <div class="d-inline-block align-middle disabled"
                                                 style="width: 30px; height: 30px; line-height: 22px; font-size: 10px; margin: 2px 0;"></div>
                                        @endfor
                                        <div class="d-inline-block cursor-pointer align-middle py-1 px-0"
                                             style="
                                                    background: #fff0c7;
                                                    width: 30px;
                                                    height: 30px;
                                                    line-height: 22px;
                                                    font-size: 10px;
                                                    margin: 2px 0;
                                                 ">
                                            {{ $seat->row.$seat->col }}
                                        </div>
                                        @for($n = 0; $n < $seat->me; $n++)
                                            <div class="d-inline-block align-middle disabled"
                                                 style="width: 30px; height: 30px; line-height: 22px; font-size: 10px; margin: 2px 0;"></div>
                                        @endfor
                                    @endif
                                    @for($m = 0; $m < $row->mb; $m++)
                                        <div class="row d-block" style="margin: 2px">
                                            <div class="d-inline-block align-middle disabled"
                                                 style="width: 30px; height: 30px; line-height: 22px; font-size: 10px; margin: 2px 0;"></div>
                                        </div>
                                    @endfor
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('lang.close')</button>
                <button type="button" class="btn btn-primary">@lang('lang.save')</button>
            </div>
        </div>
    </div>
</div>


