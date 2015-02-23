<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="@yield('description', setting('site_description'))">
	<meta name="author" content="ganto">

	<title>@yield('title', setting('site_name'))</title>
	
	@include('home.partials.header')

</head>

<body>

	@include('home.partials.nav')

	<div class="container">

		<div class="blog-header">
			<h1 class="blog-title">{{ setting('site_name') }}</h1>
			<p class="lead blog-description">{{ setting('site_description') }}</p>
		</div>

		<div class="row">

			@yield('content')

			@include('home.partials.sidebar')

		</div><!-- /.row -->

	</div><!-- /.container -->

	<footer class="blog-footer">
		<p> <a href="http://www.90door.com">DaShuai's Blog</a> Based On Laravel5 and Bootstrap3.</p>
		<p>
			<a href="#">Back to top</a>
		</p>
	</footer>

	@include('home.partials.footer')

</body>
</html>
