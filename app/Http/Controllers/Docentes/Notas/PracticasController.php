<?php

namespace App\Http\Controllers\Docentes\Notas;

use App\Http\Controllers\Controller;
use App\Models\AsignaturaGradoSeccion;
use App\Models\Matricula;
use App\Models\PersonalAsignatura;
use App\Models\PracticaResumen;
use Illuminate\Http\Request;

class PracticasController extends Controller
{
    public function index()
    {
    	$Lista = PersonalAsignatura::Asignaturas()->get();
    	return view('docentes.notas.practicas.index',compact('Lista'));
    }
    public function show($id)
    {
    	$personal_asignatura = PersonalAsignatura::find($id);
    	$asignatura = $personal_asignatura->nombre_area;
    	$asignatura .= ' / '.$personal_asignatura->nombre_asignatura;
    	$idasignaturagradoseccion = $personal_asignatura->idasignaturagradoseccion;
    	$ags = AsignaturaGradoSeccion::find($personal_asignatura->idasignaturagradoseccion);
    	$matricula = Matricula::select('id')->where('idgradoseccion',$ags->idgradoseccion)
    							->where('idtipo',EstadoId('TIPO MATRICULA','Activa'))
    							->get();
    	$practicaresumen = PracticaResumen::whereIn('idmatricula',$matricula->toArray())
    										->where('idasignaturagradoseccion',$idasignaturagradoseccion)
    										->get();

    	if ($practicaresumen->count() == 0) {
    		$matricula = $matricula->transform(function ($item, $key)use($idasignaturagradoseccion) {
    							PracticaResumen::create([
    								'idmatricula'=>$item->id,
    								'idasignaturagradoseccion'=>$idasignaturagradoseccion
    								]);
							});
    	}
    	$practicaresumen = PracticaResumen::whereIn('idmatricula',$matricula->toArray())
    										->where('idasignaturagradoseccion',$idasignaturagradoseccion)
    										->get();

    	return view('docentes.notas.practicas.show',compact('asignatura','practicaresumen'));
    }
}
