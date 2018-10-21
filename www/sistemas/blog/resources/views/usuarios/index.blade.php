@extends("layouts.admin.index")
@section("title","Usuarios")
@section("content_admin")
    <div class="card col-md-10 offset-1 p-0 h-100">
        @include('alertas.mensajes')
        <div class="card-header bg-primary text-white text-center">
             <h5>Lista de Usuarios</h5>
        </div>
        <div class="card-body">
			<div class="row">
				<div class="col-md-12 text-right">
					<a href="{{URL::to('usuarios/create')}}" class="btn btn-info">Agregar <i class="fas fa-plus"></i></a>
				</div>
			</div>
			<br>
            <div class="table-responsive-md">
            	<table id="tbl_usuarios" width="100%" class="dt table table-striped"
                        data-show-refresh="true"
                        data-show-columns="true" 
						data-toggle="table"
						data-search="true"
                        data-pagination="true"
                        data-formatter="TableActions" 
						data-url="{{URL::to('admin/usuarios/listar')}}"
					>
            		<thead class="thead-dark">
            			<th data-field="nro">#</th>
            			<th data-field="nombre">Nombre</th>
            			<th data-field="correo">Correo</th>
            			<th data-formatter="TableActions">Acciones</th>
            		</thead>
            		<tbody>
                        
            		</tbody>
            	</table>
            </div>
        </div>
    </div>
    
@stop