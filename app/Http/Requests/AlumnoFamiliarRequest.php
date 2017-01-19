<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlumnoFamiliarRequest extends FormRequest
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
            'idfamiliar'=>'required'
        ];
    }
    public function messages()
    {
        return[
            'idfamiliar.required'=>'No escogio el familiar a guardar'
        ];
    }
}
