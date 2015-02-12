<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="/css/all.css">
</head>
<body>
	@include('partials.nav')

	<div class="container">

		@include('flash::message')

		@yield('content')

	</div>

	
	<script src="/js/all.js"></script>

	@yield('footer')
	
	<script>
		$('div.alert').not('.alert-imoprtant').delay(3000).slideUp(300);
	</script>
</body>
</html>