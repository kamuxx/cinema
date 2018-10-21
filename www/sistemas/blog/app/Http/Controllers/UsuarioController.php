<?php

namespace Cinema\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Routing\Route;

use Cinema\User;
use Cinema\Http\Requests;
use Cinema\Http\Requests\UserCreateRequest;
use Cinema\Http\Requests\UserUpdateRequest;
use Cinema\Http\Controllers\Controller;


class UsuarioController extends Controller
{
    public function __construct(){
        $this->beforeFilter("@find",["only"=>["edit","update"]]);
    }

    public function find(Route $route){
        $this->usuario = User::find($route->getParameter('usuarios'));
        //return $this->usuario;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view("usuarios.index");
    }

    public function listar(){
        $usuarios = User::all(['id', 'name','email']);
        $lista = array();
        foreach($usuarios as $idx => $unUsuario){
            $lista[$idx]["nro"] = $idx + 1;
            $lista[$idx]["nombre"] = $unUsuario->name;
            $lista[$idx]["correo"] = $unUsuario->email;  
            $lista[$idx]["ruta_edit"] = "usuarios/{$unUsuario->id}/edit";         
        }

        header("Content-type: application/json");
        return json_encode($lista);//*/
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("usuarios.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreateRequest $request)
    {
        User::create($request->all());//*/
        
        Session::flash("message","Usuario Registrado con exito");
        Session::flash("alert-color","success");
        return Redirect("usuarios");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario = User::find($id);
        
        return view("usuarios.edit",["usuario"=>$this->usuario]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id)
    {
        $this->usuario->fill($request->all());
        try{
            $this->usuario->save();
            Session::flash("message","Usuario Actualizado exitosamente");
            Session::flash("alert-color","success");
        }catch(Exception $ex){
            Session::flash("message","actualizado");
            Session::flash("alert-color","danger");
        }
        
        return Redirect("usuarios");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = User::destroy($id);

        Session::flash("message","Usuario Eliminado exitosamente");
        Session::flash("alert-color","success");
        return Redirect("usuarios");
    }
}
