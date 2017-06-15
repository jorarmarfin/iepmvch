<?php

namespace App\Http\Controllers\Docentes\Capacidades;

use Alert;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCapacidadRequest;
use App\Models\Capacidad;
use App\Models\CapacidadDetalle;
use App\Models\PersonalAsignatura;
use Illuminate\Http\Request;
class CapacidadesController extends Controller
{
    public function index()
    {
    	$Lista = PersonalAsignatura::Asignaturas()->get();
    	return view('docentes.capacidades.index',compact('Lista'));
    }
    public function show($id)
    {
    	$personalasignatura = PersonalAsignatura::find($id);
    	$Lista = Capacidad::where('idpersonalasignatura',$personalasignatura->id)->orderBy('id')->get();
    	return view('docentes.capacidades.show',compact('personalasignatura','Lista'));
    }
    public function store(CreateCapacidadRequest $request)
    {
        $cantidad = Capacidad::where('idperiodoacademico',$request->input('idperiodoacademico'))
                             ->where('idpersonalasignatura',$request->input('idpersonalasignatura'))->count();
        if($cantidad<4){
            Capacidad::create($request->all());
            Alert::success('Capacidad registrada con exito');
        }else{
            Alert::success('No puede agregar mas capacidades para ester trimestre');
        }
    	return redirect()->route('docentes.capacidades.show',$request->input('idpersonalasignatura'));
    }
    public function edit($id)
    {
    	$capacidad = Capacidad::find($id);
    	$personalasignatura = PersonalAsignatura::find($capacidad->idpersonalasignatura);
    	return view('docentes.capacidades.edit',compact('capacidad','personalasignatura'));
    }
    public function update(CreateCapacidadRequest $request,$id)
    {
    	$capacidad = Capacidad::find($id);
    	$capacidad->fill($request->all());
    	$capacidad->save();
    	Alert::success('Capacidad actualziada con exito');
    	return redirect()->route('docentes.capacidades.show',$capacidad->idpersonalasignatura);
    }
    public function delete($id)
    {
        $indicadores = CapacidadDetalle::where('idcapacidad',$id)->count();
        if ($indicadores>0) {
            Alert::danger('No se puede eliminar esta capacidad')
                 ->items([
                    'Primero: Eliminar todos los indicadores de esta capacidad',
                    'Segundo: Eliminar esta capacidad',
                    ]);
            return back();
        } else {
            Capacidad::destroy($id);
            Alert::success('Capacidad eliminada con exito');
            return back();
        }

    }
}
