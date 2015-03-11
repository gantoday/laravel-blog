<div class="form-group">
	{!! Form::label('name', 'Name:') !!}
	{!! Form::text('name', null, ['class' => 'form-control', 'autofocus' => 'autofocus']) !!}
</div>

<div class="form-group">
	{!! Form::label('slug', 'Slug:') !!}
	{!! Form::text('slug', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('parent_id', 'Parent:') !!}
	{!! Form::select('parent_id', $categories, null, ['id' => 'parent_id', 'class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>

@section('header')
	<link rel="stylesheet" href="/admin-assets/css/select2.min.css">
@endsection

@section('footer')
	<script src="/admin-assets/js/select2.min.js"></script>
	<script>
		$('#parent_id').select2();
	</script>
@endsection
