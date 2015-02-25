@foreach($settings as $setting)
	<div class="form-group">
		{!! Form::label($setting->name, $setting->description.'：') !!}
		{!! Form::text($setting->name, $setting->value, ['class' => 'form-control']) !!}
	</div>
@endforeach

<div class="form-group">
	{!! Form::submit('Update Settings', ['class' => 'btn btn-primary form-control']) !!}
</div>
