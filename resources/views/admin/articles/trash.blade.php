@extends('admin.layout')

@section('content')
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Articles Trash</h1>
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
						<th>Title</th>
						<th>Category</th>
						<th>Tags</th>
						<th>Click</th>
						<th>Deleted_at</th>
						<th>Created_at</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
				@foreach($articles as $article)
					<tr>
						<td>{{ $article->id }}</td>
						<td>{{ $article->title }}</td>
						<td>{{ $article->category->name }}</td>
						<td>@foreach($article->tags as $tag){{ $tag->name }} @endforeach  </td>
						<td>{{ $article->click }}</td>
						<td>{{ $article->deleted_at }}</td>
						<td>{{ $article->created_at }}</td>
						<td>
							{!! Form::open(['method' => 'post', 'url' => 'admin/articles/restore/'.$article->id, 'style' => 'float:left;margin-right: 10px;']) !!}
								<button type="submit" class="btn btn-success btn-sm iframe cboxElement"><span class="fa fa-undo fa-fw"></span> Restore</button>
							{!! Form::close() !!}

							{!! Form::open(['method' => 'delete', 'url' => ['admin/articles/forceDelete',$article->id], 'style' => 'float:left;margin-right: 10px;']) !!}
								<button type="submit" class="btn btn-sm btn-danger iframe cboxElement"><span class="glyphicon glyphicon-trash"></span> Destroy</button>
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
					每页{{ $articles->count() }}条,共{{ $articles->lastPage() }}页,总{{ $articles->total() }}条.
				</div>
			</div>
			<div class="col-sm-6">
				<div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate">
					{!! $articles->render() !!}
				</div>
			</div>
		</div>
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
@endsection
