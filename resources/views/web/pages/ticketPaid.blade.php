@extends('web.layout.index')
@section('css')
@endsection

@section('content')
    <section class="container-fluid clearfix bg-warning">
        <svg id="the_canvas_element_id">
            <div class="row">
                <div class="d-flex justify-content-center text-center">
                    @php
                        $generatorPNG = new Picqer\Barcode\BarcodeGeneratorPNG();
                    @endphp
                    {{--{!! DNS1D::getBarcodeHTML($value['code'], 'C128') !!}--}}
                    <div class="d-block p-4 bg-light m-5">
                        <div>
                            <img
                                src="data:image/png;base64,{{ base64_encode($generatorPNG->getBarcode($ticket->code,$generatorPNG::TYPE_CODE_128)) }}"
                                alt="..."/>
                        </div>
                        <div>
                            {{ $ticket->code }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="d-flex justify-content-center text-start fs-4 fw-bold">
                    <div class="d-inline-flex p-2 m-1 justify-content-between" style="width: 400px">
                        <div class="d-block text-uppercase">Rạp:</div>
                        <div class="d-block ps-3">{{ $ticket->schedule->room->theater->name }}</div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="d-flex justify-content-center text-start fs-4 fw-bold">
                    <div class="d-inline-flex p-2 m-1 justify-content-between" style="width: 400px">
                        <div class="d-block text-uppercase">Phòng:</div>
                        <div class="d-block ps-3">{{ $ticket->schedule->room->name }}</div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="d-flex justify-content-center text-start fs-4 fw-bold">
                    <div class="d-inline-flex p-2 m-1 justify-content-between" style="width: 400px">
                        <div class="d-block text-uppercase">Suất:</div>
                        <div class="d-block ps-3">
                            {{ date('H:i', strtotime($ticket->schedule->startTime)).' '.date('d-m-Y', strtotime($ticket->schedule->date)) }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="d-flex justify-content-center text-start fs-4 fw-bold">
                    <div class="d-inline-flex p-2 m-1 justify-content-between" style="width: 400px">
                        <div class="d-block text-uppercase">Ghế:</div>
                        <div class="d-block ps-3">
                            @foreach($ticket->ticketSeats as $seat)
                                @if ($loop->first)
                                    {{ $seat->row.$seat->col }}
                                @else
                                    , {{ $seat->row.$seat->col }}
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="d-flex justify-content-center text-start fs-4 fw-bold">
                    <div class="d-inline-flex p-2 m-1 justify-content-between" style="width: 400px">
                        <div class="d-block text-uppercase">Combo:</div>
                        <div class="d-block ps-3">
                            @isset($ticket->ticketCombos)
                                @foreach($ticket->ticketCombos as $combo)
                                    @if ($loop->first)
                                        {{ $combo->comboName. ' - '.$combo->comboDetails }}
                                    @else
                                        <br>{{ $combo->comboName. ' - '.$combo->comboDetails }}
                                    @endif
                                @endforeach
                            @endisset
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="d-flex justify-content-center text-start fs-4 fw-bold">
                    <div class="d-inline-flex p-2 pb-5 m-1 justify-content-between" style="width: 400px">
                        <div class="d-block text-uppercase">Ngày mua:</div>
                        <div class="d-block ps-3">
                            {{ date('H:i, d-m-Y', strtotime($ticket->created_at)) }}
                        </div>
                    </div>
                </div>
            </div>
        </svg>
        <div class="row">
            <div class="d-flex justify-content-center">
                <div class="d-inline-flex p-2 pb-5 m-1 justify-content-evenly" style="width: 400px">
                    <div class="d-block">
                        <button type="button" class="btn btn-outline-light border-2 fw-bold">Trở về</button>
                    </div>
                    <div class="d-block">
                        <button id="btn_download" type="button" class="btn btn-outline-light border-2 fw-bold">Tải về</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script>
        var c = document.getElementById('the_canvas_element_id');
        $('#btn_download').on('click', () => {
            window.open('', document.getElementById('the_canvas_element_id').toDataURL());
        })
    </script>
@endsection
