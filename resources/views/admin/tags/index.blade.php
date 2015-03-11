@extends('admin.layout')

@section('content')
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Tags</h1>
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
	<div class="col-lg-12">
		<div class="dataTable_wrapper">
			<table class="table table-striped table-hover" id="dataTables-example">
				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
						<th>Slug</th>
						<th>Articles</th>
						<th>Created_at</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
				@foreach($tags as $tag)
					<tr>
						<td>{{ $tag->id }}</td>
						<td>{{ $tag->name }}</td>
						<td>{{ $tag->slug }}</td>
						<td>{{ $tag->articles()->count() }}</td>
						<td>{{ $tag->created_at }}</td>
						<td>
							{!! Form::open(['method' => 'get', 'url' => 'admin/tags/'.$tag->id.'/edit', 'style' => 'float:left;margin-right: 10px;']) !!}
								<button type="submit" class="btn btn-success btn-sm iframe cboxElement"><span class="glyphicon glyphicon-pencil"></span> Edite</button>
							{!! Form::close() !!}

							{!! Form::open(['method' => 'delete', 'url' => 'admin/tags/'.$tag->id, 'style' => 'float:left;margin-right: 10px;']) !!}
								<button type="submit" class="btn btn-sm btn-danger iframe cboxElement"><span class="glyphicon glyphicon-trash"></span> Delete</button>
							{!! Form::close() !!}
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
		<div class="row">
			<div class="col-sm-6">
				<div class="dataTables_info" id="dataTables-example_info" role="status" aria-live="polite">
					每页{{ $tags->count() }}条,共{{ $tags->lastPage() }}页,总{{ $tags->total() }}条.
				</div>
			</div>
			<div class="col-sm-6">
				<div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate">
					{!! $tags->render() !!}
				</div>
			</div>
		</div>
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
@endsection
