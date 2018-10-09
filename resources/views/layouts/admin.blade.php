<?php 
  function current_page($uri = "/") { 
    return strstr(request()->path(), $uri); 
  } 
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> {{config('app.name')}} @yield('title')</title>

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{{asset('public/admin/bootstrap/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('public/admin/css/Support.css')}}">
  <!--  skin from the css/skins folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{asset('public/admin/css/skins/_all-skins.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('public/admin/plugins/iCheck/flat/blue.css')}}">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{asset('public/admin/plugins/morris/morris.css')}}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{asset('public/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.css')}}">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{asset('public/admin/plugins/datepicker/datepicker3.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('public/admin/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{asset('public/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
  <!--Custom Style Sheet-->
  <link rel="stylesheet" href="{{asset('public/css/app.css')}}">
  <link rel="stylesheet" href="{{asset('public/admin/css/main.css')}}">

  @section('HeaderSection')

  @show

</head>
<body class="hold-transition skin-blue sidebar-mini">

  <div class="wrapper">

      <!--Mani Top Navbar-->  
      @include('admin.layouts.top_nav')

      
      <!--main Sidebar-->
      @include('admin.layouts.main_sidebar')

      <!-- Content Wrapper. Contains page content -->
      <!--div class="content-wrapper"-->

         @yield('content')

      <!--/div-->
      
      <!--footer-->
      @include('admin.layouts.footer')

      
      <!--Control Sidebar-->
      {{--
      @include('admin.layouts.control_sidebar')
      --}}

      <!-- Add the sidebar's background. This div must be placed
          immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div>
<!-- ./wrapper -->
<script src="{{asset('public/js/app.js')}}"></script>
<script src="{{asset('public/admin/plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!--script src="{{asset('public/admin/bootstrap/js/bootstrap.min.js')}}"></script--->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="{{asset('public/admin/plugins/morris/morris.min.js')}}"></script>
<script src="{{asset('public/admin/plugins/sparkline/jquery.sparkline.min.js')}}"></script>
<script src="{{asset('public/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{asset('public/admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<script src="{{asset('public/admin/plugins/knob/jquery.knob.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="{{asset('public/admin/plugins/daterangepicker/daterangepicker.js')}}"></script>
<script src="{{asset('public/admin/plugins/datepicker/bootstrap-datepicker.js')}}"></script>
<script src="{{asset('public/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<script src="{{asset('public/admin/plugins/fastclick/fastclick.js')}}"></script>
<script src="{{asset('public/admin/js/app.min.js')}}"></script>
<script src="{{asset('public/admin/js/pages/dashboard.js')}}"></script>
<script src="{{asset('public/admin/js/main.js')}}"></script>

@section('FooterSection')

@show

</body>
</html>
