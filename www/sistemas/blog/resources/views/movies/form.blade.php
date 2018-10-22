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
	{!!Form::label("nombre_latino","Nombre Latino",["class"=>"col-md-2"])!!}
	<div class="col-md-10">
		@if(!isset($movie))
		{!!Form::text("nombre_latino","",["class"=>"form-control"])!!}
		@else
		{!!Form::text("nombre_latino","{$movie->nombre_latino}",["class"=>"form-control"])!!}
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
	{!!Form::label("idioma","Idioma",["class"=>"col-md-2"])!!}
	<div class="col-md-10">
		@if(!isset($movie))
		{!!Form::select("idioma",["Español"=>"Español","Ingles"=>"Ingles"],null,["class"=>"form-control"])!!}
		@else
		{!!Form::select("idioma",["Español"=>"Español","Ingles"=>"Ingles"],null,["class"=>"form-control"])!!}
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
	<div class="col-md-3">
		{!!Form::label("calidad","Calidad")!!}
		<?php 
		$calidad = json_decode($calidad);
		$lista = array();
		foreach ($calidad as $idx=> $unaCalidad){
			$lista[$unaCalidad->id]=$unaCalidad->nombre;
		}
		?>
		{!!Form::select("calidad",$lista,null,["class"=>"form-control"])!!}
	</div>
	<div class="col-md-3">
		{!!Form::label("resolucion","Resolucion")!!}
		{!!Form::text("resolucion","",["class"=>"form-control"])!!}
	</div>
	<div class="col-md-3">
		{!!Form::label("size","Tamaño")!!}
		{!!Form::text("size","",["class"=>"form-control"])!!}
	</div>
	<div class="col-md-2">
		{!!Form::label("formato","Formato")!!}
		{!!Form::select("formato",["AVI","MKV","MP4"],null,["class"=>"form-control"])!!}
	</div>
	<div class="col-md-1">
		<button type="button" id="btn_calidad" class="btn btn-primary" title="Añadir" onclick="addCalidadMovie()"><i class="fas fa-plus"></i></button>
		<button type="button" id="btn_calidad" class="btn btn-info" title="Guardar" onclick="saveCalidadMovie()"><i class="fas fa-save"></i></button>
	</div>
	<div class="col-md-12 mt-2">
		<div class="table-responsive">
			<table id="tbl_calidad" class="table table-striped">
				<thead class="bg-dark justify-content-center text-white">
					<th>Calidad</th>
					<th>Resolucion</th>
					<th>Tamaño</th>
					<th>Formato</th>
				</thead>
				<tbody>
					
				</tbody>
			</table>
		</div>
	</div>
	<div class="col-md-12">
		{!!Form::hidden("hdn_calidad","",["class"=>"form-control"])!!}
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