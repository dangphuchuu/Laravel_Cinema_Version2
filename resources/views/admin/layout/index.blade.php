<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <base href="{{asset('')}}">

    {{--Img--}}
    <link rel="apple-touch-icon" sizes="76x76" href="admin_assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="images/favicon/theater_favicon.png">
    <title>
        Admin Cinema
    </title>

    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="admin_assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="admin_assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font awesome - icon font -->
    <link href="/web_assets/fonts/fontawesome/css/all.css" rel="stylesheet"/>
    <link href="admin_assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="admin_assets/css/argon-dashboard.css" rel="stylesheet" />

    {{--Select2--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/css/select2.min.css"
          integrity="sha512-aD9ophpFQ61nFZP6hXYu4Q/b/USW7rpLCQLX6Bi0WJHXNO7Js/fUENpBQf/+P4NtpzNX0jSgR5zVvPOJp+W2Kg==" crossorigin="anonymous"
          referrerpolicy="no-referrer"/>

    <style>
        .dropdown .dropdown-menu.show:before {
            top: -11px !important;
            position: absolute !important;
        }
        @yield('css')
    </style>
</head>

<body class="g-sidenav-show bg-gray-100">

<div class="min-height-300 bg-primary position-absolute w-100"></div>

@include('admin.layout.sidebar')
<main class="main-content position-relative border-radius-lg">
    <!-- Navbar -->
    @include('admin.layout.nav')
    <!-- End Navbar -->
    @yield('content')
</main>

<div class="fixed-plugin">
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
        <i class="fa fa-cog py-2"> </i>
    </a>
    <div class="card shadow-lg">
        <div class="card-header pb-0 pt-3 ">
            <div class="float-start">
                <h5 class="mt-3 mb-0">Argon Configurator</h5>
                <p>See our dashboard options.</p>
            </div>
            <div class="float-end mt-4">
                <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
                    <i class="fa fa-close"></i>
                </button>
            </div>
            <!-- End Toggle Button -->
        </div>
        <hr class="horizontal dark my-1">
        <div class="card-body pt-sm-3 pt-0 overflow-auto">
            <!-- Sidebar Backgrounds -->
            <div>
                <h6 class="mb-0">Sidebar Colors</h6>
            </div>
            <a href="javascript:void(0)" class="switch-trigger background-color">
                <div class="badge-colors my-2 text-start">
                    <span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
                    <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
                    <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
                    <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
                    <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
                    <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
                </div>
            </a>
            <!-- Sidenav Type -->
            <div class="mt-3">
                <h6 class="mb-0">Sidenav Type</h6>
                <p class="text-sm">Choose between 2 different sidenav types.</p>
            </div>
            <div class="d-flex">
                <button class="btn bg-gradient-primary w-100 px-3 mb-2 active me-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
                <button class="btn bg-gradient-primary w-100 px-3 mb-2" data-class="bg-default" onclick="sidebarType(this)">Dark</button>
            </div>
            <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
            <!-- Navbar Fixed -->
            <div class="d-flex my-3">
                <h6 class="mb-0">Navbar Fixed</h6>
                <div class="form-check form-switch ps-0 ms-auto my-auto">
                    <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
                </div>
            </div>
            <hr class="horizontal dark my-sm-4">
            <div class="mt-2 mb-5 d-flex">
                <h6 class="mb-0">Light / Dark</h6>
                <div class="form-check form-switch ps-0 ms-auto my-auto">
                    <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version" onclick="darkMode(this)">
                </div>
            </div>
        </div>
    </div>
</div>

<!--   Core JS Files   -->
<script src="admin_assets/js/core/popper.min.js"></script>
<script src="admin_assets/js/core/bootstrap.min.js"></script>
<script src="admin_assets/js/plugins/perfect-scrollbar.min.js"></script>
<script src="admin_assets/js/plugins/smooth-scrollbar.min.js"></script>

<!-- Plugin for the charts, full documentation here: https://www.chartjs.org/ -->
<script src="admin_assets/js/plugins/chartjs.min.js"></script>
<script src="admin_assets/js/plugins/Chart.extension.js"></script>

<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>

<!-- Control Center for Argon Dashboard: parallax effects, scripts for the example pages etc -->
<script src="admin_assets/js/argon-dashboard.min.js"></script>

{{-- Jquery --}}
<!-- JQuery -->
<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
        crossorigin="anonymous"></script>

{{-- Select2 --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/js/select2.min.js"
        integrity="sha512-4MvcHwcbqXKUHB6Lx3Zb5CEAVoE9u84qN+ZSMM6s7z8IeJriExrV3ND5zRze9mxNlABJ6k864P/Vl8m0Sd3DtQ==" crossorigin="anonymous"></script>

{{-- CKeditor --}}
<script src="https://cdn.ckeditor.com/ckeditor5/35.2.1/classic/ckeditor.js"></script>

{{-- ScanbotSDK --}}
{{--<script src="admin_assets/scanbotSDK/wasm/ScanbotSDK.min.js"></script>--}}
<script src="https://cdn.jsdelivr.net/npm/scanbot-web-sdk@latest/bundle/ScanbotSDK.min.js"></script>
<!-- After, initialize the Scanbot SDK in your own script -->
<script src="admin_assets/scanbotSDK/js/lib/toastify.js"></script>
{{--<script src="admin_assets/scanbotSDK/js/config.js"></script>--}}
{{--<script src="admin_assets/scanbotSDK/js/utils.js"></script>--}}
{{--<script src="admin_assets/scanbotSDK/js/view-utils.js"></script>--}}
{{--<script src="admin_assets/scanbotSDK/main.js"></script>--}}



<script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
</script>

<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .then(editor => {
            console.log(editor);
        })
        .catch(error => {
            if (!error)
                console.error(error);
        });
</script>
<script>
    ClassicEditor
        .create(document.querySelector('#conditions'))
        .then(editor => {
            console.log(editor);
        })
        .catch(error => {
            if (!error)
                console.error(error);
        });
</script>

@yield('scripts')

</body>

</html>

