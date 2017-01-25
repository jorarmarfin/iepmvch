<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonalRequest extends FormRequest
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
            'dni'=>'required|unique:personal',
            'email'=>'required|unique:personal',
            'fechanacimiento'=>'required',
            'numerohijos'=>'required',
            'fechaegreso'=>'required',
            /*
            'idestadocivil'=>'required',
            'idsexo'=>'required',
            'idpais'=>'required',
            'idubigeonacimiento'=>'required',
            'idubigeo'=>'required',
            'direccion'=>'required',
            'telefonofijo'=>'required',
            'celular'=>'required',
            'universidad'=>'required',
            'culmino'=>'required',
            'carrera'=>'required',
            'idgestionuniversidad'=>'required',
            'gradoobtenido'=>'required',
            'numerocolegiatura'=>'required',*/
        ];
    }
    /**
     * Personalizo los mensajes
     * @param  string $value [description]
     * @return [type]        [description]
     */
    public function messages()
    {
        return[
            'paterno.required'=>'El campo Apellido paterno es obligatorio',
            'dni.unique'=>'Este DNI ya esta registrado en el sistema',
            'fechanacimiento.required'=>'El campo fecha de nacimiento es obligatorio',
            'fechaegreso.required'=>'El campo fecha de egreso es obligatorio',
        ];
    }
}
