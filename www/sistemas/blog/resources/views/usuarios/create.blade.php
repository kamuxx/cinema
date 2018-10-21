@extends("layouts.admin.index")
@section("title","Registro de Usuarios")
@section("content_admin")
    <div class="card col-md-8 offset-2 p-0 h-100">
        <div class="card-header bg-primary text-white text-center">
             <h5>Registro de Usuarios</h5>
        </div>
        <div class="card-body">
            @include("errors.error")
            {!!Form::open(['action' => 'UsuarioController@store',"method"=>"POST"])!!}
                @include("usuarios.form")
                <div class="form-group row justify-content-center">
                    {!!Form::submit("Registrar",["class"=>"btn btn-primary"])!!}
                    {!!Form::Reset("Cancelar",["class"=>"btn btn-danger"])!!}
                </div>
                </div>
            {!!Form::close()!!}
            
        </div>
    </div>
@stop