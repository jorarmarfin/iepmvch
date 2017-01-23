<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlumnoRequest extends FormRequest
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
            'fechanacimiento'=>'required',
            'dni'=>'required',
            'idgrado'=>'required|not_in:-1',
        ];
    }
    public function messages()
    {
        return[
            'fechanacimiento.required'=>'Su fecha de nacimiento es obligatorio',
            'dni.required'=>'Su número de DNI es obligatorio',
            'idgrado.not_in'=>'El grado del alumno es obligatorio'
        ];
    }
}