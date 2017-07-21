<!DOCTYPE html>
<html>
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>E-Comm | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  {!! Html::style('storage/admin/bootstrap/dist/css/bootstrap.min.css') !!}
  
  {!! Html::style('storage/admin/font-awesome/css/font-awesome.min.css') !!}
  
  {!! Html::style('storage/admin/Ionicons/css/ionicons.min.css') !!}
  
  {!! Html::style('storage/admin/dist/css/AdminLTE.min.css') !!}
  
  {!! Html::style('storage/admin/dist/css/skins/_all-skins.min.css') !!}
  
  {!! Html::style('storage/admin/morris.js/morris.css') !!}
  
  {!! Html::style('storage/admin/jvectormap/jquery-jvectormap.css') !!}
  
  {!! Html::style('storage/admin/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') !!}
  
  {!! Html::style('storage/admin/bootstrap-daterangepicker/daterangepicker.css') !!}
  
  {!! Html::style('storage/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') !!}

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
   @include('admin.elements.header') 
   @include('admin.elements.sidebar')
  @yield('content')
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io/">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
{!! Html::script('storage/admin/jquery/dist/jquery.min.js') !!}
{!! Html::script('storage/admin/jquery-ui/jquery-ui.min.js') !!}

<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
{!! Html::script('storage/admin/bootstrap/dist/js/bootstrap.min.js') !!}

{!! Html::script('storage/admin/raphael/raphael.min.js') !!}

{!! Html::script('storage/admin/morris.js/morris.min.js') !!}

{!! Html::script('storage/admin/jquery-sparkline/dist/jquery.sparkline.min.js') !!}

{!! Html::script('storage/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') !!}

{!! Html::script('storage/admin/jquery-jvectormap-world-mill-en.js') !!}

{!! Html::script('storage/admin/jquery-knob/dist/jquery.knob.min.js') !!}

{!! Html::script('storage/admin/moment/min/moment.min.js') !!}

{!! Html::script('storage/admin/bootstrap-daterangepicker/daterangepicker.js') !!}

{!! Html::script('storage/admin/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') !!}

{!! Html::script('storage/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') !!}

{!! Html::script('storage/admin/jquery-slimscroll/jquery.slimscroll.min.js') !!}

{!! Html::script('storage/admin/fastclick/lib/fastclick.js') !!}

{!! Html::script('storage/admin/dist/js/adminlte.min.js') !!}

{!! Html::script('storage/admin/dist/js/pages/dashboard.js') !!}
{!! Html::script('storage/admin/dist/js/demo.js') !!}

<script type="text/javascript">
  function readURL(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('.profile-user-img').attr('src', e.target.result);
            $(".user-image").attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}
$(document).ready(function(){
  $("#profile_image").change(function(){
    readURL(this);
});
});

</script>
</body>


</html>