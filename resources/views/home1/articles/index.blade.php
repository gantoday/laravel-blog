@extends('home.layout')

@section('content')
	<h1>Aritcles</h1>
	<hr/>
	
	@foreach($articles as $article)
		<h2>
			<a href="/articles/{{ $article->slug }}">{{ $article->title }}</a>
		</h2>
		<h4>
			Category:{{ $article->category->name }} | 
			Tags: 
			@foreach($article->tags as $tag)
				{{ $tag->name }}
			@endforeach | 
			Click: {{ $article->click }}
		</h4>
		<div class="body">{{ $article->body }}</div>
	@endforeach
	{!! $articles->render() !!}
@stop

