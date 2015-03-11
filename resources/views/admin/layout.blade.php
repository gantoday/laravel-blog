<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>{{ $title or setting('site_name').'-管理面板' }}</title>

	@include('admin.partials.header')
	@yield('header')

</head>

<body>

	<div id="wrapper">

		<!-- Navigation -->
		<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">

			@include('admin.partials.navbar')

			@include('admin.partials.sidebar')

		</nav>

		<div id="page-wrapper">

			@include('flash::message')

			@yield('content')

			<div class="row">
				<div class="col-lg-8">
					@include('errors.list')
				</div>
			</div>
		</div>
		<!-- /#page-wrapper -->

	</div>
	<!-- /#wrapper -->

	@include('admin.partials.footer')
	@yield('footer')
</body>

</html>
