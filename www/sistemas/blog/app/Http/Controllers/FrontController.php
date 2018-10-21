<?php

namespace Cinema\Http\Controllers;

use Illuminate\Http\Request;

use Cinema\Http\Requests;
use Cinema\Http\Controllers\Controller;
use Cinema\Movie;

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peliculas =  Movie::getMovies();
        return view("index",compact("peliculas"));
    }

    public function contacto(){
        return view("contacto");
    }

    public function reviews(){
        return view("reviews");
    }
}
