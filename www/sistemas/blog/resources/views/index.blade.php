@extends("layouts.main")

@section('titulo')
Prueba laravel
@endsection()

@section("content")
<!-- <div class="container p-0">
    <img src="/img/salacine.jpg" width="60%" alt="Cinema" class="img responsive">
</div> -->
<div class="container p-0">
  <div class="row">
    <div class="col-md-9">
      <div class="pt-5">
        <div class="row pl-3">
          @foreach ($peliculas as $pelicula)
            <div class="card shadow-sm col-md-4 pl-0 pr-0">
              <img src="/caratula/{!!$pelicula->imagen!!}" alt="CinemaWeb" width="100%" height='70%' class="card-img-top img-responsive" data-toggle='tooltip' data-placement='right' data-html='true' title='<em>Sinopsis</em><br><small>{!!$pelicula->sinopsis!!}</small>'>
              <div class="card-body">
                <h5 class="card-title">{!!$pelicula->nombre!!}</h5>
                <div class="card-text text-center pt-3">
                  <?php $peliNombre = str_replace(' ','-',$pelicula->nombre);?>
                  <a href="{{URL::to("/movies/$peliNombre")}}" class="btn btn-primary">Descargar</a>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="row pb-3 mt-5">
        <div class="col">
          <div class="card">
            <div class="card-header bg-danger text-white text-center">
              <h6 class='card-title'>Próximos Estrenos</h6>
            </div>
            <div class="card-body">
              Ingresa <a href="/estrenos">aquí</a> para conocer los titulos que estamos por subir
            </div>
          </div>
        </div>
      </div>
      <div class="row pb-3">
        <div class="col">
          <div class="card">
            <div class="card-header bg-secondary text-white text-center">
              <h6 class='card-title'>Peliculas por Año</h6>
            </div>
            <div class="card-body">
              <div class="row d-flex justify-content-center">
                <label for="anio">Seleccione</label>
                <div class="col-sm-10 col-sm-offset-1 text-center">
                  <select name="anio" id="anio" class='form-control'>
                    <option value="" selected disabled>Seleccione..</option>
                    <option value="">2018</option>
                    <option value="">2017</option>
                    <option value="">2016</option>
                    <option value="">2015</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@stop()