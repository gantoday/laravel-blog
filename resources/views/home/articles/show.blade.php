@extends('home.layout')

@section('title'){{ $article->title.' | '.setting('site_name') }}@stop

@section('description'){{ setting('site_name').' | '.description_trim($article->body_html) }}@stop

@section('content')
<div class="col-sm-8 blog-main">
	<div class="blog-post">
		<h2 class="blog-post-title">{{ $article->title }}</h2>
		<div class="blog-post-meta">posted in <a href="/categories/{{ $article->category->slug }}">{{ $article->category->name }}</a> and tagged
		@foreach($article->tags as $key => $tag)
			<a href="/tags/{{ $tag->slug }}">{{ $tag->name }}</a>
		@endforeach
		about {{ $article->created_at->diffForHumans() }}.</div>
		{!! $article->body_html !!}
		@unless(is_null($article->original) || empty($article->original))
			<p>参考来源:<br>{{ $article->original }}</p>
		@endunless
		<p>本文链接:<br>{{ setting('site_url').$article->slug }}</p>
	</div><!-- /.blog-post -->
	<hr>

	<!-- 多说评论框 start -->
	<div class="ds-thread" data-thread-key="{{ $article->slug }}" data-title="{{ $article->title }}" data-url="{{ setting('site_url').$article->slug }}"></div>
	<!-- 多说评论框 end -->
	<!-- 多说公共JS代码 start (一个网页只需插入一次) -->
	<script type="text/javascript">
	var duoshuoQuery = {short_name:"90door"};
		(function() {
			var ds = document.createElement('script');
			ds.type = 'text/javascript';ds.async = true;
			ds.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') + '//static.duoshuo.com/embed.unstable.js';
			ds.charset = 'UTF-8';
			(document.getElementsByTagName('head')[0]
			 || document.getElementsByTagName('body')[0]).appendChild(ds);
		})();
		</script>
	<!-- 多说公共JS代码 end -->


</div><!-- /.blog-main -->
@stop
