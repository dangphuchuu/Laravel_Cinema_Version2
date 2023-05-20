<!-- Modal -->
<div class="modal fade modal-xl" id="RoomEditModal" tabindex="-1" aria-labelledby="RoomEditModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="RoomEditModalLabel">Edit Room</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container flex-nowrap overflow-auto">
                    <div class="d-inline-flex mt-5 clearfix">
                        <div class="d-flex flex-fill">
                            <div class="flex-shrink-1 fw-bold border-0 me-2">Giá vé:</div>
                            <div class="flex-fill d-flex border-0 me-4">
                                <span class="fw-bold d-block text-center me-1" style="width: 20px; height: 20px; background-color: #FFF0C7;"></span>
                                <span style="line-height: 20px">70,000 đ</span>
                            </div>
                            <div class="flex-fill d-flex border-0 me-4">
                                <span class="fw-bold d-block text-center me-1" style="width: 20px; height: 20px; background-color: #FFC8CB;"></span>
                                <span style="line-height: 20px">120,000 đ</span>
                            </div>
                        </div>
                        <div class="vr mx-5"></div>
                        <div class="d-flex flex-fill"></div>
                    </div>

                    <div class="d-flex mt-4">
                        <div class="flex-shrink-1">
                            <div class="m-1 border border-0 align-middle border-dark text-center"
                                 style="width: 25px; height: 25px"></div>
                        </div>
                        <div class="w-100 d-flex">
                            <div class="border-bottom border-2 border-dark text-center pb-1 mb-5 mx-auto" style="max-width: 520px"><span class="fs-5">Màn hình</span>
                            </div>
                            {{--                                <div class="d-flex"><div class="bg-dark w-100 mb-5" style="height: 2px; max-width: 520px"></div></div>--}}
                        </div>
                    </div>

                    @for($i = 65; $i < 79; $i++)
                        <div class="d-flex">
                            <div class="flex-fill d-grid gap-1">
                                <div class="btn-toolbar m-1" role="toolbar">
                                    <div class="btn-group" role="group">
                                        <button type="button"
                                                class="btn btn-primary me-auto rounded-0 mb-0 fw-bold text-center border border-1 border-dark
                                                 p-1" style="width: 25px; height: 25px; font-size: 10px; line-height: 25px">
                                            {{ chr($i) }}
                                        </button>
                                    </div>
                                    <div class="btn-group" role="group">
                                        @for($j = 1; $j <= 12; $j++)
                                            <input type="checkbox"
                                                   class="btn-check"
                                                   name="seat_{{$i.$j}}"
                                                   id="seat_{{$i.$j}}"
                                                   autocomplete="off"
                                                   style="width: 25px; height: 25px">
                                            <label class="btn rounded-0 text-center p-1 m-1"
                                                   for="seat_{{$i.$j}}"
                                                   style="background-color: #FFF0C7; font-size: 10px; line-height: 21px">
                                                {{ chr($i).$j }}
                                            </label>
                                        @endfor
                                    </div>
                                    <div class="btn-group ms-auto" role="group"></div>
                                </div>
                            </div>
                        </div>
                    @endfor
                    <div class="d-flex mt-5">
                        <div class="flex-shrink-1">
                            <div class="d-none d-sm-block m-1">
                                    <span class="fw-bold d-block"
                                          style="width: 25px; height: 25px; font-size: 10px; line-height: 25px"></span>
                            </div>
                        </div>
                        <div class="w-100">
                            <div class="d-flex justify-content-center">
                                @for($j = 0; $j <= 12; $j++)
                                    @if($j != 0)
                                        <div class="m-1">
                                            <div class="d-none d-sm-block border border-1 border-dark text-center"
                                                 style="width: 25px; height: 25px">{{ $j }}
                                            </div>
                                        </div>
                                    @endif
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
