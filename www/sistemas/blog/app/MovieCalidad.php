<?php

namespace Cinema;

use Illuminate\Database\Eloquent\Model;
use Cinema\Calidad;
class MovieCalidad extends Model
{
    protected $table="movie_calidad";

    protected $fillable = ["movie_id","calidad_id"];
    public $timestamps = false;

    public function getCalidad($id){
    	return Calidad::find($id);
    }
}
