<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Routing\Route;


class FamiliarRequest extends FormRequest
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
            'fechanacimiento'=>'required',
            'idestadocivil'=>'required|not_in:-1',
            'idtipo'=>'required|not_in:-1',
            'email'=>'required|unique:familiar,email,'.$this->route->getParameter('familiar')
        ];
    }
    public function messages()
    {
        return[
            'fechanacimiento.required'=>'Al fecha de nacimiento es obligatorio',
            'idestadocivil.not_in'=>'El estado civil es obligatorio',
            'idtipo.not_in'=>'El tipo de familiar es obligatorio'
        ];
    }

}
