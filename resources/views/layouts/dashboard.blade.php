<!doctype html>
<html class="fixed has-top-menu">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">

		<title>Dashboard</title>
		<!-- <meta name="keywords" content="HTML5 Admin Template" />
		<meta name="description" content="Porto Admin - Responsive HTML5 Template">
		<meta name="author" content="okler.net"> -->

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		

		<!-- Web Fonts  -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="{{ asset('template_admin/assets/vendor/bootstrap/css/bootstrap.css') }}" />

		<link rel="stylesheet" href="{{ asset('template_admin/assets/vendor/font-awesome/css/font-awesome.css') }}" />
		<link rel="stylesheet" href="{{ asset('template_admin/assets/vendor/magnific-popup/magnific-popup.css') }}" />
		<link rel="stylesheet" href="{{ asset('template_admin/assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css') }}" />

		<!-- Specific Page Vendor CSS -->
		<link rel="stylesheet" href="{{ asset('template_admin/assets/vendor/jquery-ui/jquery-ui.css') }}" />
		<link rel="stylesheet" href="{{ asset('template_admin/assets/vendor/jquery-ui/jquery-ui.theme.css') }}" />
		<link rel="stylesheet" href="{{ asset('template_admin/assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css') }}" />
		<link rel="stylesheet" href="{{ asset('template_admin/assets/vendor/morris.js/morris.css') }}" />

		<!-- Theme CSS -->
		<link rel="stylesheet" href="{{ asset('template_admin/assets/stylesheets/theme.css') }}" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="{{ asset('template_admin/assets/stylesheets/skins/default.css') }}" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="{{ asset('template_admin/assets/stylesheets/theme-custom.css') }}">

		<!-- Head Libs -->
		<script src="{{ asset('template_admin/assets/vendor/modernizr/modernizr.js') }}"></script>

		<!-- Datatable -->
		<link rel="stylesheet" href="{{ asset('template_admin/assets/vendor/jquery-datatables-bs3/assets/css/datatables.css') }}" />

		<script src="{{ asset('template_admin/assets/vendor/jquery/jquery.js') }}"></script>

		<link rel="stylesheet" href="{{ asset('template_admin/assets/vendor/bootstrap-fileupload/bootstrap-fileupload.min.css') }}" />

		<link rel="stylesheet" href="{{ asset('template_admin/assets/vendor/summernote/summernote.css') }}" />

	</head>
	<body>
		<section class="body">

			<!-- start: header -->
			<header class="header header-nav-menu">
				<div class="logo-container">
					<button class="btn header-btn-collapse-nav hidden-md hidden-lg" data-toggle="collapse" data-target=".header-nav">
						<i class="fa fa-bars"></i>
					</button>

					
					<!-- end: header nav menu -->
				</div>
			
				<!-- start: search & user box -->
				<div class="header-right">

					<div class="header-nav collapse">
						<div class="header-nav-main header-nav-main-effect-1 header-nav-main-sub-effect-1">
							<nav>
								<ul class="nav nav-pills" id="mainNav">
									<li class="">
									    <a href="{{ url('Dashboard')}}">
									        Dashboard
									    </a>    
									</li>
									<li class="">
									    <a href="{{ url('Skenario')}}">
									        Skenario
									    </a>    
									</li>
									<li class="">
									    <a href="{{ url('Users')}}">
									        Pengguna
									    </a>    
									</li>
									<li class="">
									    <a href="{{ url('/logout') }}">
									        {{ Session::get('email') }} | Logout
									    </a>    
									</li>
								</ul>
							</nav>
						</div>
					</div>
				</div>
				<!-- end: search & user box -->
			</header>
			<!-- end: header -->

			<div class="inner-wrapper">
				<section role="main" class="content-body">
					<header class="page-header">
						@yield('titleheadercontent')
						<div class="right-wrapper pull-right">
							@yield('headercontent')
							&nbsp;&nbsp;&nbsp;	
						</div>					
					</header>
					@yield('content')
				</section>
			</div>

		</section>

		<!-- Vendor -->
		
		<script src="{{ asset('template_admin/assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js') }}"></script>
		<script src="{{ asset('template_admin/assets/vendor/bootstrap/js/bootstrap.js') }}"></script>
		<script src="{{ asset('template_admin/assets/vendor/nanoscroller/nanoscroller.js') }}"></script>
		<script src="{{ asset('template_admin/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
		<script src="{{ asset('template_admin/assets/vendor/magnific-popup/jquery.magnific-popup.js') }}"></script>
		<script src="{{ asset('template_admin/assets/vendor/jquery-placeholder/jquery-placeholder.js') }}"></script>
		
		<!-- Specific Page Vendor -->
		<script src="{{ asset('template_admin/assets/vendor/jquery-ui/jquery-ui.js') }}"></script>
		<script src="{{ asset('template_admin/assets/vendor/jqueryui-touch-punch/jqueryui-touch-punch.js') }}"></script>
		<script src="{{ asset('template_admin/assets/vendor/jquery-appear/jquery-appear.js') }}"></script>
		<script src="{{ asset('template_admin/assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js') }}"></script>
		<script src="{{ asset('template_admin/assets/vendor/jquery.easy-pie-chart/jquery.easy-pie-chart.js') }}"></script>
		<script src="{{ asset('template_admin/assets/vendor/jquery-sparkline/jquery-sparkline.js') }}"></script>
		<script src="{{ asset('template_admin/assets/vendor/raphael/raphael.js') }}"></script>
		<script src="{{ asset('template_admin/assets/vendor/morris.js/morris.js') }}"></script>
		<script src="{{ asset('template_admin/assets/vendor/gauge/gauge.js') }}"></script>
		<script src="{{ asset('template_admin/assets/vendor/snap.svg/snap.svg.js') }}"></script>
		<script src="{{ asset('template_admin/assets/vendor/liquid-meter/liquid.meter.js') }}"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="{{ asset('template_admin/assets/javascripts/theme.js') }}"></script>
		
		<!-- Theme Custom -->
		<script src="{{ asset('template_admin/assets/javascripts/theme.custom.js') }}"></script>
		
		<!-- Theme Initialization Files -->
		<script src="{{ asset('template_admin/assets/javascripts/theme.init.js') }}"></script>

		<!-- Examples -->
		<script src="{{ asset('template_admin/assets/javascripts/layouts/examples.header.menu.js') }}"></script>
		<script src="{{ asset('template_admin/assets/javascripts/dashboard/examples.dashboard.js') }}"></script>

		<script src="{{ asset('template_admin/assets/vendor/jquery-datatables/media/js/jquery.dataTables.js') }}"></script>
		<script src="{{ asset('template_admin/assets/vendor/jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js') }}"></script>
		<script src="{{ asset('template_admin/assets/vendor/jquery-datatables-bs3/assets/js/datatables.js') }}"></script>

		<!-- Specific Page Vendor -->
		<script src="{{ asset('template_admin/assets/vendor/autosize/autosize.js') }}"></script>
		<script src="{{ asset('template_admin/assets/vendor/bootstrap-fileupload/bootstrap-fileupload.min.js') }}"></script>

		<script src="{{ asset('template_admin/assets/vendor/summernote/summernote.js') }}"></script>

		<!-- Examples -->
		<script src="{{ asset('template_admin/assets/javascripts/ui-elements/examples.modals.js') }}"></script>

		<script type="text/javascript">
			$(document).ready(function() {
			    $('#MenuTable').DataTable({
			    	"ordering": false
			    });
			    $('#MenuTable1').DataTable();
			} );
		</script>

		<script>
	        $(document).ready(function() {
	            $('.summernote').summernote({
	            	height: 300,
  					focus: true,
  					toolbar: [
					    ['style', ['bold', 'italic', 'underline', 'clear']],
					    ['font', ['strikethrough', 'superscript', 'subscript']],
					    ['fontsize', ['fontsize']],
					    ['color', ['color']],
					    ['para', ['ul', 'ol', 'paragraph','style','height']],
					    ['Insert', ['picture','link','video','table','hr']],
					    ['Fontstyle',['fontname','forecolor','backcolor']]
				  	]
	            });
	        });
		</script>

	</body>
</html>