@if(Session::has("message"))        
<div class="alert alert-{{Session::get("alert-color")}} alert-dismissible fade show" role="alert">
	<h6>{{Session::get("message")}}</h6>
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div> 
@endif