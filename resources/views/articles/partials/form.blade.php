<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('body', 'Body:') !!}
    {!! Form::textarea('body', null, ['id' => 'editor', 'class' => 'form-control', 'placeholder' => 'Please Enter some text...',  'style' => 'overflow:hidden', 'autofocus' => 'autofocus']) !!}
</div>

<div class="form-group">
    {!! Form::label('category', 'Category:') !!}
    {!! Form::select('category_id', $categories, isset($category) ? $category : 1, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('tag_list', 'Tags:') !!}
    {!! Form::select('tag_list[]', $tags, null, ['id' => 'tag_list', 'class' => 'form-control', 'multiple']) !!}
</div>

<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>

@section('header')
    <link rel="stylesheet" type="text/css" href="/simditor/styles/font-awesome.css" /> 
    <link rel="stylesheet" type="text/css" href="/simditor/styles/simditor.css" /> 
@endsection

@section('footer')
    <script type="text/javascript" src="/simditor/scripts/module.js"></script> 
    <script type="text/javascript" src="/simditor/scripts/hotkeys.js"></script> 
    <script type="text/javascript" src="/simditor/scripts/uploader.js"></script> 
    <script type="text/javascript" src="/simditor/scripts/simditor.js"></script>

	<script>
		$('#tag_list').select2({
			placeholder: 'Choose a tag',
			tags: true
		});
        $(document).ready(function(){
            var editor = new Simditor({
                textarea: $('#editor'),
                upload: {
                    url: '/upload.php',
                    params: null,
                    fileKey: 'upload_file',
                    connectionCount: 3,
                    leaveConfirm: 'File uploading, will be cancel if you leave the page.'
                },
                pasteImage: true,
            });
        });
	</script>
@endsection