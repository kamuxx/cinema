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

Route::get("/","FrontController@index");
Route::get("contacto","FrontController@contacto");
Route::get("reviews","FrontController@reviews");
//Route::get("movies/{id}","MovieController@show");
Route::get("admin","AdminController@index");
Route::get("admin/titulos","AdminController@titulos");
Route::get("admin/main","AdminController@main");


Route::resource("usuarios","UsuarioController");

//Route::get("usuarios/edit/{valor}","UsuarioController@edit");
Route::get("admin/usuarios/listar","UsuarioController@listar");

//rutas para el genero
Route::resource("genero","GeneroController",["only"=>["index","edit","create","store","update","show","destroy"]]);

Route::get("admin/genero/listar","GeneroController@listar");
//Route::get("genero/edit/{valor}","GeneroController@edit");

Route::resource("calidad","CalidadController",["only"=>["index","edit","create","store","update","show","destroy"]]);

Route::get("admin/calidad/listar","CalidadController@listar");
//Route::get("calidad/edit/{valor}","CalidadController@edit");

Route::resource("titulos","MovieController",["only"=>["index","edit","create","store","update","destroy"]]);
Route::get("titulos/listar","MovieController@listar");
Route::resource("titulos","MovieController",["only"=>["index","edit","create","store","update","destroy"]]);
Route::resource("movies","MovieController",["only"=>["show"]]);
