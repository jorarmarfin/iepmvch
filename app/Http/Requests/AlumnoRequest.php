<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Routing\Route;

class AlumnoRequest extends FormRequest
{
    private $route;

    function __construct(Route $route)
    {

        $this->route = $route;
    }
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
            'fechanacimiento'=>'required',
            'dni'=>'required|numeric|unique:alumno,dni'.$this->route->getParameter('alumno'),
            'idgrado'=>'required|not_in:-1',
            'telefonos'=>'max:100',
            'telefonoemergencia1'=>'max:100',
            'telefonoemergencia2'=>'max:100',
        ];
    }
    public function messages()
    {
        return[
            'fechanacimiento.required'=>'Su fecha de nacimiento es obligatorio',
            'dni.required'=>'Su número de DNI es obligatorio',
            'dni.numeric'=>'El DNI solo debe ser numeros',
            'idgrado.not_in'=>'El grado del alumno es obligatorio',
            'telefonos.max'=>'Solo puede ingresar maximo 100 caracteres',
            'telefonoemergencia1.max'=>'Solo puede ingresar maximo 100 caracteres',
            'telefonoemergencia2.max'=>'Solo puede ingresar maximo 100 caracteres'
        ];
    }
}
