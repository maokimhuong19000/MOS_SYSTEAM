<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="{{asset('front/img/logo.png')}}">
  <link rel="icon" type="image/png" href="{{asset('front/img/logo.png')}}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    {{trans('label.department') }}
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link href="https://fonts.googleapis.com/css?family=Kantumruy" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Moul" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Siemreap" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="{{asset('admin/css/material-dashboard.css?v=2.1.0')}}" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
 
  <link rel="stylesheet" type="text/css" href="{{asset('customsidebar/css/style.css')}}">

  <link href="{{asset('admin/css/bootstrap.css')}}">

  <link href="{{asset('admin/css/dataTables.bootstrap4.min.css')}}">


  <link href="{{asset('admin/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('admin/css/datatables.min.css')}}"/>


  <link href="https://unpkg.com/gijgo@1.9.11/css/gijgo.min.css" rel="stylesheet" type="text/css" />
  <link href="{{asset('admin/tab/css/themes/all-themes.css')}}" rel="stylesheet" />
  <link href="{{asset('admin/tab/plugins/animate-css/animate.css')}}" rel="stylesheet" />
  <link href="{{asset('admin/tab/plugins/node-waves/waves.css')}}" rel="stylesheet" />
 


<link rel="stylesheet" type="text/css" href="{{asset('admin/css/material.css')}}"/>
<script src="{{asset('admin/js/material.js')}}" type="text/javascript"></script> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/css/tempusdominus-bootstrap-4.min.css" />

</head>

<body class="">
  <div class="wrapper">
    @include('layout.partical.sidebar')
    <div class="main-panel">
     <!-- dark -->


      <!-- Navbar -->
     @include('layout.partical.navbar')
      <!-- End Navbar -->
     
      <div class="content">
        <div class="container-fluid">
              @yield('navbar-header')
              @yield('content')
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--   Core JS Files   -->
<script src="{{asset('admin/js/core/jquery.min.js')}}" type="text/javascript"></script> 
  <script src="{{asset('admin/js/core/popper.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('admin/js/core/bootstrap-material-design.min.js')}}" type="text/javascript"></script>

  <script src="{{asset('admin/js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>

  <!--  Google Maps Plugin    -->
 
  <!-- Chartist JS -->
  <script src="{{asset('admin/js/plugins/chartist.min.js')}}"></script>
  <!--  Notifications Plugin    -->
  <script src="{{asset('admin/js/plugins/bootstrap-notify.js')}}"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{asset('admin/js/material-dashboard.js?v=2.1.0')}}" type="text/javascript"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="{{asset('admin/demo/demo.js')}}"></script>
  <script type="text/javascript" src="{{asset('customsidebar/js/script.js')}}"></script>
<script src="{{asset('front/bootstrap-datepicker.js')}}"></script>
<!--<script src="https://code.jquery.com/jquery-3.3.1.js"></script>-->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/b-1.5.6/b-colvis-1.5.6/b-html5-1.5.6/b-print-1.5.6/datatables.min.js"></script>
<script src="https://unpkg.com/gijgo@1.9.11/js/gijgo.min.js" type="text/javascript"></script>
 <script src="{{asset('front/loadingoverlay.min.js')}}" type="text/javascript"></script>

  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
     // md.initDashboardPageCharts();

    });
  </script>
  @yield('script')
</body>

</html>
