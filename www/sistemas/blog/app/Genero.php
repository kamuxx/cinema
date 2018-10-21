<?php

namespace Cinema;

use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    protected $table= "genero";

    protected $fillable = ['gen_nombre'];
    public $timestamps = false;
}
