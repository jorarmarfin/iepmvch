<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FamiliarRequest extends FormRequest
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
            'paterno'=>'required',
            'materno'=>'required',
            'nombres'=>'required',
            'dni'=>'required|numeric',
            'fechanacimiento'=>'required',
            'autorizo'=>'required',
            'esapoderado'=>'required',
            'idtipo'=>'required|not_in:-1',
            'email'=>'required|unique:familiar,email'
        ];
    }
    public function messages()
    {
        return[
            'paterno.required'=>'El apellido paterno es obligatorio',
            'materno.required'=>'El apellido materno es obligatorio',
            'nombres.required'=>'Los nombres son obligatorios',
            'dni.required'=>'El DNI del padre es obligatorio',
            'dni.numeric'=>'El DNI solo debe ser numeros',
            'fechanacimiento.required'=>'La fecha de nacimiento es obligatoria',
            'esapoderado.required'=>'El campo apoderado es obligatorio',
            'autorizo.required'=>'La autorizacion de sus datos es obligatorio',
            'idtipo.not_in'=>'El tipo de familiar es obligatorio'
        ];
    }

}
