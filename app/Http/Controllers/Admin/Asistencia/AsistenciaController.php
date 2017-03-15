<?php

namespace App\Http\Controllers\Admin\Asistencia;

use App\Http\Controllers\Controller;
use App\Http\Requests\AsistenciaRequest;
use App\Models\Asistencia;
use App\Models\Matricula;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
class AsistenciaController extends Controller
{
    public function index()
    {
    	$Lista = [];
    	return view('admin.asistencia.index',compact('Lista'));
    }
    public function store(AsistenciaRequest $request)
    {
    	$asistencia = Asistencia::where('fecha',$request->get('fecha'))->get();
    	if ($asistencia->count()>0) {
    		$Lista = $asistencia;
    		return view('admin.asistencia.index',compact('Lista'));
    	}else{
    		$fecha = $request->get('fecha');
    		$date = Carbon::createFromFormat('Y-m-d',$fecha)->toDateString();
	    	$alumnos = Matricula::select('id as idmatricula',DB::raw("'$date' as fecha"))
	    						->where('idgradoseccion',$request->get('idgradoseccion'))
	    						->get();
	    	Asistencia::insert($alumnos->toArray());
	    	$Lista = Asistencia::where('fecha',$fecha)->get();
    		return view('admin.asistencia.index',compact('Lista'));
    	}
    }
    public function estado($id,$idestado)
    {
    	$asistencia = Asistencia::find($id);
    	$asistencia->idestado = $idestado;
    	$asistencia->save();

    	$Lista = Asistencia::where('fecha',$asistencia->fecha)->get();
    	return view('admin.asistencia.index',compact('Lista'));
    }
}
