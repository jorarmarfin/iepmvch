<?php

namespace App\Http\Controllers\Docentes\Notas;

use App\Http\Controllers\Controller;
use App\Models\AsignaturaGradoSeccion;
use App\Models\Catalogo;
use App\Models\Matricula;
use App\Models\PersonalAsignatura;
use App\Models\Registro;
use Illuminate\Http\Request;

class NotasTrimestralesController extends Controller
{
    public function show($id,$trimestre)
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
        $periodos = Catalogo::Table('PERIODO ACADEMICO')->get();
        foreach ($periodos as $key => $periodo) {

            #Verifico si existen registros
            $practicaresumen = Registro::whereIn('idmatricula',$matricula->toArray())
                                                ->where('idpersonalasignatura',$id)
                                                ->where('idperiodoacademico',$periodo->id)
                                                ->get();
            if ($practicaresumen->count() == 0) {
                $matricula->each(function ($item, $key)use($id,$periodo) {
                                    Registro::create([
                                        'idmatricula'=>$item->id,
                                        'idperiodoacademico'=>$periodo->id,
                                        'idpersonalasignatura'=>$id
                                        ]);
                                });
            }
        }
        $practicaresumen = Registro::whereIn('idmatricula',$matricula->toArray())
                                            ->where('idpersonalasignatura',$id)
                                            ->where('idperiodoacademico',$periodos[$trimestre-1]->id)
                                            ->get();


    	return view('docentes.notas.trimestral.show',compact('asignatura','practicaresumen','trimestre'));
    }
    public function ingresa(Request $request)
    {
        $data = $request->all();
        for ($i=0; $i < 3; $i++) {
            $trimestre = 'p_t_'.($i+1);
            if($request->has($trimestre)){
                foreach ($data[$trimestre] as $key => $item) {
                    Registro::where('id',$data['id'][$key])->update([$trimestre=>trim($item)]);
                }
            }
        }
        return back();
    }
    public function edit($periodo,$personalasignatura,$practica)
    {
        $personal_asignatura = PersonalAsignatura::find($personalasignatura);
        $asignatura = $personal_asignatura->nombre_area;
        $Registro = Registro::Practica($periodo,$personalasignatura)->get();
        return view('docentes.notas.trimestral.edit',compact('Registro','Practica','asignatura'));

    }
    public function notas(Request $request)
    {
        $data = $request->all();
        $id = $data['id'];
        $notas = $data['t01'];
        foreach ($id as $key => $item)  {
           Registro::where('id',$item)->update(['p_t_1'=>$notas[$key]]);
        }
        $registro = Registro::find($id[0]);
        $id = $registro->idpersonalasignatura;
        return redirect()->route('docentes.trimestral.show',$id);
    }
}
