<div class="col-sm-3 col-sm-offset-1 blog-sidebar">
	<div class="sidebar-module sidebar-module-inset">
		<h1>Categories</h1>
		<ol class="list-unstyled">
			@foreach($allCategories as $category)
				<li>
					@if($category->parent_id > 0)
						--
					@endif
					<a href="/categories/{{ $category->slug }}">{{ $category->name }}</a>
				</li> 
			@endforeach 
		</ol>
	</div>
	<div class="sidebar-module sidebar-module-inset">
		<h1>Hot</h1>
		<ol class="list-unstyled">
			@foreach($hottestArticles as $article)
				<li><a href="/{{ $article->slug }}">{{ $article->title }}</a></li>
			@endforeach
		</ol>
	</div>
	<div class="sidebar-module sidebar-module-inset">
		<h1>New</h1>
		<ol class="list-unstyled">
			@foreach($NewestArticles as $article)
				<li><a href="/{{ $article->slug }}">{{ $article->title }}</a></li>
			@endforeach
		</ol>
	</div>
	<div class="sidebar-module sidebar-module-inset">
		<h1>Friends</h1>
		<ol class="list-unstyled">
			<li><a href="#">GitHub</a></li>
			<li><a href="#">Twitter</a></li>
			<li><a href="#">Facebook</a></li>
		</ol>
	</div>
</div><!-- /.blog-sidebar -->	