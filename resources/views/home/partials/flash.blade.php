<!-- 暂时用不上 -->
@if(Session::has('flash_message'))
	<div class="alert alert-success {{ Session::has('flash_message_important') ? 'alert-imoprtant' : '' }}">
		@if(Session::has('flash_message_important'))
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true"> &times; </button>
		@endif
		{{ session('flash_message') }}
	</div>
@endif
