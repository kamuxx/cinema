<?php

namespace Cinema;

use Illuminate\Database\Eloquent\Model;

class MovieCalidad extends Model
{
    protected $table="movie_calidad";

    protected $fillable = ["movie_id","calidad_id"];
    public $timestamps = false;
}
