@extends('admin.layout')

@section('content')

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Site Settings</h1>
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
	<div class="col-lg-12">
		<div class="row">
			<div class="col-lg-8">
				{!! Form::model($settings,['method'=>'PATCH','url' => 'admin/settings/index']) !!}
					@include('admin.settings.form')
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
