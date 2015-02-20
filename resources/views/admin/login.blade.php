<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Please Sign In</title>

	@include('admin.partials.header')

</head>

<body>

	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="login-panel panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Please Sign In</h3>
					</div>
					<div class="panel-body">
						@if (count($errors) > 0)
							<div class="alert alert-danger">
								<strong>Whoops!</strong> There were some problems with your input.<br><br>
								<ul>
									@foreach ($errors->all() as $error)
										<li>{{ $error }}</li>
									@endforeach
								</ul>
							</div>
						@endif
						{!! Form::open(['url' => '/login', 'role' => 'from', 'method' => 'post']) !!}
							<fieldset>
								<div class="form-group">
									{!! Form::email('email', null, ['class' => 'form-control', 'autofocus' => 'autofocus']) !!}
								</div>
								<div class="form-group">
									{!! Form::password('password', ['class' => 'form-control']) !!}
								</div>
								<div class="checkbox">
									<label>
									{!! Form::checkbox('remember', null) !!}Remember Me
									</label>
								</div>
								<div class="form-group">
									{!! Form::submit('Login', ['class' => 'btn btn-lg btn-success btn-block']) !!}
								</div>
							</fieldset>
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>

	@include('admin.partials.footer')

</body>

</html>
