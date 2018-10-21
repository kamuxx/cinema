@extends("layouts.main")

@section("content")

<div class="container">
    <div class="row">
        <div class="col-md-9 card p-0">
            <div class="card-header bg-primary text-center text-white">
                <h5 class='card-title'>Rascacielos: Rescate en las alturas</h5>
            </div>
            <div class="card-body bg-light p-0 mt-0">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="alert alert-secondary text-dark p-1">
                            <h6>
                            Pulicado en 2018 por CINEMAWEB
                            </h6>  
                        </div>
                    </div>
                    <div class="col-md-12 d-flex justify-content-center">
                        <img src="/caratula/{!!$movie->imagen!!}" width="35%" height="100%" alt="Cinemaweb" class="img-responsive">
                    </div>
                    <div class="col-md-8 offset-md-2 px-4 pt-3">
                        <p class='card-text text-justify'>{!!$movie->sinopsis!!}</p>
                        <p class="card-text text-center">Informacion Adicional</p>
                        <p class="card-text text-center">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Titulo Original: {!!$movie->nombre!!}</li>
                            <li class="list-group-item">Título Latino: Rascacielos: Rescate en las alturas</li>
                            <li class="list-group-item">Título Español: El Rascacielos</li>
                            <li class="list-group-item">Genero: {!!$genero!!}</li>
                            <li class="list-group-item">País: EE.UU.</li>
                            <li class="list-group-item">Duración: {!!$movie->duracion!!} minutos</li>
                            <li class="list-group-item">Año: {!!$movie->year!!}</li>
                            <li class="list-group-item">Servidores Online: Openload, Netu y RapidVideo</li>
                            <li class="list-group-item">Servidores Descarga: MEGA, Google Drive, 4Shared, 1Fichier, Filecloud y Uptobox (en 1 Link)</li>
                        </ul>
                        </p>
                    </div>
                    <div class="col-md-8 offset-md-2 pt-3">
                        <div class="w-100 border border-secondary"></div>
                    </div>
                    <div class="col-md-8 offset-md-2 pt-3">
                        <p class="card-text text-center">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Calidad: DVDRip</li>
                                <li class="list-group-item">Idioma: Audio Español Latino | Audio Ingles Subtitulada en Español pegados</li>
                                <li class="list-group-item">Peso: 864 MB | 998 MB</li>
                                <li class="list-group-item">Formato: .AVI</li>
                                <li class="list-group-item">Resolución: 720x304</li>
                            </ul>
                        </p>
                    </div>
                    <div class="col-md-8 offset-md-2 pt-3">
                        <div class="w-100 border border-secondary"></div>
                    </div>
                    <div class="col-md-8 offset-md-2 pt-3">
                        <p class="card-text text-center">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Calidad: Blu-Ray RIP HD 720p | 1080p</li>
                                <li class="list-group-item">Idioma: Audio Español Latino AC3 2.0 | Audio Ingles AC3 5.1 Subtitulada en Español</li>
                                <li class="list-group-item">Peso: 1,28 GB | 2,28 GB</li>
                                <li class="list-group-item">Formato: .MKV</li>
                                <li class="list-group-item">Resolución: 1280x528 | 1916x796</li>
                            </ul>
                        </p>
                    </div>
                    <div class="col-md-8 offset-md-2 pt-3">
                        <div class="w-100 border border-secondary"></div>
                    </div>
                    <div class="col-md-10 offset-md-1 pt-3">
                        <p class="card-text text-center">
                            Trailer HD 
                        </p>
                        <div class="embed-responsive embed-responsive-16by9">

                        <iframe width="560" height="315" src="{!!$movie->trailer!!}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 pr-0 pt-5">
            <div class="card mb-5">
                <div class="card-header bg-danger text-white text-center">
                    <h6 class="card-title">
                        Proximos Estrenos
                    </h6>
                </div>
                <div class="card-body">
                    <p class="card-text text-center">
                        Ingresa <a href="/movies/estrenos">Aquí</a> para observar el calendario de nuestros proximos aportes
                    </p>
                </div>
            </div>
            <div class="card mb-5">
                <div class="card-header bg-primary text-white text-center">
                    <h6 class="card-title">
                        Valoracion
                    </h6>
                </div>
                <div class="card-body bg-dark text-white text-center">
                    <p class="card-text">
                        <i class="fas fa-star text-warning"></i>
                        <i class="fas fa-star text-warning"></i>
                        <i class="fas fa-star text-warning"></i>
                        <i class="fas fa-star text-warning"></i>
                        <i class="fas fa-star-half-alt text-warning"></i>    
                    </p>
                    <small>
                        Puntuación: 4.5/5 (77 votos recibidos)
                    </small>
                </div>
            </div>
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

@stop