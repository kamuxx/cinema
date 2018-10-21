@extends('layouts.main')
@section("content")
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <img src="/img/callcenter.jpg" alt="Cinemaweb contacto" width='100%' class="img-responsive">
        </div>
    </div>
    <div class="row pt-5 d-flex justify-content-center">
        <h3>Contactanos</h3>
    </div>
    <form>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Nombre completo</label>
        <div class="col-sm-10">
        <input type="text" class="form-control" id="inputEmail3" placeholder="Nombre">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
        <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputPassword3" class="col-sm-2 col-form-label">Mensaje</label>
        <div class="col-sm-10">
        <textarea name="mensaje" id="mensaje" cols="30" rows="5" class="form-control"></textarea>
        </div>
    </div>
    
    <div class="form-group row text-center">
        <div class="col-sm-12">
            <button type="submit" class="btn btn-primary"><i class="fas fa-send"></i>Enviar</button>
        </div>
    </div>
    </form>
</div>
@stop