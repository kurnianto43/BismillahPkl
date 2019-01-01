<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Data Tables</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link href="{{ asset('../../bower_components/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('../../bower_components/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
  <link href="{{ asset('../../bower_components/Ionicons/css/ionicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('../../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('../../dist/css/AdminLTE.min.css') }}" rel="stylesheet">
  <link href="{{ asset('../../dist/css/skins/_all-skins.min.css') }}" rel="stylesheet">
  <link href="{{ asset('bower_components/morris.js/morris.css') }}" rel="stylesheet">
  <link href="{{ asset('bower_components/jvectormap/jquery-jvectormap.css') }}" rel="stylesheet">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  @include('layouts.header2')
  <!-- Left side column. contains the logo and sidebar -->
  @include('layouts.sidebar2')
  <!-- /.control-sidebar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  @yield('content')
  </div>
  <!-- /.content-wrapper -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<!-- Morris.js charts -->
<script src="{{ asset('bower_components/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('bower_components/morris.js/morris.min.js') }}"></script>
<script src="{{ asset('bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
<script src="{{ asset('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<script src="{{ asset('bower_components/jquery-knob/dist/jquery.knob.min.js') }}"></script>
<script src="{{ asset('bower_components/moment/min/moment.min.js') }}"></script>
<script src="{{ asset('../../bower_components/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('../../bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('../../bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('../../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('../../bower_components/fastclick/lib/fastclick.js') }}"></script>
<script src="{{ asset('../../dist/js/adminlte.min.js') }}"></script>
<script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>
<script src="{{ asset('../../dist/js/demo.js') }}"></script>

<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</body>
</html>
