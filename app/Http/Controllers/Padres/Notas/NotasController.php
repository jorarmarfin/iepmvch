<?php

namespace App\Http\Controllers\Padres\Notas;

use App\Http\Controllers\Controller;
use App\Models\Alumno;
use App\Models\AlumnoFamiliar;
use App\Models\Catalogo;
use App\Models\Familiar;
use App\Models\Matricula;
use App\Models\Registro;
use Auth;
use Illuminate\Http\Request;
class NotasController extends Controller
{
    public function index()
    {
    	#$idusuario = Auth::user()->id;
    	#$idfamiliar = Familiar::where('idusuario',$idusuario)->first()->id;
    	#$idsalumnos = AlumnoFamiliar::select('idalumno')->where('idfamiliar',$idfamiliar)->get();
    	#$matricula = Matricula::select('id')->whereIn('idalumno',$idsalumnos->toArray())
    	#						->where('idtipo',EstadoId('TIPO MATRICULA','Activa'))
    	#						->get();
    	#$Lista = Registro::whereIn('idmatricula',$matricula->toArray())->get();
    	#return view('padres.notas.trimestral.index',compact('Lista'));
        $periodos = Catalogo::select('id','nombre')->Table('PERIODO ACADEMICO')->get();
        return view('padres.notas.index',compact('periodos'));
    }
    public function estudiante($trimestre)
    {
        $idusuario = Auth::user()->id;
        $idfamiliar = Familiar::where('idusuario',$idusuario)->first()->id;
        $idsalumnos = AlumnoFamiliar::select('idalumno')->where('idfamiliar',$idfamiliar)->get();
        $Estudiantes = Alumno::whereIn('id',$idsalumnos)->get();
        return view('padres.notas.estudiante',compact('Estudiantes','trimestre'));
    }
    public function tiponota($trimestre,$idalumno)
    {
        return view('padres.notas.tiponotas',compact('idalumno','trimestre'));
    }
    public function mostrarnota($trimestre,$idalumno,$tiponota)
    {
        $matricula = Matricula::select('id')->where('idalumno',$idalumno)
                               ->where('idtipo',EstadoId('TIPO MATRICULA','Activa'))
                               ->first();
        $Lista = Registro::where('idmatricula',$matricula->id)
                         ->where('idperiodoacademico',$trimestre)
                         ->get();
        switch ($tiponota) {
            case 'Trimestral':
                return view('padres.notas.trimestral.index',compact('Lista'));
                break;
            case 'Practica':
                return view('padres.notas.practicas.index',compact('Lista'));
                break;

            default:
                break;
        }
        //return view('padres.notas.tiponotas',compact('id'));
    }
}
