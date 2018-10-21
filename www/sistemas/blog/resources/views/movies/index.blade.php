@extends("layouts.admin.index")
@section("content_admin")
<div class="card col-md-10 offset-md-1 p-0">
	@include('alertas.mensajes')
	<div class="card-header text-center bg-primary text-white">
		<h5>Lista Peliculas Disponibles</h5>
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-md-12 text-right">
				<a href="{{URL::to("titulos/create")}}" class="btn btn-info">Agregar</a>
			</div>
		</div>
		<div class="table-responsive">
			<table 
				class="table table-striped"
				data-search="true"
				data-show-refresh="true"
                data-show-columns="true" 
				data-toggle="table"
				data-pagination="true"
                data-formatter="TableActions"
                data-url="{{URL::to("titulos/listar")}}" 
			>
				<thead class="thead-dark">
					<th data-field="nro">#</th>
					<th data-field="nombre">Titulo</th>
					<th data-field="duracion">Duracion</th>
					<th data-field="year">Año</th>
					<th data-field="genero">Genero</th>
					<th data-formatter="TableActions">Acciones</th>
				</thead>
			</table>
		</div>
	</div>
</div>
@stop