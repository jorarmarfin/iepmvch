<?php

namespace App\Http\Controllers\Docentes\Notas;

use Alert;
use App\Http\Controllers\Controller;
use App\Models\Catalogo;
use App\Models\EvaluacionPadre;
use App\Models\Matricula;
use App\Models\Personal;
use App\Models\PersonalGrado;
use Auth;
use Illuminate\Http\Request;
class PadresController extends Controller
{
	public function index()
	{
		$personal = Personal::select('id')->where('idusuario',Auth::user()->id)->first();
		$tutor = PersonalGrado::where('idpersonal',$personal->id)->first();
		$Lista = Matricula::where('idgradoseccion',$tutor->idgrado)
    							->where('idtipo',EstadoId('TIPO MATRICULA','Activa'))
    							->get();
    	return view('docentes.notas.padres.index',compact('Lista'));
	}
    public function show($trimestre)
    {
    	$personal = Personal::select('id')->where('idusuario',Auth::user()->id)->first();
    	$tutor = PersonalGrado::where('idpersonal',$personal->id)->first();
    	if(isset($tutor)){
    		$matricula = Matricula::select('id')->where('idgradoseccion',$tutor->idgrado)
    							->where('idtipo',EstadoId('TIPO MATRICULA','Activa'))
    							->get();
    		#Periodo academico
        	$periodos = Catalogo::Table('PERIODO ACADEMICO')->get();
        	foreach ($periodos as $key => $periodo) {
	            #Verifico si existen registros
	            $evaluacionpadres = EvaluacionPadre::whereIn('idmatricula',$matricula->toArray())
	                                                ->where('idperiodoacademico',$periodo->id)
	                                                ->get();
	            if ($evaluacionpadres->count() == 0) {
	                $matricula->each(function ($item, $key)use($periodo) {
	                                    EvaluacionPadre::create([
	                                        'idmatricula'=>$item->id,
	                                        'idperiodoacademico'=>$periodo->id,
	                                        ]);
	                                });
	            }
	        }
	        $evaluacionpadres = EvaluacionPadre::whereIn('idmatricula',$matricula->toArray())
                                            ->where('idperiodoacademico',$periodos[$trimestre-1]->id)
                                            ->get();
                                            dd($evaluacionpadres);
            return view('docentes.notas.padres.show',compact('evaluacionpadres'));
    	}

    }
    public function store(Request $request)
    {

    }
}
