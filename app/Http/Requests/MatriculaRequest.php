<?php

namespace App\Http\Requests;

use App\Models\Alumno;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class MatriculaRequest extends FormRequest
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
        $data = Request::all();
        $alumno = Alumno::find($data['idalumno']);
        $gradoautorizado = $alumno->idgrado +1;
        $gradoseccion = GradoSeccion::select('id')->where('idgrado',$gradoautorizado)->get();
        dd($gradoseccion);
        return [
            'idalumno'=>'required',
            'idgrado'=>'not_in:-1|in:'.$gradoautorizado
        ];
    }
    public function messages()
    {
        return[
            'idalumno.required'=>'No escogio Alumno',
            'idgrado.not_in'=>'No escogio Grado',
            'idgrado.in'=>'No esta permitido la matricula en este grado',
        ];
    }
}
