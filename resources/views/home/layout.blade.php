<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Blog Template for Bootstrap</title>
	
	@include('home.partials.header')

</head>

<body>

	@include('home.partials.nav')

	<div class="container">

		<div class="blog-header">
			<h1 class="blog-title">The Bootstrap Blog</h1>
			<p class="lead blog-description">The official example template of creating a blog with Bootstrap.</p>
		</div>

		<div class="row">

			@yield('content')

			@include('home.partials.sidebar')

		</div><!-- /.row -->

	</div><!-- /.container -->

	<footer class="blog-footer">
		<p>Blog template built for <a href="http://getbootstrap.com">Bootstrap</a> by <a href="https://twitter.com/mdo">@mdo</a>.</p>
		<p>
			<a href="#">Back to top</a>
		</p>
	</footer>

	@include('home.partials.footer')

</body>
</html>
