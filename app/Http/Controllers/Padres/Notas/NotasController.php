<?php

namespace App\Http\Controllers\Padres\Notas;

use App\Http\Controllers\Controller;
use App\Models\AlumnoFamiliar;
use App\Models\Familiar;
use App\Models\Matricula;
use App\Models\Registro;
use Auth;
use Illuminate\Http\Request;
class NotasController extends Controller
{
    public function index()
    {
    	$idusuario = Auth::user()->id;
    	$idfamiliar = Familiar::where('idusuario',$idusuario)->first()->id;
    	$idsalumnos = AlumnoFamiliar::select('idalumno')->where('idfamiliar',$idfamiliar)->get();
    	$matricula = Matricula::select('id')->whereIn('idalumno',$idsalumnos->toArray())
    							->where('idtipo',EstadoId('TIPO MATRICULA','Activa'))
    							->get();
    	$Lista = Registro::whereIn('idmatricula',$matricula->toArray())->get();
    	return view('padres.notas.trimestral.index',compact('Lista'));
    }
}
