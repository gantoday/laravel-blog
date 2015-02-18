@extends('home.layout')

@section('content')

	<h1>{{ $article->title }}</h1> 
	<a href='/articles/{{ $article->id }}/edit'>Edit</a> <a href='/articles/{{ $article->id }}/destroy'>Delete</a>
	<hr/>

	<h3>
		Category:{{ $article->category->name }} | 
		@unless($article->tags->isEmpty())
			Tags: 
			@foreach($article->tags as $tag)
				{{ $tag->name }}
			@endforeach
		@endunless
		| Click: {{ $article->click }}
	</h3>
	<div class="body">{!! $article->body_html !!}</div>
@stop