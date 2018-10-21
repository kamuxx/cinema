<?php

namespace Cinema\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

use Cinema\Calidad;
use Cinema\Http\Requests;
use Cinema\Http\Requests\CalidadCreateRequest;
use Cinema\Http\Requests\CalidadUpdateRequest;
use Cinema\Http\Controllers\Controller;

class CalidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("calidad.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("calidad.create");
    }

    /**
     * Show the form for showing all resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listar()
    {
        $calidad = Calidad::all(["id","nombre"]);
        $lista = array();
        foreach ($calidad as $idx => $unaCalidad) {
            $lista[$idx]["nro"] = $idx + 1;
            $lista[$idx]["nombre"] = $unaCalidad->nombre;
            $lista[$idx]["id"] = $unaCalidad->id;
            $lista[$idx]["ruta_edit"] = "calidad/{$unaCalidad->id}/edit";
        }

        return $lista;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CalidadCreateRequest $request)
    {

        Calidad::create($request->all());

        Session::flash("message","Calidad Registrada Con exito");
        Session::flash("alert-color","success");

        return Redirect("calidad");//*/
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
        $calidad = Calidad::find($id);
        return view("calidad.edit",["calidad"=>$calidad]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CalidadUpdateRequest $request, $id)
    {
        $calidad = Calidad::find($id);
        $calidad->fill($request->all());
        $calidad->save();

        Session::flash("message","Calidad Actualizada exitosamente");
        Session::flash("alert-color","success");
        return Redirect("calidad");
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
