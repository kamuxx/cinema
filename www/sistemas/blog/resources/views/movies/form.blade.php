<div class="form-group row">
	{!!Form::label("nombre","Nombre",["class"=>"col-md-2"])!!}
	<div class="col-md-10">
		@if(!isset($movie))
		{!!Form::text("nombre","",["class"=>"form-control"])!!}
		@else
		{!!Form::text("nombre","{$movie->nombre}",["class"=>"form-control"])!!}
		@endif
	</div>
</div>
<div class="form-group row">
	{!!Form::label("sinopsis","Sinopsis",["class"=>"col-md-2"])!!}
	<div class="col-md-10">
		@if(!isset($movie))
		{!!Form::textarea("sinopsis","",["class"=>"form-control","rows"=>"5"])!!}
		@else
		{!!Form::textarea("sinopsis","{$movie->sinopsis}",["class"=>"form-control","rows"=>"5"])!!}
		@endif
	</div>
</div>
<div class="form-group row">
	{!!Form::label("nombre","Duracion",["class"=>"col-md-2"])!!}
	<div class="col-md-10">
		@if(!isset($movie))
		{!!Form::text("duracion","",["class"=>"form-control"])!!}
		@else
		{!!Form::text("duracion","{$movie->duracion}",["class"=>"form-control"])!!}
		@endif
	</div>
</div>
<div class="form-group row">
	{!!Form::label("trailer","Trailer",["class"=>"col-md-2"])!!}
	<div class="col-md-10">
		@if(!isset($movie))
		{!!Form::text("trailer","",["class"=>"form-control"])!!}
		@else
		{!!Form::text("trailer","{$movie->trailer}",["class"=>"form-control"])!!}
		@endif
	</div>
</div>
<div class="form-group row">
	{!!Form::label("year","Año",["class"=>"col-md-2"])!!}
	<div class="col-md-10">
		@if(!isset($movie))
		{!!Form::text("year","",["class"=>"form-control"])!!}
		@else
		{!!Form::text("year","{$movie->year}",["class"=>"form-control"])!!}
		@endif
	</div>
</div>
<div class="form-group row">
	@if(isset($movie))
	<div class="input-group col-md-10 offset-md-2">
		<div class="input-group-prepend">
			<span class="input-group-text" id="imagen">Cargar Imagen</span>
		</div>
		<div class="custom-file">
			<input type="file" class="custom-file-input" id="imagen" name="imagen" aria-describedby="imagen" value="{!!$movie->imagen!!}">
			<label class="custom-file-label" for="imagen">Buscar</label>
		</div>
	</div>
	<div class="input-group col-md-12 mt-2 justify-content-center">
		<img src="/caratula/{!!$movie->imagen!!}" width=25%" height="100%" class="img-responsive" alt="CINEMAWEB">
	</div>
	@else
	<div class="input-group col-md-10 offset-md-2">
		<div class="input-group-prepend">
			<span class="input-group-text" id="inputGroupFileAddon01">Cargar Imagen</span>
		</div>
		<div class="custom-file">
			<input type="file" class="custom-file-input" id="imagen" name="imagen"  aria-describedby="imagen">
			<label class="custom-file-label" for="imagen">Buscar</label>
		</div>
	</div>
	@endif
</div>
<div class="form-group row">
	{!!Form::label("calidad","Calidad",["class"=>"col-md-2"])!!}
	{!!Form::text("hdn_resolucion","",["class"=>"form-control"])!!}
	<div class="col-md-6">
		<select name="calidad" multiple class="form-control">
			@if(isset($moviecalidad))
			@foreach ($calidad as $unaCalidad)
			<option @if($unaCalidad->id==$moviecalidad[0]->calidad_id) selected="selected" @endif 
				value="{!!$unaCalidad->id!!}"
				onclick="addInputResolucion(this)" 
			>{!!$unaCalidad->nombre!!}</option>
			@endforeach
			@else
			@foreach ($calidad as $unaCalidad)
			<option value="{!!$unaCalidad->id!!}"
				onclick="addInputResolucion(this)"
				>{!!$unaCalidad->nombre!!}</option>
			@endforeach
			@endif
			
		</select>
	</div>
	<div id="resoluciones" class="col-md-4">
	</div>
</div>
<div class="form-group row">
	{!!Form::label("genero","Genero",["class"=>"col-md-2"])!!}
	<div class="col-md-10">
		<select name="genero" class="form-control">
			@if(!isset($movie))
			<option value="" selected disabled>Seleccione</option>
			@foreach ($genero as $unGen)
			<option value="{!!$unGen->id!!}">{!!$unGen->gen_nombre!!}</option>
			@endforeach
			@else
			@if(isset($moviecalidad))
			@foreach ($genero as $unGen)
			<option @if($unGen->id==$moviegenero[0]->genero_id) selected="selected" @endif value="{!!$unGen->id!!}">{!!$unGen->gen_nombre!!}</option>
			@endforeach
			@else
			@foreach ($genero as $unGen)
			<option value="{!!$unGen->id!!}">{!!$unGen->gen_nombre!!}</option>
			@endforeach
			@endif
			@endif
		</select>
	</div>
</div>