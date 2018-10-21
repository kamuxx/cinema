@extends("layouts.admin.index")
@section("content_admin")
<div class="card col-md-8 offset-2 p-0 h-100">
	<div class="card-header bg-primary text-center text-white">
		<h5>Registrar Nueva Calidad</h5>
	</div>
	<div class="card-body">
		@include('errors.error')
		{!!Form::open(["route"=>"calidad.store","method"=>"POST"])!!}
		@include("calidad.form")
		<div class="form-group row justify-content-center">
			{!!Form::submit("Guardar",["class"=>"btn btn-primary"])!!}
			<a href="{{URL::to("calidad")}}" class="btn btn-danger">Cancelar</a>
		</div>
		{!!Form::close()!!}
	</div>
</div>
@stop