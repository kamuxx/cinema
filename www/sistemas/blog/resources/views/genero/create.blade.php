@extends("layouts.admin.index")
@section("content_admin")
<div class="card col-md-8 offset-2 p-0">
	<div class="card-header bg-primary text-white text-center">
		<h5>Crear Genero</h5>
	</div>
	<div class="card-body">
		@include('errors.error')
		{!!Form::open(["route"=>"genero.store"])!!}
			@include("genero.form")
			<div class="form-group row justify-content-center">
				{!!Form::submit("Enviar",["class"=>"btn btn-primary"])!!}
			</div>
		{!!Form::close()!!}
	</div>
</div>
@stop