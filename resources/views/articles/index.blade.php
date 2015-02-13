@extends('layout')

@section('content')
	<h1>Aritcles</h1>
	<hr/>
	
	@foreach($articles as $article)
		<h2>
			<a href="{{ action('ArticlesController@show',[$article->id]) }}">{{ $article->title }}</a>
		</h2>
		<h4>
			Category:{{ $article->category->name }} | 

			@unless($article->tags->isEmpty())
				Tags: 
				@foreach($article->tags as $tag)
					{{ $tag->name }}
				@endforeach
			@endunless
		</h4>
		<div class="body">{{ $article->body }}</div>
	@endforeach
@stop

