@extends('layouts.default')
@section('content')

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="{{ asset('js/multidate/jquery-ui.multidatespicker.js') }}"></script>
    
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/overcast/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <link rel="stylesheet" href="{{ asset('js/multidate/jquery-ui.multidatespicker.css') }}">

<style>
.ui-state-highlight .ui-widget-content .ui-state-highlight {
	border-color: #222 !important;
}
</style>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#loginModal">Create</button>
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModal" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
			 	<h5 class="modal-title" id="exampleModalLabel">Login</h5>
			 		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			 			<span aria-hidden="true">&times;</span>
			 		</button>
			</div>
			<div class="modal-body">
		  	<!-- login -->
        		{{ Form::open(array('url' => 'day/store')) }}
					<input type="text" name="dates" id="date" readonly='true'>
					<input type="submit" class="btn btn-primary btn-sm" value="Accept" />
				{{ Form::close() }}
        	<!-- end login -->
			</div>
		</div>
	</div>
</div>

<script>
$('#date').multiDatesPicker({dateFormat: "yy-mm-dd", minDate: 0});
</script>
@endsection