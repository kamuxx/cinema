<?php

namespace Cinema\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Routing\Route;


use Cinema\Calidad;
use Cinema\Genero;
use Cinema\Movie;
use Cinema\MovieCalidad;
use Cinema\MovieGenero;    
use Cinema\Http\Requests;
use Cinema\Http\Requests\MovieCreateRequest;
use Cinema\Http\Requests\MovieUpdateRequest;
use Cinema\Http\Controllers\Controller;

class MovieController extends Controller
{
    public function __construct(){
        $this->beforeFilter("@find",["only"=>["edit","show","update"]]);
    }

    public function find(Route $route){
        if($route->parameterNames()[0]=="movies"){
            $this->movie = Movie::getMoviesByName(str_replace("-"," ",$route->getParameter($route->parameterNames()[0])));
            $this->movie = Movie::find($this->movie->id);
        }else{
            $this->movie = Movie::find($route->getParameter($route->parameterNames()[0]));
        }
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("movies.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $calidad = Calidad::all(["id","nombre"]);
        $genero = Genero::all(["id","gen_nombre"]);
        return view("movies.create",["calidad"=>$calidad,"genero"=>$genero]);
    }

    public function listar(){
        $movies = Movie::all(["id","nombre","sinopsis","duracion","year"]);
        $lista= array();
        foreach ($movies as $idx => $unaPeli) {
            $lista[$idx]["nro"] = $idx + 1;
            $lista[$idx]["nombre"] = $unaPeli->nombre;
            $lista[$idx]["sinopsis"] = $unaPeli->sinopsis;
            $lista[$idx]["duracion"] = $unaPeli->duracion." Mins";
            $lista[$idx]["year"] = $unaPeli->year;
            $movieGenero = Movie::find($unaPeli->id)->getGenero()->where("movie_id",$unaPeli->id)->get();
            $genero="";
            if(count($movieGenero) != 0){
                $genero = Genero::find($movieGenero[0]->genero_id);
                if(gettype($genero)=="object"){
                    $lista[$idx]["genero"] = $genero->gen_nombre;      
                }
            }
            $lista[$idx]["ruta_edit"] = "titulos/{$unaPeli->id}/edit";
        }
        header("Content-type:application/json");
        return json_encode($lista);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MovieCreateRequest $request)
    {
        
        exit(json_encode($request->all()));
        $movie = Movie::create($request->all());


        $movieGenero = new MovieGenero();
        $movieGenero->movie_id=$movie->id;
        $movieGenero->genero_id=$request["genero"];
        $movieGenero->save();

        $movieCalidad = new MovieCalidad();
        $movieCalidad->movie_id=$movie->id;
        $movieCalidad->calidad_id=$request["calidad"];
        $movieCalidad->save();


        Session::flash("message","Registro Guardado Exitosamente");
        Session::flash("alert-color","success");
        return Redirect("titulos");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($nombre)
    {
        $genero = $this->movie->getGenero()->where("movie_id",$this->movie->id)->get();
        $genero = Genero::find($genero[0]->genero_id);
        $calidad = $this->movie->getCalidad()->where("movie_id",$this->movie->id)->get();
        $calidad = Calidad::find($calidad[0]->calidad_id);
        //$genero = Genero::find($genero->genero_id);
        return view("layouts.movies.detalle",["movie"=>$this->movie,"genero"=>$genero->gen_nombre,"calidad"=>$calidad]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $calidad = Calidad::all(["id","nombre"]);
        $genero = Genero::all(["id","gen_nombre"]);

        if(!empty($this->movie->getCalidad())){
            $movieCalidad = $this->movie->getCalidad()->where("movie_id",$id)->get();
            $movieGenero = $this->movie->getGenero()->where("movie_id",$id)->get();
        }else{
            $movieCalidad="";
            $movieGenero="";
        }//*/
        return view("movies.edit",["movie"=>$this->movie,"calidad"=>$calidad,"genero"=>$genero,"moviecalidad"=>$movieCalidad,"moviegenero"=>$movieGenero]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MovieUpdateRequest $request, $id)
    {

        $this->movie->fill($request->all())->save();
        $movieCalidad = MovieCalidad::where("movie_id","=",$id)->first();
        if(empty($movieCalidad)){
            $movieCalidad->calidad_id=$request["calidad"];
            $movieCalidad->movie_id=$id;
        }else{
            $movieCalidad->calidad_id=$request["calidad"];            
        }
        //print_r(json_encode($movieCalidad));
        //die();
        $movieCalidad->save();

        $movieGenero = MovieGenero::where("movie_id","=",$id)->first();
        if(empty($movieGenero)){
            $movieGenero = new MovieGenero();
            $movieGenero->genero_id=$request["genero"];
            $movieGenero->movie_id=$id;
        }else{
            $movieGenero->genero_id=$request["genero"];
        }
        $movieGenero->save();


        Session::flash("message","Registro Actualizado Exitosamente");
        Session::flash("alert-color","success");
        return Redirect("titulos");
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
