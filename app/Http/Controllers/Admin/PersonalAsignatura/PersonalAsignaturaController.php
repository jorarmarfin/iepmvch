<?php

namespace App\Http\Controllers\Admin\PersonalAsignatura;

use App\Http\Controllers\Controller;
use App\Models\AsignaturaGradoSeccion;
use App\Models\PersonalAsignatura;
use Illuminate\Http\Request;
use Styde\Html\Facades\Alert;

class PersonalAsignaturaController extends Controller
{
    public function index()
    {
    	$Lista = PersonalAsignatura::all();
    	return view('admin.docenteasignatura.index',compact('Lista'));
    }
    public function store(Request $request)
    {
        $idpersonal = $request->input('idpersonal');
        $data = $request->input('idasignaturagradoseccion');
        if (is_null($data)) {
            $idgradoseccion = $request->input('idgradoseccion');
            $data = AsignaturaGradoSeccion::select('id')->where('idgradoseccion',$idgradoseccion)->get();

            foreach ($data as $key => $ags) {
                PersonalAsignatura::create(['idpersonal'=>$idpersonal,'idasignaturagradoseccion'=>$ags->id]);
            }
        }else{
            foreach ($data as $key => $value) {
                PersonalAsignatura::create(['idpersonal'=>$idpersonal,'idasignaturagradoseccion'=>$value]);
            }
        }

        Alert::success('Personal asignatura registrado con exito');
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
}
