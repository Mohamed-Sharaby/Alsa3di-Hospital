<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>404</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="{{asset('default')}}/assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="{{asset('default')}}/assets/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="{{asset('default')}}/assets/css/core.css" rel="stylesheet" type="text/css">
	<link href="{{asset('default')}}/assets/css/components.css" rel="stylesheet" type="text/css">
	<link href="{{asset('default')}}/assets/css/colors.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script type="text/javascript" src="{{asset('default')}}/assets/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="{{asset('default')}}/assets/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="{{asset('default')}}/assets/js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="{{asset('default')}}/assets/js/plugins/loaders/blockui.min.js"></script>
	<!-- /core JS files -->


	<!-- Theme JS files -->
	<script type="text/javascript" src="{{asset('default')}}/assets/js/core/app.js"></script>
	<!-- /theme JS files -->

</head>

<body class="login-container">

	<!-- Main navbar -->
	<div class="navbar navbar-inverse">
		<div class="navbar-header">
			<a class="navbar-brand" href="index.html"><img src="{{asset('default')}}/assets/images/logo_light.png" alt=""></a>

			<ul class="nav navbar-nav pull-right visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
			</ul>
		</div>

		<div class="navbar-collapse collapse" id="navbar-mobile">
		

			<ul class="nav navbar-nav navbar-right">
				
				<li class="dropdown dropdown-user">
					<a class="dropdown-toggle" data-toggle="dropdown">
						<img src="assets/images/placeholder.jpg" alt="">
						<span>{{ auth()->check() ? auth()->user()->name : 'Visitor' }}</span>
						<i class="caret"></i>
					</a>

					@if(auth()->check())
					<ul class="dropdown-menu dropdown-menu-right">

						<!-- <li class="divider"></li> -->
						<li><a href="{{ route('admin.logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"><i class="icon-switch2"></i> خروج</a></li>
						<form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
					</ul>
					@endif
				</li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->


	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Content area -->
				<div class="content">

					<!-- Error title -->
					<div class="text-center content-group">
						<h1 class="error-title">404</h1>
						<h5>
							هذه الصفحة غير موجودة
						</h5>
					</div>
					<!-- /error title -->


					<!-- Error content -->
					<div class="row">
						<div class="col-lg-4 col-lg-offset-4 col-sm-6 col-sm-offset-3">
							<form action="#" class="main-search">
								<div class="input-group content-group">
									<input type="text" class="form-control input-lg" placeholder="Search">

									<!-- <div class="input-group-btn">
										<button type="submit" class="btn bg-slate-600 btn-icon btn-lg"><i class="icon-search4"></i></button>
									</div> -->
								</div>

								<div class="row">
									<div class="col-sm-6">
										<a href="{{ url('/') }}" class="btn btn-primary btn-block content-group"><i class="icon-circle-left2 position-left"></i> إذهب للرئيسية</a>
									</div>

									<!-- <div class="col-sm-6">
										<a href="#" class="btn btn-default btn-block content-group"><i class="icon-menu7 position-left"></i> Advanced search</a>
									</div> -->
								</div>
							</form>
						</div>
					</div>
					<!-- /error wrapper -->


					

				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->

</body>
</html>
