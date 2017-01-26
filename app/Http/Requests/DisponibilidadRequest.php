<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DisponibilidadRequest extends FormRequest
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
            'idpersonal'=>'required',
            'iddia'=>'required',
            'inicio'=>'required',
            'fin'=>'required'
        ];
    }
    public function messages()
    {
        return[
            'idpersonal.required'=>'No escogio Personal',
            'iddia.required'=>'No esocgio Día',
            'inicio.required'=>'No coloco la hora de inicio',
            'fin.required'=>'No coloco la hora de fin'
        ];
    }
}
