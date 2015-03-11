@extends('home.layout')

@section('title'){{ setting('site_name').' | '.setting('site_description') }}@stop

@section('content')
<div class="col-sm-8 blog-main">
	@foreach($articles as $article)
		<div class="blog-post">
			<h2 class="blog-post-title"><a href="/{{ $article->slug }}">{{ $article->title }}</a></h2>
			<div class="blog-post-meta">posted in <a href="/categories/{{ $article->category->slug }}">{{ $article->category->name }}</a> and tagged
			@foreach($article->tags as $key => $tag)
				<a href="/tags/{{ $tag->slug }}">{{ $tag->name }}</a>
			@endforeach
			about {{ $article->created_at->diffForHumans() }}.</div>
			{!! str_limit($article->body_html, $limit = 500, $end = '...') !!}
		</div><!-- /.blog-post -->
		<hr>
	@endforeach


	<a class="btn btn-primary pull-right" href="/articles/?page=2">More Articles</a>

</div><!-- /.blog-main -->
@stop
