<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Routing\Route;

class FamiliarUpdateRequest extends FormRequest
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
            'paterno'=>'required',
            'materno'=>'required',
            'nombres'=>'required',
            'dni'=>'required',
            'fechanacimiento'=>'required',
            'autorizo'=>'required',
            'esapoderado'=>'required',
            'idtipo'=>'required|not_in:-1',
            'email'=>'required|unique:familiar,email,'.$this->route->getParameter('familiar')
        ];
    }
    public function messages()
    {
        return[
            'paterno.required'=>'El apellido paterno es obligatorio',
            'materno.required'=>'El apellido materno es obligatorio',
            'nombres.required'=>'Los nombres son obligatorios',
            'dni.required'=>'El DNI del padre es obligatorio',
            'fechanacimiento.required'=>'La fecha de nacimiento es obligatoria',
            'esapoderado.required'=>'El campo apoderado es obligatorio',
            'autorizo.required'=>'La autorizacion de sus datos es obligatorio',
            'idtipo.not_in'=>'El tipo de familiar es obligatorio'
        ];
    }
}
