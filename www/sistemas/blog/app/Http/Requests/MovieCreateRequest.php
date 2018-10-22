<?php

namespace Cinema\Http\Requests;

use Cinema\Http\Requests\Request;

class MovieCreateRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "nombre"=>"required|unique:movie",
            "nombre_latino"=>"required",
            "sinopsis"=>"required",
            "duracion"=>"required",
            "trailer"=>"required",
            "year"=>"required",
            "idioma" =>"required"
            "calidad"=>"required",
            "genero"=>"required"
        ];
    }
}
