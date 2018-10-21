<div class="form-group row">
	{!!Form::label("gen_nombre","Nombre",["class"=>"col-form-label col-md-2"])!!}
	<div class="col-md-10">
		@if(isset($genero))
		{!!Form::text("gen_nombre","{$genero->gen_nombre}",["class"=>"form-control","placeholder"=>"Ej: Accion"])!!}
		@else
		{!!Form::text("gen_nombre","",["class"=>"form-control","placeholder"=>"Ej: Accion"])!!}
		@endif
	</div>
</div>