<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ListaUtilesRequest;
use App\Models\ListaUtiles;
use Illuminate\Http\Request;
use Styde\Html\Facades\Alert;

class ListaUtilesController extends Controller
{
	/**
	 * Inicio del modulo
	 * @return [type] [description]
	 */
    public function index()
    {
    	$Lista = ListaUtiles::all();
    	return view('admin.listautiles.index',compact('Lista'));
    }
    /**
     * Guarda datos
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function store(ListaUtilesRequest $request)
    {
    	$data = $request->all();
    	if ($request->hasFile('file')) {
            $data['observacion'] = $request->file('file')->store('listautiles','public');
        }
        Alert::success('Archivo Cargado con exito');
        ListaUtiles::create($data);
        return back();
    }
}
