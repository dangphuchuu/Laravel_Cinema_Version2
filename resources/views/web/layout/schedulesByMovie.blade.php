<div class="mt-5">
    <h4>@lang('lang.movie_schedule')</h4>
    <div class="row row-cols-sm-2 row-cols-1">
        <div class="form-group col mt-4">
            <form id='select' class="select" method='get'>
                <label for="select-sort" class="form-label">@lang('lang.theater')</label>
                <select name="select_item is-invalid" id="select-sort" class="form-select" tabindex="0">
                    <option value="1" selected>TP Hồ Chí Minh</option>
                    <option value="2">Hà Nội</option>
                    <option value="3">Đà Nẵng</option>
                    <option value="4">Hải Phòng</option>
                    <option value="5">Phú Yên</option>
                </select>
            </form>
        </div>
        <div class="form-group col mt-4">
            <label class="form-label" for="datepicker">@lang('lang.show_date')</label>
            <input type="date" id="datepicker" value="2023-05-07" class="form-control">
        </div>
    </div>
    <div class="d-flex flex-column mt-2 mb-5">
        @for($i = 1; $i <= 3; $i++)
            <div class="p-2 d-flex flex-row m-1 align-items-center" style="background: #f5f5f5">
                <div class="flex-shrink-1 p-3">
                    <h6 class="fw-bold">HuuMinh Cinema {{ $i }}</h6>
                </div>
                {{-- a Theater schedule --}}
                <div class="flex-fill border-start border-5 border-white p-2 ps-4">
                    <div class="d-flex flex-column flex-nowrap overflow-auto">
                        <div class="fw-bold">2D</div>
                        <div class="d-flex flex-row flex-wrap overflow-wrapper">
                            <a href="/tickets/1"
                               class="btn btn-warning rounded-0 p-1 m-0 me-4 border-2 border-light"
                               style="border-width: 2px; border-style: solid dashed; min-width: 85px"><p
                                    class="btn btn-warning rounded-0 m-0 border border-light border-1">19 :
                                    30</p></a>
                            <a href="/tickets/1"
                               class="btn btn-warning rounded-0 p-1 m-0 me-4 border-2 border-light"
                               style="border-width: 2px; border-style: solid dashed; min-width: 85px"><p
                                    class="btn btn-warning rounded-0 m-0 border border-light border-1">22 :
                                    00</p>
                            </a>
                            <a href="/tickets/1"
                               class="btn btn-warning rounded-0 p-1 m-0 me-4 border-2 border-light"
                               style="border-width: 2px; border-style: solid dashed; min-width: 85px"><p
                                    class="btn btn-warning rounded-0 m-0 border border-light border-1">22 :
                                    00</p>
                            </a>
                        </div>
                    </div>


                    <div class="row mt-4">
                        <div class="fw-bold">3D</div>
                        <div class="gap-2 d-md-block">
                            <a href="/tickets/1"
                               class="btn btn-warning rounded-0 p-1 m-0 me-4 border-2 border-light"
                               style="border-width: 2px; border-style: solid dashed; min-width: 85px"><p
                                    class="btn btn-warning rounded-0 m-0 border border-light border-1">16 :
                                    30</p>
                            </a>
                            <a href="/tickets/1"
                               class="btn btn-warning rounded-0 p-1 m-0 me-4 border-2 border-light"
                               style="border-width: 2px; border-style: solid dashed; min-width: 85px"><p
                                    class="btn btn-warning rounded-0 m-0 border border-light border-1">18 :
                                    00</p>
                            </a>
                        </div>
                    </div>
                </div>
                {{-- a Theater schedule: end --}}
            </div>
        @endfor
    </div>
</div>
</div>
