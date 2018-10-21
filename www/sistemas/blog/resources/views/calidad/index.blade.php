@extends("layouts.admin.index")
@section("content_admin")
	<div class="card col-md-10 offset-1 p-0 h-100">
		@include('alertas.mensajes')
		<div class="card-header bg-primary text-white text-center">
			<h5>Calidades Disponibles</h5>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-md-12 text-right">
					<a href="{{URL::to("calidad/create")}}" class="btn btn-info">Agregar</a>
				</div>
			</div>
			<div class="table-responsive-md">
				<table 
					class="table table-str dt"
					data-search="true"
					data-show-refresh="true"
                    data-show-columns="true" 
					data-toggle="table"
					data-pagination="true"
                    data-formatter="TableActions" 
					data-url="{{URL::to("admin/calidad/listar")}}"
				>
					<thead class="thead-dark">
						<th data-field="nro">#</th>
						<th data-field="nombre">Calidad</th>
						<th data-formatter="TableActions">Acciones</th>
					</thead>
					<tbody></tbody>
				</table>
			</div>
		</div>
	</div>
@stop