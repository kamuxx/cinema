<div class="form-group row">
	{!!Form::label("Nombre","nombre",['class'=>'col-md-2 col-form-label'])!!}
	<div class="col-md-10">
		@if(isset($usuario))
		{!!Form::text('name', "{$usuario->name}",["class"=>'form-control',"placeholder"=>"Ej: Pedro Perez"]);!!}
		@else
		{!!Form::text('name', "",["class"=>'form-control',"placeholder"=>"Ej: Pedro Perez"]);!!}
		@endif
	</div>
</div>

<div class="form-group row">
	{!!Form::label("Email",null,['class'=>'col-md-2 col-form-label'])!!}
	<div class="col-md-10">
		@if(isset($usuario))
		{!!Form::email('email', "{$usuario->email}",["class"=>'form-control',"placeholder"=>"Ej: usuario@dominio.com"]);!!}
		@else
		{!!Form::email('email', "",["class"=>'form-control',"placeholder"=>"Ej: usuario@dominio.com"]);!!}
		@endif
	</div>
</div>
<div class="form-group row">
	{!!Form::label("Clave",null,['class'=>'col-md-2 col-form-label'])!!}
	<div class="col-md-10">
		{!!Form::password('password', ['class' => 'form-control'])!!}
	</div>
</div>