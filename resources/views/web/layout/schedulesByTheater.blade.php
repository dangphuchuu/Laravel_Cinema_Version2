<div id="schedulesByTheater" class="mt-5">
    <h4>Lịch chiếu phim</h4>
    <div>
        <div class="d-flex justify-content-end">
            <div class="input-group mb-2 mt-4">
                <span class="input-group-text" for="datepicker">Ngày chiếu</span>
                <input type="date" id="datepicker" value="2023-05-07" class="form-control" aria-label="">
            </div>
        </div>
        <div class="d-block mt-2 mb-5">
            @for($i = 1; $i <= 3; $i++)
                <div class="p-2 d-flex flex-row m-1 align-items-center rounded" style="background: #f5f5f5">
                    <div class="flex-shrink-1 p-2 border-end border-4 border-white">
                        <img
                            src="https://www.cgv.vn/media/catalog/product/cache/1/thumbnail/190x260/2e2b8cd282892c71872b9e67d2cb5039/t/h/the_accursed.c_n_th_nh_n_t_c_i_m_-_payoff_poster_-_kc_12.05.2023_1_.jpg"
                            class="rounded d-block"
                            alt="..." style="max-width: 320px">
                    </div>
                    {{-- a Theater schedule --}}
                    <div class="flex-fill p-2 ps-4">
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
