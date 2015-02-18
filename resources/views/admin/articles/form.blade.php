<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control', 'autofocus' => 'autofocus']) !!}
</div>

<div class="form-group">
    {!! Form::label('body', 'Body:') !!}
    {!! Form::textarea('body', null, ['id' => 'editor', 'class' => 'form-control', 'placeholder' => 'Please Enter some text...',  'style' => 'overflow-x:hidden', 'rows' => '20']) !!}
</div>

<div class="form-group">
    {!! Form::label('slug', 'Slug:') !!}
    {!! Form::text('slug', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('category', 'Category:') !!}
    <select class="form-control" name="category_id" id="category_id">
        @foreach ($categories['top'] as $top_category)
            <option value="{{ $top_category->id }}">{{ $top_category->name }}</option>
            @foreach ($categories['second'][$top_category->id] as $scategory)
                <option value="{{ $scategory->id }}">&nbsp;&nbsp;&nbsp;{{ $scategory->name }}</option>
            @endforeach
        @endforeach
    </select>
</div>

<div class="form-group">
    {!! Form::label('tags', 'Tags:') !!}
    {!! Form::select('tag_list[]', $tags, null, ['id' => 'tag_list', 'class' => 'form-control', 'multiple']) !!}
</div>

<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>

@section('header')
    <link rel="stylesheet" href="/assets/admin/css/select2.min.css">
@endsection

@section('footer')
    <script src="/assets/admin/js/inline-attachment.js"></script>
    <script src="/assets/admin/js/jquery.inline-attachment.js"></script>
    <script src="/assets/admin/js/select2.min.js"></script>
	<script>
		$('#tag_list').select2({
			placeholder: 'Choose a tag',
			tags: true
		});
        $('#category_id').select2();
        $(function() {
            $('textarea').inlineattachment({
                uploadUrl: '/upload.php'
            });
        });
	</script>
@endsection