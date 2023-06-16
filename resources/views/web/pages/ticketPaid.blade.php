<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Staatliches&display=swap");


        .rotateimg270 {
            -webkit-transform:rotate(270deg);
            -moz-transform: rotate(270deg);
            -ms-transform: rotate(270deg);
            -o-transform: rotate(270deg);
            transform: rotate(270deg);
        }
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .btn {
            display: inline-block;
            font-weight: 400;
            line-height: 1.5;
            color: #212529;
            text-align: center;
            text-decoration: none;
            vertical-align: middle;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
            background-color: transparent;
            border: 1px solid transparent;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            border-radius: 0.25rem;
            transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
        }
        .btn-outline-light {
            color: #f8f9fa;
            border-color: #f8f9fa;
        }
        body,
        html {
            height: 100vh;
            display: grid;
            font-family: "Roboto", cursive;
            background: #d83565;
            color: black;
            font-size: 14px;
            letter-spacing: 0.1em;
        }

        .ticket {
            margin: auto;
            display: flex;
            background: white;
            box-shadow: rgba(0, 0, 0, 0.3) 0px 19px 38px, rgba(0, 0, 0, 0.22) 0px 15px 12px;
        }

        .left {
            display: flex;
        }

        .admit-one {
            position: absolute;
            color: darkgray;
            height: 250px;
            padding: 0 10px;
            letter-spacing: 0.15em;
            display: flex;
            text-align: center;
            justify-content: space-around;
            writing-mode: vertical-rl;
            transform: rotate(-180deg);
        }

        .admit-one span:nth-child(2) {
            color: white;
            font-weight: 700;
        }

        .left .ticket-number {
            height: 250px;
            width: 250px;
            display: flex;
            justify-content: flex-end;
            align-items: flex-end;
            padding: 5px;
        }

        .ticket-info {
            padding: 10px 30px;
            display: flex;
            flex-direction: column;
            text-align: center;
            justify-content: space-between;
            align-items: center;
        }

        .date {
            border-top: 1px solid gray;
            border-bottom: 1px solid gray;
            padding: 5px 0;
            font-weight: 700;
            display: flex;
            align-items: center;
            justify-content: space-around;
        }

        .date span {
            width: 100px;
        }

        .date span:first-child {
            text-align: left;
        }

        .date span:last-child {
            text-align: right;
        }

        .date .june-29 {
            color: #d83565;
            font-size: 20px;
        }

        .show-name {
            font-size: 32px;
            /*font-family: "Nanum Pen Script", cursive;*/
            font-family: "Roboto", cursive;
            color: #d83565;
        }

        .show-name h1 {
            font-size: 48px;
            font-weight: 700;
            letter-spacing: 0.1em;
            color: #4a437e;
        }

        .time {
            padding: 10px 0;
            color: #4a437e;
            text-align: center;
            display: flex;
            flex-direction: column;
            gap: 10px;
            font-weight: 700;
        }

        .time span {
            font-weight: 400;
            color: gray;
        }

        .left .time {
            font-size: 16px;
        }


        .location {
            display: flex;
            justify-content: space-around;
            align-items: center;
            width: 100%;
            padding-top: 8px;
            border-top: 1px solid gray;
        }

        .location .separator {
            font-size: 20px;
        }

        .right {
            width: 180px;
            border-left: 1px dashed #404040;
        }

        .right .admit-one {
            color: darkgray;
            font-family: "Staatliches", cursive;
        }

        .right .admit-one span:nth-child(2) {
            color: gray;
        }

        .right .right-info-container {
            height: 250px;
            padding: 10px 10px 10px 35px;
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            align-items: center;
        }

        .right .show-name h1 {
            font-size: 18px;
        }

        .barcode {
            height: 100px;
        }

        .barcode img {
            height: 100%;
        }

        .right .ticket-number {
            color: gray;
        }
        .border-2 {
            border-width: 2px!important;
        }
        .fw-bold {
            font-weight: 700!important;
        }
    </style>
</head>
<body>

<div class="ticket">
    <div class="left">
        <div class="ticket-info">
            <p class="date">
                <span> {!! date('l', strtotime($ticket->schedule->date)) !!}</span>
                <span class="june-29"> {!! date('d F', strtotime($ticket->schedule->date)) !!}</span>
                <span>{!! date('Y', strtotime($ticket->schedule->date)) !!}</span>
            </p>
            <div class="show-name">
                <h1>{!! $ticket['schedule']['movie']['name']  !!}</h1>
                <h2>{!! $ticket['schedule']['room']['name'] !!}</h2>
            </div>
            <div class="time">
                 <p> <span>@lang('lang.showtime_web')</span> {!! date('H:i A', strtotime($ticket->schedule->startTime)) !!} <span>@lang('lang.to')</span> {!! date('H:i a', strtotime($ticket->schedule->endTime)) !!}</p>
                <p> <span>@lang('lang.seat')</span>
                    @foreach($ticket->ticketSeats as $seat)
                        @if ($loop->first)
                            {{ $seat->row.$seat->col }}
                        @else
                            ,{{ $seat->row.$seat->col }}
                        @endif
                    @endforeach
                </p>
            </div>
            <p class="location"><span>{!! $ticket->schedule->room->theater->name !!}</span>
                <span class="separator"><i class="far fa-smile"></i></span><span>{!! $ticket->schedule->room->theater->city !!}</span>
            </p>
        </div>
    </div>
    <div class="right">
        <p class="admit-one">
            <span>HMCinema</span>
            <span>HMCinema</span>
            <span>HMCinema</span>
        </p>
        <div class="right-info-container">
            <div class="rotateimg270">
            <div class="barcode ">
            @php
                $generatorPNG = new Picqer\Barcode\BarcodeGeneratorPNG();
            @endphp
                <img  style="margin-right: 20px;height: auto;width: 250px;"src="data:image/png;base64,{{ base64_encode($generatorPNG->getBarcode($ticket->code,$generatorPNG::TYPE_CODE_128)) }}" alt="QR code"/>
            </div>
            <p class="ticket-number" style="height: auto;margin-top: -35px;width: auto;margin-left: 80px;">
                {!! $ticket->code !!}
            </p>
            </div>
        </div>
    </div>
</div>
<div style="display: flex; justify-content: center; letter-spacing: 20px;">
<div style="display: inline-block;">
    <button type="button" class="btn btn-outline-light border-2 fw-bold">@lang('lang.previous')</button>
    <button id="btn_download" type="button" class="btn btn-outline-light border-2 fw-bold">@lang('lang.download')</button>
</div>
</div>
</body>
</html>
@section('js')
    <script>
        var c = document.getElementById('the_canvas_element_id');
        $('#btn_download').on('click', () => {
            window.open('', document.getElementById('the_canvas_element_id').toDataURL());
        })
    </script>
@endsection
