<div class="form-group row">
	{!!Form::label("nombre","Nombre",["class"=>"control-form-label col-md-2"])!!}
	<div class="col-md-10">
		@if(!isset($calidad))
		{!!Form::text("nombre","",["class"=>"form-control","placeholder"=>"Ej: DVD-RIP"])!!}
		@else
		{!!Form::text("nombre","{$calidad->nombre}",["class"=>"form-control","placeholder"=>"Ej: DVD-RIP"])!!}
		@endif		
	</div>
</div>