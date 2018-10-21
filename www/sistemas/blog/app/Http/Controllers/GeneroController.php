<?php

namespace Cinema\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Routing\Route;

use Cinema\Genero;

use Cinema\Http\Requests;
use Cinema\Http\Requests\GeneroCreateRequest;
use Cinema\Http\Controllers\Controller;

class GeneroController extends Controller
{

    public function __construct(){
        $this->beforeFilter("@find",["only",["edit","update"]]);
    }

    public function find(Route $route){
        $this->genero = Genero::find($route->getParameter("genero"));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("genero.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("genero.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GeneroCreateRequest $request)
    {
        Genero::create($request->all());

       Session::flash("message","Genero Registrado con exito");
        Session::flash("alert-color","success");
        return Redirect("genero");
    }

    public function listar(){
        $genero = Genero::all(['id', 'gen_nombre']);
        $lista = array();
        foreach($genero as $idx => $unGen){
            $lista[$idx]["nro"] = $idx + 1;
            $lista[$idx]["nombre"] = $unGen->gen_nombre;
            $lista[$idx]["ruta_edit"] = "genero/{$unGen->id}/edit";
        }

        header("Content-type: application/json");
        return json_encode($lista);//*/
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
        //$genero = Genero::find($id);
        return view("genero.edit",["genero"=>$this->genero]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $genero = Genero::find($id);
        $genero->fill($request->all());
        $genero->save();
        Session::flash("message","Genero Actualizado con exito");
        Session::flash("alert-color","success");
        return Redirect("genero");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
