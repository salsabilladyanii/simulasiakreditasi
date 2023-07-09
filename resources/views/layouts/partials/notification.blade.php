@if ($message = Session::get('success'))
<div class="alert alert-success alert-dismissible">
  	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  	{{ $message }}
</div>
@endif
@if ($message = Session::get('error'))
<div class="alert alert-danger alert-dismissible">
  	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  	{{ $message }}
</div>
@endif

@if ($message = Session::get('warning'))
<div class="alert alert-warning alert-dismissible">
  	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  	{{ $message }}
</div>
@endif

@if ($message = Session::get('info'))
<div class="alert alert-info alert-dismissible">
  	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  	{{ $message }}
</div>
@endif

@if ($errors->any())
<div class="example-alert">
	<div class="alert alert-dangers alert-icon">
		<em class="icon ni ni-alert-circle"></em> <strong>Please check the form below for errors</strong>
	</div>
</div>
@endif