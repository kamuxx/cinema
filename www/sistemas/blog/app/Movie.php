<?php

namespace Cinema;

use Illuminate\Database\Eloquent\Model;
use Cinema\MovieGenero;
use Cinema\MovieCalidad;
use Cinema\Genero;
use Cinema\User;
use Carbon\Carbon;
use DB;

class Movie extends Model
{
    protected $table = "movie";

    protected $fillable = ["nombre","sinopsis","duracion","trailer","year","imagen","nombre_latino","idioma"];

    public $timestamps = false;

    public function getMovieCalidad() {
    	return $this->hasMany('Cinema\MovieCalidad');    
	}

	public function getGenero() {
    	return $this->hasMany('Cinema\MovieGenero');    
	}

	public function setImagenAttribute($path){
		$this->attributes["imagen"] = Carbon::now()->second.$path->getClientOriginalName();
		$name = Carbon::now()->second.$path->getClientOriginalName();
		\Storage::disk('local')->put($name,\File::get($path));
	}

	public static function getMovies($id = null){
		return DB::table("movie")
			->join('movie_genero',"movie_genero.movie_id","=","movie.id")
			->join('movie_calidad',"movie_calidad.movie_id","=","movie.id")
			->join('genero','genero.id','=',"movie_genero.genero_id")
			->join('calidad','calidad.id','=',"movie_calidad.calidad_id")
			->select("movie.*","genero.gen_nombre as genero","calidad.nombre as calidad")
			->get();
	}

	public static function getMoviesByName($nombre = null){
		return DB::table("movie")
			->join('movie_genero',"movie_genero.movie_id","=","movie.id")
			->join('movie_calidad',"movie_calidad.movie_id","=","movie.id")
			->join('genero','genero.id','=',"movie_genero.genero_id")
			->join('calidad','calidad.id','=',"movie_calidad.calidad_id")
			->select("movie.*","genero.gen_nombre as genero","calidad.nombre as calidad")
			->where("movie.nombre",$nombre)
			->first();
	}

}
