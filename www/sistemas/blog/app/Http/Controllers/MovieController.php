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
        $calidad = Calidad::all(["id","nombre"]);
        return view("movies.index",["calidad"=>$calidad]);
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

        $resolucion = explode("|",$request["hdn_calidad"]);
        unset($resolucion[count($resolucion) -1]);
        foreach ($resolucion as $unaResol) {//Actualizar la(s) calidads de la pelicula
            $unaResol = explode("-",$unaResol);
            $movieCalidad = new MovieCalidad();
            $movieCalidad->calidad_id=$unaResol[0]; //id de la resolucion
            $movieCalidad->resolucion=$unaResol[2]; //tamaño de resolucion
            $movieCalidad->size=$unaResol[3]; //size 
            $movieCalidad->formato=$unaResol[4]; //formato    
            $movieCalidad->movie_id = $id;
            $movieCalidad->save();
        }


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
        $movieCalidad = $this->movie->getMovieCalidad()->where("movie_id",$this->movie->id)->get();
        $calidad = array();
        foreach ($movieCalidad as $idx => $unaMovieCalidad) {
            $calidad[$idx] = $unaMovieCalidad->getCalidad($unaMovieCalidad->calidad_id);
        }
        return view("layouts.movies.detalle",["movie"=>$this->movie,"genero"=>$genero->gen_nombre,"movieCalidad"=>$movieCalidad,"calidad"=>$calidad]);
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

        if(!empty($this->movie->getMovieCalidad())){
            $movieCalidad = $this->movie->getMovieCalidad()->where("movie_id",$id)->get();
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
        //die(json_encode($request->all()));
        $this->movie->fill($request->all())->save();//Actualizar la pelicula
        $resolucion = explode("|",$request["hdn_calidad"]);
        unset($resolucion[count($resolucion) -1]);
        foreach ($resolucion as $unaResol) {//Actualizar la(s) calidads de la pelicula
            $unaResol = explode("-",$unaResol);
            $movieCalidad = MovieCalidad::where("movie_id","=",$id,"and")->where("calidad_id","=",$unaResol[0])->first();
            if(empty($movieCalidad)){
               $movieCalidad = new MovieCalidad();
               $movieCalidad->calidad_id=$unaResol[0]; //id de la resolucion
                $movieCalidad->resolucion=$unaResol[2]; //tamaño de resolucion
                $movieCalidad->size=$unaResol[3]; //size 
                $movieCalidad->formato=$unaResol[4]; //formato    
                $movieCalidad->movie_id = $id;
            }else{
                $movieCalidad->calidad_id=$unaResol[0]; //id de la resolucion
                $movieCalidad->resolucion=$unaResol[2]; //tamaño de resolucion
                $movieCalidad->size=$unaResol[3]; //size 
                $movieCalidad->formato=$unaResol[4]; //formato    
            }
            $movieCalidad->save();
        }

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
