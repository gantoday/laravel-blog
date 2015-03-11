<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="@yield('description', setting('site_description'))">
	<meta name="author" content="ganto">

	<title>@yield('title', setting('site_name'))</title>

	<link rel="stylesheet" href="{{ cdn(elixir("css/all.css")) }}">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	  <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->

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
		<p><a href="http://www.90door.com/">DaShuai's Blog</a> Based On Laravel5 and Bootstrap3.</p>
		@if(setting('bei_an') != '')
			<p>{!! setting('bei_an').' '.setting('tong_ji') !!}</p>
		@endif
		<p><a href="#">Back to top</a></p>
	</footer>

	<script src="{{ cdn(elixir("js/all.js")) }}"></script>

	<script>
		$('.blog-post img').addClass('carousel-inner img-responsive img-rounded');
		$(document).ready(function() {
			$('pre code').each(function(i, block) {
				hljs.highlightBlock(block);
			});
		});
	</script>

</body>
</html>
