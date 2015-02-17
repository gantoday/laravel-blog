@extends('home.layout')

@section('content')
	<h1>Create New Aritcles</h1>
	<hr/>
    {!! Form::open(['url' => 'articles']) !!}
        @include('home.articles.partials.form',['submitButtonText'=>'Add Article'])
    {!! Form::close() !!}
    
    @include('errors.list')

@stop