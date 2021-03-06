<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservaPsicologicaRequest extends FormRequest
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
            'persona'=>'required|max:200',
            'idgrado'=>'required',
            'motivo'=>'required',
            'fecha'=>'required',
            'idpersonal'=>'required',

        ];
    }
    public function messages()
    {
        return[
            'idgrado.required'=>'El campo grado es obligatorio',
            'idpersonal.required'=>'El campo personal es obligatorio',
        ];
    }
}
