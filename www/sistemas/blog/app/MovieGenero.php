<?php

namespace Cinema;

use Illuminate\Database\Eloquent\Model;

class MovieGenero extends Model
{
    protected $table="movie_genero";

    protected $fillable = ["movie_id","genero_id"];
    public $timestamps = false;

}
