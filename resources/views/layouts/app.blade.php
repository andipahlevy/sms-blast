<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts 
    <script src="{{ asset('js/app.js') }}" defer></script>
	-->
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    
	<!-- 
	<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
	-->

    <!-- Styles 
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
	-->
	
	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="{{ asset('limitless/css/icons/icomoon/styles.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('limitless/css/minified/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('limitless/css/minified/core.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('limitless/css/minified/components.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('limitless/css/minified/colors.min.css') }}" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script type="text/javascript" src="{{ asset('limitless/js/plugins/loaders/pace.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('limitless/js/core/libraries/jquery.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('limitless/js/core/libraries/bootstrap.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('limitless/js/plugins/loaders/blockui.min.js') }}"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script type="text/javascript" src="{{ asset('limitless/js/plugins/visualization/d3/d3.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('limitless/js/plugins/visualization/d3/d3_tooltip.js') }}"></script>
	<script type="text/javascript" src="{{ asset('limitless/js/plugins/forms/styling/switchery.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('limitless/js/plugins/forms/styling/uniform.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('limitless/js/plugins/forms/selects/bootstrap_multiselect.js') }}"></script>
	<script type="text/javascript" src="{{ asset('limitless/js/plugins/ui/moment/moment.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('limitless/js/plugins/pickers/daterangepicker.js') }}"></script>
	<script type="text/javascript" src="{{ asset('limitless/js/plugins/ui/headroom/headroom.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('limitless/js/plugins/ui/headroom/headroom_jquery.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('limitless/js/plugins/ui/nicescroll.min.js') }}"></script>

	<script type="text/javascript" src="{{ asset('limitless/js/core/app.js') }}"></script>
	<script type="text/javascript" src="{{ asset('limitless/js/pages/layout_fixed_custom.js') }}"></script>
	<script type="text/javascript" src="{{ asset('limitless/js/pages/layout_navbar_hideable_sidebar.js') }}"></script>
	<!-- /theme JS files -->
	
	@yield('theme_js')
	
</head>
<body class="navbar-top">
	<!-- Main navbar -->
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="navbar-header">
			<a class="navbar-brand" href="{{ route('home') }}">
				SMS BLAST
			</a>

			<ul class="nav navbar-nav visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
				<li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
			</ul>
		</div>

		<div class="navbar-collapse collapse" id="navbar-mobile">
			<ul class="nav navbar-nav navbar-right">
				@guest
				<li>
					<a href="#">
						<i class="icon-display4"></i> <span class="visible-xs-inline-block position-right"> Go to website</span>
					</a>
				</li>

				@else
				<li class="dropdown dropdown-user">
					<a class="dropdown-toggle" data-toggle="dropdown">
						<img src="{{ asset('limitless/images/placeholder.jpg') }}" alt="">
						<span>{{ Auth::user()->name }}</span>
						<i class="caret"></i>
					</a>

					<ul class="dropdown-menu dropdown-menu-right">
						<li title="Kuota kirim SMS tersisa"><a href="#"><i class="icon-coins"></i> <span id="saldoku">0</span></a></li>
						<li class="divider"></li>
						<li><a href="{{ route('logout') }}"
								onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
							>
								<i class="icon-switch2"></i> {{ __('Logout') }}</a>
						</li>
						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							@csrf
						</form>
					</ul>
				</li>
			
				@endguest
			</ul>

		</div>
	</div>
	<!-- /main navbar -->


	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">
		@guest
		
		@else
			<!-- Main sidebar -->
			<div class="sidebar sidebar-main sidebar-fixed">
				<div class="sidebar-content">

					<!-- User menu -->
					<div class="sidebar-user">
						<div class="category-content">
							<div class="media">
								<a href="#" class="media-left"><img src="{{ asset('limitless/images/placeholder.jpg') }}" class="img-circle img-sm" alt=""></a>
								<div class="media-body">
									<span class="media-heading text-semibold">{{ Auth::user()->name }}</span>
									<div class="text-size-mini text-muted">
										<i class="icon-pin text-size-small"></i> &nbsp;Makassar
									</div>
								</div>

							</div>
						</div>
					</div>
					<!-- /user menu -->


					<!-- Main navigation -->
					<div class="sidebar-category sidebar-category-visible">
						<div class="category-content no-padding">
							<ul class="navigation navigation-main navigation-accordion">

								<!-- Main -->
								<li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
								<li><a href="{{ route('home') }}"><i class="icon-home4"></i> <span>Beranda</span></a></li>
								<li><a href="{{ route('data.kelompok') }}"><i class="icon-list3"></i> <span>Kelola Kantor/Bagian & No. HP</span></a></li>
								<li class="navigation-divider"></li>
								<li><a href="{{ route('sms') }}"><i class="icon-mobile"></i> <span>Blast SMS</span></a></li>
								

							</ul>
						</div>
					</div>
					<!-- /main navigation -->

				</div>
			</div>
			<!-- /main sidebar -->
		@endguest

			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Content area -->
				<div class="content">

					@yield('content')

					<!-- Footer -->
					<div class="footer text-muted">
						&copy; 2019. <a href="#">SMS Blast</a> by <a href="http://andilevi.com" target="_blank">Videv</a>
					</div>
					<!-- /footer -->

				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->
		
		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->
	
	<script type="text/javascript">
	
	$.ajax({
		type:'get',
		url:"{{ route('nexmo.saldoku') }}",
		data:'',
		cache:false,
		success:function(rsp){
			$('#saldoku').html('Sisa '+rsp);
			if($('#kuota_info').length > 0){
				$('#kuota_info').html('Tersisa '+rsp);
			}
		}
	});
	
	</script>
	
	@yield('my_script')
</body>
</html>
