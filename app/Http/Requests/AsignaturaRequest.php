<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AsignaturaRequest extends FormRequest
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
            'nombre'=>'required',
            'idarea'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'nombre.required'=>'El nombre de la asignatura es obligatorio',
            'idarea.required'=>'El area de la asignatura es obligatoria',
        ];
    }
}
