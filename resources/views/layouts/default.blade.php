<!DOCTYPE html>
<html>
	<head>
	  	<meta charset="utf-8">
	  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	  	<title>@yield('title')</title>
	  	<!-- Tell the browser to be responsive to screen width -->
	  	<meta name="viewport" content="width=device-width, initial-scale=1">
	  	<!-- Font Awesome -->
	  	<link rel="stylesheet" href="{{ asset('adminlte') }}/plugins/fontawesome-free/css/all.min.css">
	  	<!-- Ionicons -->
	  	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	  	<!-- Tempusdominus Bbootstrap 4 -->
	  	<link rel="stylesheet" href="{{ asset('adminlte') }}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
	  	<!-- iCheck -->
	  	<link rel="stylesheet" href="{{ asset('adminlte') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	  	<!-- JQVMap -->
	  	<link rel="stylesheet" href="{{ asset('adminlte') }}/plugins/jqvmap/jqvmap.min.css">
	  	<!-- Theme style -->
	  	<link rel="stylesheet" href="{{ asset('adminlte') }}/dist/css/adminlte.min.css">
	  	<!-- overlayScrollbars -->
	  	<link rel="stylesheet" href="{{ asset('adminlte') }}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
	  	<!-- Daterange picker -->
	  	<link rel="stylesheet" href="{{ asset('adminlte') }}/plugins/daterangepicker/daterangepicker.css">
	  	<!-- summernote -->
	  	<link rel="stylesheet" href="{{ asset('adminlte') }}/plugins/summernote/summernote-bs4.css">
	  	<!-- Google Font: Source Sans Pro -->
	  	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	  	<!-- DataTables -->
	  	<link rel="stylesheet" href="{{ asset('adminlte') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
	  	<link rel="stylesheet" href="{{ asset('adminlte') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
	  	<style type="text/css">
	  		.sidebar-dark-orange .nav-sidebar>.nav-item>.nav-link.active, .sidebar-light-orange .nav-sidebar>.nav-item>.nav-link.active {
			    background-color: #ffa65ca3;
			    color: #1f2d3d;
			}
			@media (min-width: 768px){
				body:not(.sidebar-mini-md) .content-wrapper, body:not(.sidebar-mini-md) .main-footer, body:not(.sidebar-mini-md) .main-header {
					margin-left:0px;
				}
				.konten{
					margin-left: 250px !important;
				}
			}
			@media (max-width: 991.98px){
				body:not(.sidebar-mini-md) .content-wrapper, body:not(.sidebar-mini-md) .content-wrapper::before, body:not(.sidebar-mini-md) .main-footer, body:not(.sidebar-mini-md) .main-footer::before, body:not(.sidebar-mini-md) .main-header, body:not(.sidebar-mini-md) .main-header::before {
				    margin-left: 0;
				}
				.konten{
					margin-left: 0;
					min-height: 405px;
				}
			}
			.layout-fixed .main-sidebar {
			    position: absolute;	
			    height: max-content;
			}
			:not(.layout-fixed) .main-sidebar {
			    height: inherit;
			    min-height: max-content;
		    }
		    .card-header{
		    	background-color: #0714af !important;
		    	color: white;
		    }
	  	</style>
	</head>
	<body class="hold-transition sidebar-mini layout-fixed">
		<div class="wrapper">
			<nav style="margin-top: 10px;">
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-1">
							<img src="{{ asset('assets/images/logo.png') }}" style="width: 70px;margin-left: 20px;">
						</div>
						<div class="col-md-8">
							<h3>
								SISTEM SIMULASI AKREDITASI
							</h3>
							<p><i>Institut Teknologi Sumatera</i></p>
						</div>
					</div>
				</div>
				
				
			</nav>
	  		<!-- Navbar -->
	  		<nav class="main-header navbar navbar-expand navbar-white navbar-light" style="background:#c0a143;">
	    		@include('layouts.partials.topNavbar')
	  		</nav>
	  		<!-- /.navbar -->

	  		<!-- Main Sidebar Container -->
	  		<aside class="main-sidebar sidebar-light-orange elevation-4" style="top:157px;">
	    		@include('layouts.partials.sidebars')
	  		</aside>

	  		<!-- Content Wrapper. Contains page content -->
	  		<div class="content-wrapper konten">
	    		@yield('content')
	  		</div>
	  		<!-- /.content-wrapper -->
		  	<footer class="main-footer" style="background:black;text-align: center;">
		    	<strong>INSTITUT TEKNOLOGI SUMATERA</strong>
		    	
		  	</footer>

		  	<!-- Control Sidebar -->
		  	<aside class="control-sidebar control-sidebar-dark">
		    	<!-- Control sidebar content goes here -->
		  	</aside>
		  	<!-- /.control-sidebar -->
		</div>
		<!-- ./wrapper -->

		<!-- jQuery -->
		<script src="{{ asset('adminlte') }}/plugins/jquery/jquery.min.js"></script>
		<!-- jQuery UI 1.11.4 -->
		<script src="{{ asset('adminlte') }}/plugins/jquery-ui/jquery-ui.min.js"></script>
		<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
		<script>
		  $.widget.bridge('uibutton', $.ui.button)
		</script>
		<!-- Bootstrap 4 -->
		<script src="{{ asset('adminlte') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
		<!-- DataTables -->
		<script src="{{ asset('adminlte') }}/plugins/datatables/jquery.dataTables.min.js"></script>
		<script src="{{ asset('adminlte') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
		<script src="{{ asset('adminlte') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
		<script src="{{ asset('adminlte') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
		<!-- ChartJS -->
		<script src="{{ asset('adminlte') }}/plugins/chart.js/Chart.min.js"></script>
		<!-- Sparkline -->
		<script src="{{ asset('adminlte') }}/plugins/sparklines/sparkline.js"></script>
		<!-- JQVMap -->
		<script src="{{ asset('adminlte') }}/plugins/jqvmap/jquery.vmap.min.js"></script>
		<script src="{{ asset('adminlte') }}/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
		<!-- jQuery Knob Chart -->
		<script src="{{ asset('adminlte') }}/plugins/jquery-knob/jquery.knob.min.js"></script>
		<!-- daterangepicker -->
		<script src="{{ asset('adminlte') }}/plugins/moment/moment.min.js"></script>
		<script src="{{ asset('adminlte') }}/plugins/daterangepicker/daterangepicker.js"></script>
		<!-- Tempusdominus Bootstrap 4 -->
		<script src="{{ asset('adminlte') }}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
		<!-- Summernote -->
		<script src="{{ asset('adminlte') }}/plugins/summernote/summernote-bs4.min.js"></script>
		<!-- overlayScrollbars -->
		<script src="{{ asset('adminlte') }}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
		<!-- AdminLTE App -->
		<script src="{{ asset('adminlte') }}/dist/js/adminlte.js"></script>
		<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
		<script src="{{ asset('adminlte') }}/dist/js/pages/dashboard.js"></script>
		<!-- AdminLTE for demo purposes -->
		<script src="{{ asset('adminlte') }}/dist/js/demo.js"></script>
		<script>
		  $(function () {
		    $("#example1").DataTable({
		      "responsive": true,
		      "autoWidth": false,
		    });
		    $('#example2').DataTable({
		      "paging": true,
		      "lengthChange": false,
		      "searching": false,
		      "ordering": true,
		      "info": true,
		      "autoWidth": false,
		      "responsive": true,
		    });
		  });
		</script>
	</body>
</html>
