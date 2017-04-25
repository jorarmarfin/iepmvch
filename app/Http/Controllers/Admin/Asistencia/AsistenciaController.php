<?php

namespace App\Http\Controllers\Admin\Asistencia;

use App\Http\Controllers\Controller;
use App\Http\Requests\AsistenciaRequest;
use App\Models\Asistencia;
use App\Models\Matricula;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Styde\Html\Facades\Alert;
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
	    	$alumnos = Matricula::select('id as idmatricula',DB::raw("'$date' as fecha,".EstadoId('ESTADO ASISTENCIA','Asistio')." as idestado"))
	    						->where('idgradoseccion',$request->get('idgradoseccion'))
                                ->whereDate('created_at','<=',$date)
                                ->where('idtipo','<>',EstadoId('TIPO MATRICULA','Retirada'))
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
    public function show($id)
    {
        $asistencia = Asistencia::find($id);
        $date = $asistencia->fecha;
        $asistencia->delete();
        $Lista = Asistencia::where('fecha',$date)
                            ->where('idtipo','<>',EstadoId('TIPO MATRICULA','Retirada'))
                            ->get();
        Alert::success('Asistencia eliminado con exito');
        return view('admin.asistencia.index',compact('Lista'));
    }
}
