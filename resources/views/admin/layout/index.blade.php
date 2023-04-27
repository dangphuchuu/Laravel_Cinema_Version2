<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Purple Admin</title>
  <!-- CSS -->
  <base href="{{asset('')}}">
  <link rel="stylesheet" type="text/css" href="admin_assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" type="text/css" href="admin_assets/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" type="text/css" href="admin_assets/css/style.css">
  <link rel="shortcut icon" type="image/x-icon" href="admin_assets/images/favicon.ico" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
  <div class="container-scroller">
    <!-- Header -->
    @include('admin.layout.header')
    <div class="container-fluid page-body-wrapper">
      <!-- Layout -->
      @include('admin.layout.menu')
      <div class="main-panel">
        <div class="content-wrapper">
          @yield('content')
        </div>
      </div>
    </div>
  </div>

  <!-- javascript -->
  <script src="admin_assets/vendors/js/vendor.bundle.base.js"></script>
  <script src="admin_assets/vendors/chart.js/Chart.min.js"></script>
  <script src="admin_assets/js/jquery.cookie.js" type="text/javascript"></script>
  <script src="admin_assets/js/off-canvas.js"></script>
  <script src="admin_assets/js/hoverable-collapse.js"></script>
  <script src="admin_assets/js/misc.js"></script>
  <script src="admin_assets/js/dashboard.js"></script>
  <script src="admin_assets/js/todolist.js"></script>
</body>

</html>