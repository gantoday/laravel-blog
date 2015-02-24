<script src="{{ elixir("js/all.js") }}"></script>

<script>
	$('.blog-post img').addClass('carousel-inner img-responsive img-rounded');
	$(document).ready(function() {
		$('pre code').each(function(i, block) {
			hljs.highlightBlock(block);
		});
	});
</script>