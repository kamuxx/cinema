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
      <div class="card-deck pt-5">
        <div class="card z-depth-5">
          <img src="/img/megalodon.jpg" alt="CinemaWeb" height='320px' class="card-img-top img-responsive" data-toggle='tooltip' data-placement='right' data-html='true' title='<em>Sinopsis</em><br><small>Un tiburón prehistórico de 25 metros de longitud amenaza a los tripulantes de un submarino hundido en la fosa más profunda del océano Pacífico y al grupo enviado para rescatarlos. Si no lo detienen, el tiburón causará estragos.</small>'>
          <div class="card-body">
            <h5 class="card-title">Megalodon</h5>
            <div class="card-text text-center pt-3">
              <button class="btn btn-primary">Descargar</button>
            </div>
          </div>
        </div>
        <div class="card">
          <img src="/img/rascacielos.jpg" alt="CinemaWeb" height='320px' class="card-img-top" data-toggle="tooltip" data-placement='right' data-html="true" title="<em>Sinopsis</em><br><small>Como un ex líder del equipo de rescate de rehenes del FBI y veterano de guerra Will Sawyer. Quien ahora evalúa la seguridad de rascacielos. En una misión en China, descubre que el edificio más alto y seguro del mundo se encuentra en llamas y él ha sido culpado por ello. Fugitivo, Will debe encontrar a los responsables, limpiar su nombre y de alguna forma, rescatar a su familia que está atrapada dentro del edificio… por encima del nivel en llamas.</small>">
          <div class="card-body">
            <h5 class="card-title">Rascacielos</h5>
            <div class="card-text text-center pt-3">
              <a href="/movies/1" class="btn btn-primary">Descargar</a>
            </div>
          </div>
        </div>
        <div class="card">
        <img src="/img/jw2.jpg" alt="CinemaWeb" height='320px' class="card-img-top" data-toggle="tooltip" data-placement='right' data-html="true" title="<em>Sinopsis</em><br><small>Owen intentará encontrar a Blue, su dinosaurio favorito que aún permanece perdido en la jungla. Mientras, Claire, que ha adquirido un gran respeto por estas criaturas, considera que su misión es salvarlas. Juntos aterrizarán en una isla inestable en la que la lava supone una gran amenaza. Además, como telón de fondo está la conspiración que podría poner en peligro a todo el planeta y hacerlo retroceder a un orden no visto desde los tiempos prehistóricos.</small>">
          <div class="card-body">
            <h5 class="card-title">Jurassic World <br><small>El reino caido</small></h5>
            <div class="card-text text-center pt-3">
              <button class="btn btn-primary">Descargar</button>
            </div>
          </div>
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