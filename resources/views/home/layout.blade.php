<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="/assets/home/all.css">
	@yield('header')
</head>
<body>
	@include('home.partials.nav')

	<div class="container">
		<div class="row">
			@include('flash::message')

			@yield('content')
		</div>
	</div>

	
	<script src="/assets/home/all.js"></script>

	@yield('footer')
	
	<script>
		$('div.alert').not('.alert-imoprtant').delay(3000).slideUp(300);
	</script>
</body>
</html>