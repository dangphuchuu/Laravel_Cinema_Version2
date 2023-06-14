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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css"
          integrity="sha512-t4GWSVZO1eC8BM339Xd7Uphw5s17a86tIZIj8qRxhnKub6WoyhnrxeCIMeAqBPgdZGlCcG2PrZjMc+Wr78+5Xg==" crossorigin="anonymous"
          referrerpolicy="no-referrer"/>

    <!-- Fonts -->
    <!-- Font awesome - icon font -->
    <link href="/web_assets/fonts/fontawesome/css/all.css" rel="stylesheet"/>

    {{-- select2 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
    @yield('link_css')
    <style>
        @yield('css')
    </style>
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
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"
        integrity="sha512-VK2zcvntEufaimc+efOYi622VN5ZacdnufnmX7zIhCPmjhKnOi9ZDMtg1/ug5l183f19gG1/cBstPO4D8N/Img==" crossorigin="anonymous"
        referrerpolicy="no-referrer"></script>

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
