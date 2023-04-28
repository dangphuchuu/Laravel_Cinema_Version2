<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Purple Admin</title>
  <base href="{{asset('')}}">
  <!-- plugins:css -->
  <link rel="stylesheet" type="text/css" href="admin_assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" type="text/css" href="admin_assets/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" type="text/css" href="admin_assets/css/style.css">
  <!-- End layout styles -->
  <link rel="shortcut icon" type="image/x-icon" href="admin_assets/images/favicon.ico" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    @include('admin.layout.header')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.layout.menu')
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
         @yield('content')
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="container-fluid d-flex justify-content-between">
            <span class="text-muted d-block text-center text-sm-start d-sm-inline-block">Copyright © bootstrapdash.com 2021</span>
            <span class="float-none float-sm-end mt-1 mt-sm-0 text-end"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin template</a> from Bootstrapdash.com</span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="admin_assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="admin_assets/vendors/chart.js/Chart.min.js"></script>
  <script src="admin_assets/js/jquery.cookie.js" type="text/javascript"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="admin_assets/js/off-canvas.js"></script>
  <script src="admin_assets/js/hoverable-collapse.js"></script>
  <script src="admin_assets/js/misc.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page -->
  <script src="admin_assets/js/dashboard.js"></script>
  <script src="admin_assets/js/todolist.js"></script>
  <!-- End custom js for this page -->
</body>

</html>
