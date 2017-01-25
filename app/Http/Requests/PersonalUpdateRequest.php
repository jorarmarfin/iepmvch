<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Routing\Route;
class PersonalUpdateRequest extends FormRequest
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
            'dni'=>'required|unique:personal,dni,'.$this->route->getParameter('personal'),
            'email'=>'required|unique:familiar,email,'.$this->route->getParameter('personal')
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
        ];
    }
}
