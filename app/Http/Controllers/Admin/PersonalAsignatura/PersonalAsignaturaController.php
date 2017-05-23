<?php

namespace App\Http\Controllers\Admin\PersonalAsignatura;

use App\Http\Controllers\Controller;
use App\Http\Requests\PersonalAsignaturaRequest;
use App\Models\AsignaturaGradoSeccion;
use App\Models\PersonalAsignatura;
use Illuminate\Http\Request;
use Styde\Html\Facades\Alert;

class PersonalAsignaturaController extends Controller
{
    public function index()
    {
    	$Lista = PersonalAsignatura::orderBy('id','asc')->get();
    	return view('admin.docenteasignatura.index',compact('Lista'));
    }
    public function store(PersonalAsignaturaRequest $request)
    {
        $idpersonal = $request->input('idpersonal');
        $data = $request->input('personal_asignatura');
        foreach ($data as $key => $item) {
            PersonalAsignatura::where('id',$item)->update(['idpersonal'=>$idpersonal]);
        }


        Alert::success('Personal asignatura registrado con exito');
        return redirect()->route('admin.personalasignatura.index');
    }
    public function importargradoarea()
    {
        $sw = PersonalAsignatura::all();
        if ($sw->isEmpty()) {
            $gradoarea = AsignaturaGradoSeccion::select('id')->Activo()->get()->toArray();
            foreach ($gradoarea as $key => $item) {
                PersonalAsignatura::create(['idasignaturagradoseccion'=>$item['id']]);
            }
            Alert::success('Areas y Grados improtados con exito');
        } else {
            Alert::warning('No se puede importar dos veces');
        }
        return redirect()->route('admin.personalasignatura.index');
    }
    public function delete($id)
    {
        PersonalAsignatura::destroy($id);
        Alert::success('Personal asignatura eliminado con exito');
        return redirect()->route('admin.personalasignatura.index');
    }
    public function combo($idgradoseccion)
    {
    	$ags = AsignaturaGradoSeccion::ObtenGrado($idgradoseccion)->get();
    	return $ags;
    }
    public function comboarea($idgradoseccion)
    {
    	$area = AsignaturaGradoSeccion::ObtenAreas($idgradoseccion)->get();

    	return $area;
    }
}
