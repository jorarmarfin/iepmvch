<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Serie;
use DB;
use Illuminate\Http\Request;
use Styde\Html\Facades\Alert;
class SerieController extends Controller
{
	/**
	 * Funcion del inicio
	 * @return [type] [description]
	 */
    public function index()
    {
    	$Lista = Serie::all();
    	return view('admin.serie.index',compact('Lista'));
    }
    /**
     * Crear una serie
     * @return [type] [description]
     */
    public function create()
    {
    	return view('admin.serie.create');
    }
    public function store(Request $request)
    {
    	$data = $request->all();
    	$data['prefijo'] = strtoupper($data['prefijo']);
    	$serie = Serie::create($data);
    	if($serie->id>0){
    		$sql = "
    		create sequence $serie->nombre  start with $serie->numero;
    		";
    		if(DB::statement($sql)){
    			Alert::success('Serie creada con exito');
    			return redirect()->route('admin.serie.index');
    		}

    	};
    }
}
