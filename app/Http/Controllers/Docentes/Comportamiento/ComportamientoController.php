<?php

namespace App\Http\Controllers\Docentes\Comportamiento;

use App\Http\Controllers\Controller;
use App\Models\Catalogo;
use App\Models\Comportamiento;
use App\Models\Matricula;
use App\Models\Personal;
use Auth;
use Illuminate\Http\Request;
class ComportamientoController extends Controller
{
    public function index()
    {
    	$periodos = Catalogo::select('id','nombre')->Table('PERIODO ACADEMICO')->get();
        return view('docentes.notas.comportamiento.index',compact('periodos'));
    }
    public function grado($trimestre)
    {
    	$grados = Personal::select('gs.id','g.nombre')
    						->join('personal_asignatura as pa','pa.idpersonal','=','personal.id')
    						->join('asignatura_grado_seccion as ags','ags.id','=','pa.idasignaturagradoseccion')
    						->join('grado_seccion as gs','gs.id','=','ags.idgradoseccion')
    						->join('grado as g','g.id','=','gs.idgrado')
    						->where('personal.idusuario',Auth::user()->id)
    						->groupBy(['gs.id','g.nombre'])
    						->orderBy('g.nombre')
    						->get();
    	return view('docentes.notas.comportamiento.grados',compact('trimestre','grados'));
    }
    public function alumnos($trimestre,$grado)
    {
    	$matricula = Matricula::select('id')->where('idgradoseccion',$grado)
    							->where('idtipo',EstadoId('TIPO MATRICULA','Activa'))
    							->get();

    	#verifico si existen
    	$comportamiento = Comportamiento::where('idperiodoacademico',$trimestre)
    									->whereIn('idmatricula',$matricula->toArray())
    									->get();
    	if ($comportamiento->count() == 0) {
            $matricula->each(function ($item, $key)use($trimestre) {
                                Comportamiento::create([
                                    'idmatricula'=>$item->id,
                                    'idperiodoacademico'=>$trimestre
                                    ]);
                            });
        }
        $comportamiento = Comportamiento::whereIn('idmatricula',$matricula->toArray())
                                            ->where('idperiodoacademico',$trimestre)
                                            ->get();

    	return view('docentes.notas.comportamiento.alumnos',compact('trimestre','grado','comportamiento'));
    }
}
