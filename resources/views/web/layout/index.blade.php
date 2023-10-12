<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Client Cinema</title>
    <!-- Google Search -->
    <meta name="google-site-verification" content="1PaYB4dlqRjhgBy-jyq5O89I4a8BzAc3d1E_s1BXLPs" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="telephone=no" name="format-detection">

    <base href="{{asset('')}}">

    {{-- Favicon --}}
    <link rel="icon" type="image/png" href="images/favicon/cinema.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" integrity="sha512-t4GWSVZO1eC8BM339Xd7Uphw5s17a86tIZIj8qRxhnKub6WoyhnrxeCIMeAqBPgdZGlCcG2PrZjMc+Wr78+5Xg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Fonts -->
    <!-- Font awesome - icon font -->
    <link href="/web_assets/fonts/fontawesome/css/all.css" rel="stylesheet" />

    {{-- select2 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    {{-- Owl Carousel --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css" integrity="sha512-UTNP5BXLIptsaj5WdKFrkFov94lDx+eBvbKyoe1YAfjeRPC+gT5kyZ10kOHCfNZqEui1sxmqvodNUx3KbuYI/A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css" integrity="sha512-OTcub78R3msOCtY3Tc6FzeDJ8N9qvQn1Ph49ou13xgA9VsH9+LRxoFU6EqLhW4+PKRfU+/HReXmSZXHEkpYoOA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    @yield('link_css')

    <style>
        @yield('css')
    </style>
</head>

<body style="margin-top: 80px">
    <div class="wrapper">
        {{-- Header --}}
        @include('web.common.header')

        {{-- Search  --}}
        {{-- @include('web.common.search')--}}

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
        @if (session('danger'))
        <div class="alert alert-danger">
            {{ session('danger') }}
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

        <button onclick="topFunction()" id="myBtn" title="Go to top" class="btn btn-danger rounded-pill position-fixed" 
                style="width: 60px; height: 60px; bottom: 30px; right: 30px;">
            <i class="fa-regular fa-chevron-up fa-lg"></i>
        </button>

    </div>

    {{-- login --}}
    @include('web.common.login')
    <!-- Zalo -->
    <script src="https://sp.zalo.me/plugins/sdk.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js" integrity="sha512-VK2zcvntEufaimc+efOYi622VN5ZacdnufnmX7zIhCPmjhKnOi9ZDMtg1/ug5l183f19gG1/cBstPO4D8N/Img==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>

    <!-- select2 -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- html2Canvas -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js" integrity="sha512-BNaRQnYJYiPSqHHDb58B0yaPfCu+Wgds8Gp/gU33kqBtgNS4tSPHuGibyoeqMV/TJlSKda6FXzoEyYGjTe+vXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    {{-- Owl Carousel --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js" integrity="sha512-gY25nC63ddE0LcLPhxUJGFxa2GoIyA5FLym4UJqHDEMHjp8RET6Zn/SHo1sltt3WuVtqfyxECP38/daUc/WVEA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    {{-- CKeditor --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/38.1.1/classic/ckeditor.js"></script>

    <script>
        // Get the button:
        let mybutton = document.getElementById("myBtn");

        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {scrollFunction()};

        function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            mybutton.style.display = "block";
        } else {
            mybutton.style.display = "none";
        }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            document.body.scrollTop = 0; // For Safari
            document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
        } 
    </script>
    @yield('js')
</body>

</html>