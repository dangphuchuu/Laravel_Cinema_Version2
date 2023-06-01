<div class="offcanvas offcanvas-start" tabindex="-1" id="EditSeat_{{ $seat->id }}"
     aria-labelledby="EditSeatRowLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="EditSeatRowLabel">@lang('lang.edit') {{ $seat->row.$seat->col }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <form action="admin/seat/edit" method="post">
            @csrf
            @foreach($seatTypes as $seatType)
                <div class="form-check">
                    <input class="form-check-input seat_type_radio" type="radio" name="seatType"
                           id="ColorRadio_{{ $seatType->id }}_{{ $seat->id }}" value="{{ $seatType->id }}">
                    <label class="form-check-label flex-fill d-flex border-0 ps-1 my-2"
                           for="ColorRadio_{{ $seatType->id }}_{{ $seat->id }}">
                    <span class="fw-bold d-block text-center me-1"
                          style="width: 20px; height: 20px; background-color: {{ $seatType->color }};"></span>
                        <span style="line-height: 20px">{{ $seatType->name }} - {{ $seatType->surcharge }}</span>
                    </label>
                </div>
            @endforeach
            <div class="form-group">
                <label for="seat_ms_{{ $seat->id }}">căn trái</label>
                <input class="form-control" type="number" name="ms" id="seat_ms_{{ $seat->id }}">
            </div>
            <div class="form-group">
                <label for="seat_me_{{ $seat->id }}">căn phải</label>
                <input class="form-control" type="number" name="me" id="seat_me_{{ $seat->id }}">
            </div>
            <input type="hidden" name="room" value="{{ $room->id }}">
            <input type="hidden" name="seat" value="{{ $seat->id }}">
            <button type="submit" class="btn btn-primary mt-4"
                    data-bs-dismiss="offcanvas">
                @lang('lang.confirm')
            </button>
        </form>
    </div>
</div>
