<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCapacidadRequest extends FormRequest
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
            'idperiodoacademico'=>'required',
            'nombre'=>'required'
        ];
    }
    public function messages()
    {
        return[
            'idperiodoacademico.required'=>'No escogio periodo academico',
            'nombre.required'=>'No ingreso capacidad',
        ];
    }
}
