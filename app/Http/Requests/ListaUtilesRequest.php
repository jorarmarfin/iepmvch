<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ListaUtilesRequest extends FormRequest
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
            'idgrado'=>'required|not_in:-1|unique:lista_utiles',
            'file'=>'required'
        ];
    }
    public function messages()
    {
        return[
            'idgrado.not_in'=>'No escogio el grado ',
            'idgrado.unique'=>'Ya existe una Lista en este grado',
            'file.required'=>'No escogio el Archivo'
        ];
    }
}
