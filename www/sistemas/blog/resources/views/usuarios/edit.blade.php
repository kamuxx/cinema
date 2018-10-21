@extends("layouts.admin.index")
@section("title","Modificar Usuarios")
@section("content_admin")
    <div class="card col-md-8 offset-2 p-0 h-100">
        <div class="card-header bg-primary text-white text-center">
             <h5>Editar de Usuarios</h5>
        </div>
        <div class="card-body">
            @include('errors.error')
            {!!Form::model($usuario,['route' => ['usuarios.update',$usuario->id],"method"=>"PUT"])!!}
                @include("usuarios.form")
                <div class="form-group row justify-content-center">
                    {!!Form::submit("Guardar",["class"=>"btn btn-primary"])!!}
                    <a href="{{URL::to("usuarios")}}" class="btn btn-danger">Cancelar</a>
                </div>
            {!!Form::close()!!}
            {!!Form::model($usuario,['route' => ['usuarios.destroy',$usuario->id],"method"=>"DELETE"])!!}
                <div class="form-group row justify-content-center">
                    {!!Form::submit("ELIMINAR",["class"=>"btn btn-secondary"])!!}
                </div>
            {!!Form::close()!!}
        </div>
    </div>
@stop