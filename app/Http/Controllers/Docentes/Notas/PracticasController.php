<?php

namespace App\Http\Controllers\Docentes\Notas;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateNotasRequest;
use App\Models\AsignaturaGradoSeccion;
use App\Models\Catalogo;
use App\Models\Matricula;
use App\Models\PersonalAsignatura;
use App\Models\PracticaResumen;
use App\Models\Registro;
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
    	$ags = AsignaturaGradoSeccion::find($idasignaturagradoseccion);
        #Obtengo todos los alumnos matriculados en este grado seccion
    	$matricula = Matricula::select('id')->where('idgradoseccion',$ags->idgradoseccion)
    							->where('idtipo',EstadoId('TIPO MATRICULA','Activa'))
    							->get();
        #Periodo academico
        $periodo = Catalogo::Table('PERIODO ACADEMICO')->activo()->first();
        #Verifico si existen registros
        $practicaresumen = Registro::whereIn('idmatricula',$matricula->toArray())
                                            ->where('idpersonalasignatura',$id)
                                            ->where('idperiodoacademico',$periodo->id)
                                            ->get();
        if ($practicaresumen->count() == 0) {
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
    	return view('docentes.notas.practicas.show',compact('asignatura','practicaresumen'));
    }
    public function edit($periodo,$personalasignatura,$practica)
    {
        $personal_asignatura = PersonalAsignatura::find($personalasignatura);
        $asignatura = $personal_asignatura->nombre_area;
        $Registro = Registro::Practica($periodo,$personalasignatura)->get();
        return view('docentes.notas.practicas.edit',compact('Registro','Practica','asignatura'));

    }
    public function notas(Request $request)
    {
        $data = $request->all();
        dd($data);
        #foreach ($data as $key => $item) {
        #    Registro::where('id',$item['id'])->update(['p01'=>$item['p01']]);
        #}
        #return redirect()->back();
    }
}
