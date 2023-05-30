<!-- Modal -->
<div class="modal fade modal-xl" id="RoomEditModal{{ $room->id }}" tabindex="-1" aria-labelledby="RoomEditModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="TheaterModalLabel">{{$room->name}}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="admin/seat/create" method="post" class="seat_form_{{ $room->id }}">
                    @csrf
                    <?php $final_col['A'] = 0; $final_row = 64; ?>
                    <div class="flex-nowrap overflow-auto">
                        <div class="d-inline-flex mt-5 clearfix">
                            <div class="d-flex flex-fill flex-nowrap">
                                <div class="flex-shrink-1 fw-bold border-0 text-nowrap">@lang('lang.ticket_price')</div>
                                @foreach($seatTypes as $seatType)
                                    <div class="flex-fill d-flex border-0 ps-3 me-4 text-nowrap">
                                    <span class="fw-bold d-block text-center me-1"
                                          style="width: 20px; height: 20px; background-color: {{ $seatType->color  }};"></span>
                                        <span style="line-height: 20px">{{ $seatType->name  }} - {{ $seatType->price }} đ</span>
                                    </div>
                                @endforeach
                            </div>
                            <div class="vr mx-5"></div>
                            <div class="d-flex flex-fill"></div>
                        </div>

                        <div class="d-flex mt-4 flex-nowrap">
                            <div class="flex-shrink-0">
                                <div class="m-1 border border-0 align-middle border-dark text-center"
                                     style="width: 25px; height: 25px">
                                </div>
                            </div>
                            <div class="flex-grow-1 d-block" style="min-width: 449px">
                                <div class="text-center pb-1 mb-2 fs-5">
                                    @lang('lang.screen')
                                </div>
                                <div class="d-flex justify-content-center">
                                    <div class="bg-dark w-100 mb-5" style="height: 2px; max-width: 520px;"></div>
                                </div>
                            </div>
                        </div>

                        <div class="d-block">
                            <div class="d-block flex-fill seats">
                                @for($i = 65; $i <= 90; $i++)
                                    {{--                                    @foreach($room->seats as $seat)--}}
                                    {{--                                        @if($seat->row === chr($i))--}}
                                    <div class="flex-fill d-flex">
                                        <button type="button"
                                                class="flex-shrink-0 btn rounded-0 fw-bold text-center border border-1 border-dark m-1 p-1 seat_row_btn"
                                                style="width: 30px; height: 30px; font-size: 10px"
                                                data-bs-toggle="offcanvas"
                                                data-bs-target="#EditSeatRow" aria-controls="EditSeatRow">{{ chr($i) }}</button>
                                        <div class="offcanvas offcanvas-start" tabindex="-1" id="EditSeatRow"
                                             aria-labelledby="EditSeatRowLabel">
                                            <div class="offcanvas-header">
                                                <h5 class="offcanvas-title" id="EditSeatRowLabel">@lang('lang.edit') @lang('lang.seat_row')</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                                        aria-label="Close"></button>
                                            </div>
                                            <div class="offcanvas-body">
                                                @foreach($seatTypes as $seatType)
                                                    <div class="form-check">
                                                        <input class="form-check-input seat_type_radio" type="radio" name="seatColorRadio"
                                                               id="{{ $seatType->name }}" value="{{ $seatType->id }}">
                                                        <label class="form-check-label flex-fill d-flex border-0 ps-1 my-2"
                                                               for="{{ $seatType->name }}">
                                                    <span class="fw-bold d-block text-center me-1 seat_color_{{ $seatType->id }}"
                                                          style="width: 20px; height: 20px; background-color: {{ $seatType->color }};"></span>
                                                            <span
                                                                style="line-height: 20px">{{ $seatType->name }} - {{ $seatType->price }}</span>
                                                        </label>
                                                    </div>
                                                @endforeach
                                                <button type="button" class="btn btn-primary seat_color_btn mt-4 seat_color_submit"
                                                        data-bs-dismiss="offcanvas">@lang('lang.confirm')
                                                </button>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 d-flex">
                                            <div class="flex-shrink-0"></div>
                                            <div class="flex-grow-1 d-flex justify-content-center seats_row_{{ chr($i) }}">
                                                @for($j = 1; $j <= 12; $j++)
                                                    <div class="d-block border border-1 border-dark text-center m-1 seat_at_row_{{ chr($i) }}"
                                                         style="background-color: #fff0c7; width: 30px; height: 30px; font-size: 10px; line-height: 30px">
                                                        {{ chr($i).$j }}
                                                        <input type="hidden" class="seat_input_row_{{ chr($i) }}" name="seatType"
                                                               value="1" aria-label="">
                                                        <input type="hidden" name="room" id="seat_room" value="{{ $room->id }}">
                                                        <input type="hidden" name="row" value="{{ chr($i) }}">
                                                        <input type="hidden" name="col" value="{{ $s=$j+1 }}">
                                                    </div>
                                                        <?php $final_col[chr($i)] = $j ?>
                                                @endfor

                                            </div>
                                            <div class="flex-shrink-0">
                                                <button type="submit"
                                                        class="btn rounded-0 fw-bold border border-1 border-dark m-1 p-1 seat_col_add_btn"
                                                        style="width: 30px; height: 30px; font-size: 10px">
                                                    <p class=" visually-hidden">{{chr($i)}}</p>
                                                    <i class="fa-solid fa-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                        <?php $final_row = $i ?>
                                    {{--                                        @endif--}}
                                    {{--                                    @endforeach--}}
                                @endfor
                            </div>
                            <div class="flex-fill d-flex">
                                <button type="button"
                                        class="btn rounded-0 fw-bold border border-1 border-dark m-1 p-1 seat_row_add_btn"
                                        style="width: 30px; height: 30px; font-size: 10px">
                                    <i class="fa-solid fa-plus"></i>
                                </button>
                            </div>
                            <div class="flex-fill d-flex mt-5">
                                <div class="flex-shrink-0 m-1 p-1"
                                     style="width: 30px; height: 30px; font-size: 10px; line-height: 30px">
                                </div>
                                <div class="flex-grow-1 d-flex">
                                    <div class="flex-fill"></div>
                                    <div class="flex-fill d-flex justify-content-center">
                                        @for($j = 1; $j <= 12; $j++)
                                            <div class="d-block border border-1 border-dark text-center m-1"
                                                 style="width: 30px; height: 30px; font-size: 10px; line-height: 30px">{{ $j }}
                                            </div>
                                        @endfor
                                        <div class="d-block border border-1 border-dark text-center m-1"
                                             style="width: 30px; height: 30px; font-size: 10px; line-height: 30px">{{ $j }}
                                        </div>
                                    </div>
                                    <div class="flex-fill"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('lang.close')</button>
                <button type="button" class="btn btn-primary">@lang('lang.save')</button>
            </div>
        </div>
    </div>
</div>


