<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>HuuMinh</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="telephone=no" name="format-detection">

    <base href="{{asset('')}}">
    <!-- Fonts -->
    <!-- Font awesome - icon font -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
          integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <!-- Roboto -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,700' rel='stylesheet' type='text/css'>
    <!-- Open Sans -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:800italic' rel='stylesheet' type='text/css'>

    <!-- Stylesheets -->

    <!-- Mobile menu -->
    <link href="user_assets/css/gozha-nav.css" rel="stylesheet"/>
    <!-- Select -->
    <link href="user_assets/css/external/jquery.selectbox.css" rel="stylesheet"/>

    <!-- Custom -->
    {{--    <link href="user_assets/css/style.css?v=1" rel="stylesheet" />--}}


    <!-- Modernizr -->
    <script src="user_assets/js/external/modernizr.custom.js"></script>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
<div class="wrapper">

    {{-- Header --}}
    @include('user.common.header')

    @yield('content')

    {{-- Footer --}}
    @include('user.common.footer')

</div>
<!-- open/close -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog container">
        <div class="modal-content">
            <div class="modal-header text-uppercase">
                <h5 class="modal-title" id="exampleModalLabel">Đăng nhập</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body my-4">
                <form method='get'>
                    <div class="mb-3">
                        <input class="form-control" type="email" placeholder="Email..." name="email">
                    </div>
                    <div class="mb-3">
                        <input class="form-control" type="password" placeholder="Password..." name="password">
                    </div>
                    <div class="form-check mb-4">
                        <input class="form-check-input" type="checkbox" value="" id="rememberme">
                        <label class="form-check-label" for="rememberme">
                            Nhớ mật khẩu
                        </label>
                    </div>

                    <div class="modal-footer justify-content-center">
                        <div class="row text-center">
                            <button type='submit' class="btn btn-warning col-12 text-uppercase">Đăng nhập</button>
                            <a href="#" class="link link-secondary col-12 mt-4">Quên mật khẩu?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- JavaScript-->
<!-- jQuery 3.1.1-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/external/jquery-3.1.1.min.js"><\/script>')</script>
<!-- Migrate -->
<script src="user_assets/js/external/jquery-migrate-1.2.1.min.js"></script>
<!-- Bootstrap 3-->
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js"></script>

<!-- Mobile menu -->
<script src="user_assets/js/jquery.mobile.menu.js"></script>
<!-- Select -->
<script src="user_assets/js/external/jquery.selectbox-0.2.min.js"></script>
<!-- Stars rate -->
<script src="user_assets/js/external/jquery.raty.js"></script>

<!-- Form element -->
<script src="user_assets/js/external/form-element.js"></script>
<!-- Form validation -->
<script src="user_assets/js/form.js"></script>

<!-- Twitter feed -->
<script src="user_assets/js/external/twitterfeed.js"></script>

<!-- Custom -->
<script src="user_assets/js/custom.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        init_Home();
    });
</script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>

</body>
</html>
