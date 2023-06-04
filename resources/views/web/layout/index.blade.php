<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>HuuMinh</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="telephone=no" name="format-detection">

    <base href="{{asset('')}}">

    <!-- Bootstrap CSS -->
    <link href="/web_assets/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">

    <!-- Fonts -->
    <!-- Font awesome - icon font -->
    <link href="/web_assets/fonts/fontawesome/css/all.css" rel="stylesheet"/>

    {{-- select2 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>

    @yield('css')
</head>

<body>
<div class="wrapper">

    {{-- Header --}}
    @include('web.common.header')

    {{-- Search  --}}
    @include('web.common.search')

    {{-- Warning  --}}
    @if(count($errors) > 0)
        <div class="alert alert-danger">
            @foreach($errors->all() as $arr)
                {{ $arr }}<br>
            @endforeach
        </div>
    @endif
    @if (session('warning'))
        <div class="alert alert-warning">
            {{ session('warning') }}
        </div>
    @endif


    @yield('content')

    {{-- Footer --}}
    @include('web.common.footer')

</div>

{{-- login --}}
@include('web.common.login')

<!-- JavaScript -->

<!-- Bootstrap JS -->
<script src="web_assets/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

<!-- JQuery -->
<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
        crossorigin="anonymous"></script>

<!-- select2 -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


<script>
    $(document).ready(function () {
        $('.js-example-basic-multiple').select2();
    });
</script>
@yield('js')
</body>

</html>
