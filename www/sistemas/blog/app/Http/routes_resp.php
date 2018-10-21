<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get("test",function(){//funciones personalizads sin parametros
    return "Hola mundo desde test";
});

//Se coloca el signpo de interrogacion como para evaluar en forma de pregunta si recibe o no parametro para mostrar el valor por defecto
Route::get("params/{valor?}", function($parametro = "Sin valor detectado"){//receptor url con parametros
    return "Se recibe el parametro $parametro"; 
});


Route::get("mensaje/{valor1?}/persona/{valor2?}",function($mensaje="Hola ",$persona=" Lester"){
    return $mensaje." ".$persona;
});

//Route::get("inicio","InicioController@index");//llamando controladores sin recepcion de parametros

Route::get("saludo/{valor}","InicioController@saludo");//llamando un metodo espefifico

//llamando un controlador restfull
Route::resource("movie","MovieController");
Route::resource("inicio","InicioController");