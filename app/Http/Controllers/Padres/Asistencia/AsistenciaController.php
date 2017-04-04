<?php

namespace App\Http\Controllers\Padres\Asistencia;

use App\Http\Controllers\Controller;
use App\Models\Alumno;
use App\Models\AlumnoFamiliar;
use App\Models\Familiar;
use Illuminate\Http\Request;
use Auth;
class AsistenciaController extends Controller
{
    public function index()
    {
    	$familiar = Familiar::where('idusuario',Auth::user()->id)->first();
    	$alumnos = AlumnoFamiliar::select('idalumno')->where('idfamiliar',$familiar->id)->get();
    	$hijos = Alumno::whereIn('id',$alumnos->toArray())->get();
    	return view('padres.asistencia.index',compact('hijos'));
    }
    public function hijos($id)
    {

    }
}
