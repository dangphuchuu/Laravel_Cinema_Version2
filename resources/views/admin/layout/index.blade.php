<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>

<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        Admin Cinema
    </title>
    <base href="{{asset('')}}">
    {{--Img--}}
    <link rel="apple-touch-icon" sizes="76x76" href="admin_assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="admin_assets/img/favicon.png">

    <!--     Fonts and icons     -->
    {{--Google api--}}
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet"/>
    {{--Font Awesome--}}
    <link href="\web_assets\fonts\fontawesome\css\all.css" rel="stylesheet"/>
    <!-- Nucleo Icons -->
    <link href="admin_assets/css/nucleo-icons.css" rel="stylesheet"/>
    <link href="admin_assets/css/nucleo-svg.css" rel="stylesheet"/>
    <link href="admin_assets/css/nucleo-svg.css" rel="stylesheet"/>
    <!-- Argon dashboard CSS Files -->
    <link id="pagestyle" href="admin_assets/css/argon-dashboard.css" rel="stylesheet"/>

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
    <div class="container-fluid py-4">
        @yield('content')
    </div>
</main>


<!--   Core JS Files   -->
<script src="admin_assets/js/core/popper.min.js"></script>
<script src="admin_assets/js/core/bootstrap.min.js"></script>
{{--<script src="admin_assets/js/plugins/perfect-scrollbar.min.js"></script>--}}
<script src="admin_assets/js/plugins/smooth-scrollbar.min.js"></script>
<script src="admin_assets/js/plugins/chartjs.min.js"></script>
<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
<script src="admin_assets/js/argon-dashboard.min.js?v=2.0.4"></script>
{{-- Jquery --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
        integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous"
        referrerpolicy="no-referrer"></script>
{{-- Select2 --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/js/select2.min.js"
        integrity="sha512-4MvcHwcbqXKUHB6Lx3Zb5CEAVoE9u84qN+ZSMM6s7z8IeJriExrV3ND5zRze9mxNlABJ6k864P/Vl8m0Sd3DtQ==" crossorigin="anonymous"
        referrerpolicy="no-referrer"></script>
{{-- CKeditor --}}
<script src="https://cdn.ckeditor.com/ckeditor5/35.2.1/classic/ckeditor.js"></script>

{{-- Perfect  Scrollbar--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.5/perfect-scrollbar.min.js"
        integrity="sha512-X41/A5OSxoi5uqtS6Krhqz8QyyD8E/ZbN7B4IaBSgqPLRbWVuXJXr9UwOujstj71SoVxh5vxgy7kmtd17xrJRw==" crossorigin="anonymous"
        referrerpolicy="no-referrer"></script>
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
