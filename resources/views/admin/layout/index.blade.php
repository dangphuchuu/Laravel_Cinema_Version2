<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <base href="{{asset('')}}">
  <title>Admin</title>
  <link rel="icon" type="image/png" href="images/favicon/cinema.png ">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Font Awesome -->
  <link href="/web_assets/fonts/fontawesome/css/all.css" rel="stylesheet" />
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="admin_assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="admin_assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="admin_assets/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="admin_assets/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="admin_assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="admin_assets/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="admin_assets/plugins/summernote/summernote-bs4.min.css">
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">

  <!-- {{--Select2--}} -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/css/select2.min.css" integrity="sha512-aD9ophpFQ61nFZP6hXYu4Q/b/USW7rpLCQLX6Bi0WJHXNO7Js/fUENpBQf/+P4NtpzNX0jSgR5zVvPOJp+W2Kg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- {{-- Sweetalert2 --}} -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.12/sweetalert2.css" integrity="sha512-K0TEY7Pji02TnO4NY04f+IU66vsp8z3ecHoID7y0FSVRJHdlaLp/TkhS5WDL3OygMkVns4bz0/ah4j8M3GgguA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Preloader -->
    <!-- <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div> -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="/admin" class="brand-link">
        <img src="images/favicon/cinema.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">THHNcinema</span>
      </a>

      <!-- Sidebar -->
      @include('admin.layout.sidebar')
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    @include('admin.layout.nav')
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <!-- Left col -->
        <section class="col-lg-12 connectedSortable">

          @yield('content')

        </section>
        <!-- /.Left col -->
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- JQuery -->
  <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="admin_assets/js/core/popper.min.js"></script>
  <script src="admin_assets/js/core/bootstrap.min.js"></script>
  <script src="admin_assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="admin_assets/js/plugins/smooth-scrollbar.min.js"></script>
  <!-- ChartJS -->
  <script src="admin_assets/plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="admin_assets/plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="admin_assets/plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="admin_assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="admin_assets/plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="admin_assets/plugins/moment/moment.min.js"></script>
  <script src="admin_assets/plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="admin_assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="admin_assets/plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="admin_assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="admin_assets/dist/js/adminlte.js"></script>
  <!-- AdminLTE for demo purposes -->
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="admin_assets/dist/js/pages/dashboard.js"></script>

  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
  {{-- Select2 --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/js/select2.min.js" integrity="sha512-4MvcHwcbqXKUHB6Lx3Zb5CEAVoE9u84qN+ZSMM6s7z8IeJriExrV3ND5zRze9mxNlABJ6k864P/Vl8m0Sd3DtQ==" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/scanbot-web-sdk@latest/bundle/ScanbotSDK.min.js"></script>
  <!-- After, initialize the Scanbot SDK in your own script -->

  <script src="admin_assets/scanbotSDK/js/lib/toastify.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
  <script src="https://npmcdn.com/flatpickr/dist/l10n/vn.js"></script>

  <script src="admin_assets/scanbotSDK/js/lib/toastify.js"></script>

  {{-- SweetAlert2 --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.12/sweetalert2.js" integrity="sha512-ywT1Sl8B8rJwwBWFC3rPTu/VQkDrnS19Kw0Xxa6Y9xvzMSwVMHDQscePPR9yNE0oyVsITEcvUPSDW/aS5KX+Mw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  {{--Firebase database--}}
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>

  {{-- CKeditor --}}
  <script src="https://cdn.ckeditor.com/ckeditor5/38.1.1/classic/ckeditor.js"></script>

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
  <!-- Insert this script at the bottom of the HTML, but before you use any Firebase services -->
  <script type="module">
    import {
      initializeApp
    } from 'https://www.gstatic.com/firebasejs/10.0.0/firebase-app.js'

    import {
      getDatabase,
      ref,
      onValue,
      set
    } from 'https://www.gstatic.com/firebasejs/10.0.0/firebase-database.js'

    const firebaseConfig = {
      apiKey: "{{config('services.firebase.apiKey')}}",
      authDomain: "{{config('services.firebase.authDomain')}}",
      projectId: "{{config('services.firebase.projectId')}}",
      storageBucket: "{{config('services.firebase.storageBucket')}}",
      messagingSenderId: "{{config('services.firebase.messagingSenderId')}}",
      appId: "{{config('services.firebase.appId')}}",
      measurementId: "{{config('services.firebase.measurementId')}}",
      databaseURL: "{{config('services.firebase.databaseURL')}}"
    };

    // Initialize Firebase
    const app = initializeApp(firebaseConfig);

    // Initialize Realtime Database and get a reference to the service
    const db = getDatabase(app);

    // function writeUserData(userId, name, email, imageUrl) {
    //     set(ref(db, 'users/' + userId), {
    //         username: name,
    //         email: email,
    //         profile_picture : imageUrl
    //     });
    // }

    // writeUserData('2', 'ssMinh', 'minh@gmail.com', 'huungu');
    // const element = document.getElementById("test");
    // const starCountRef = ref(db, 'users/' + 2 );
    // onValue(starCountRef, (snapshot) => {
    //     const data = snapshot.val();
    //     $("#test").text(data.username);
    // });
  </script>
  @yield('scripts')
</body>

</html>