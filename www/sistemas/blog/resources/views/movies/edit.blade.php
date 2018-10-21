@extends("layouts.admin.index")
@section("title","Editar Peliculas")
@section("content_admin")
	<div class="card col-md-10 offset-md-1 p-0">
		<div class="card-header bg-primary text-white text-center">
			<h5>Editar Peliculas</h5>
		</div>
		<div class="card-body">
			@include('errors.error')
			{!!Form::model($movie,["route"=>["titulos.update",$movie->id],"method"=>"PUT","files"=>true])!!}
			@include("movies.form")
			<div class="row justify-content-center">
				{!!Form::submit("Guardar",["class"=>"btn btn-primary"])!!}
				<a href="{{URL::to("titulos")}}" class="btn btn-danger">Cancelar</a>
			</div>
			{!!Form::close()!!}
		</div>
	</div>
@stop