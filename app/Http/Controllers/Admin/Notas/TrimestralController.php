<?php

namespace App\Http\Controllers\Admin\Notas;

use App\Http\Controllers\Controller;
use App\Models\AsignaturaGradoSeccion;
use App\Models\Catalogo;
use App\Models\Matricula;
use App\Models\PersonalAsignatura;
use App\Models\Registro;
use Illuminate\Http\Request;

class TrimestralController extends Controller
{
    public function show($id)
    {
    	$personal_asignatura = PersonalAsignatura::find($id);
    	$asignatura = $personal_asignatura->nombre_area;
    	$asignatura .= ' / '.$personal_asignatura->nombre_asignatura;
    	$idasignaturagradoseccion = $personal_asignatura->idasignaturagradoseccion;
    	$ags = AsignaturaGradoSeccion::find($idasignaturagradoseccion);
        #Obtengo todos los alumnos matriculados en este grado seccion
    	$matricula = Matricula::select('id')->where('idgradoseccion',$ags->idgradoseccion)
    							->where('idtipo',EstadoId('TIPO MATRICULA','Activa'))
    							->get();
        #Periodo academico
        $periodo = Catalogo::Table('PERIODO ACADEMICO')->activo()->first();
        #Verifico si existen registros
        $data = Registro::whereIn('idmatricula',$matricula->toArray())
                                            ->where('idpersonalasignatura',$id)
                                            ->where('idperiodoacademico',$periodo->id)
                                            ->get();
        if ($data->count() == 0) {
            $matricula = $matricula->transform(function ($item, $key)use($id,$periodo) {
                                Registro::create([
                                    'idmatricula'=>$item->id,
                                    'idperiodoacademico'=>$periodo->id,
                                    'idpersonalasignatura'=>$id
                                    ]);
                            });
        }
        $practicaresumen = Registro::whereIn('idmatricula',$matricula->toArray())
                                            ->where('idpersonalasignatura',$id)
                                            ->where('idperiodoacademico',$periodo->id)
                                            ->get();
    	return view('admin.notas.trimestral.show',compact('asignatura','practicaresumen'));
    }
}
