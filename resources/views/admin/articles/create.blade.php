@extends('admin.layout')

@section('content')

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Add Articles</h1>
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
	<div class="col-lg-12">
		<div class="row">
			<div class="col-lg-8">
				{!! Form::open(['url' => 'admin/articles']) !!}
					@include('admin.articles.form',['submitButtonText'=>'Add Article', 'form_date'=>date('Y-m-d')])
				{!! Form::close() !!}
			</div>
			<!-- /.col-lg-6 (nested) -->
		</div>
		<!-- /.row (nested) -->
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
@stop
