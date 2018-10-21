@extends("layouts.admin.index")
@section("content_admin")
	<div class="card col-md-10 p-0 offset-1">
		<div class="card-header bg-primary text-center">
			<h5>Editar Calidad</h5>			
		</div>
		<div class="card-body">
			@include('errors.error')
			{!!Form::model($calidad,["route"=>["calidad.update",$calidad->id],"method"=>"PUT"])!!}
			@include("calidad.form")
			<div class="form-group row justify-content-center">
				{!!Form::submit("Atualizar",["class"=>"btn btn-primary"])!!}
				<a href="{{URL::to("calidad")}}" class="btn btn-danger">Regresar</a>
			</div>
			{!!Form::close()!!}
		</div>
	</div>

@stop