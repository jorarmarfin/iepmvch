<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Matricula;
use App\Models\PersonaAutorizada;
use Illuminate\Http\Request;
use Styde\Html\Facades\Alert;

class RetiroController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $matricula = Matricula::find($id);
        $personas_a = PersonaAutorizada::where('idalumno',$matricula->idalumno)->get();
        return view('admin.retiro.index',compact('matricula','personas_a'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        PersonaAutorizada::create($request->all());
        Alert::success('Persona autorizada registrada con exito');
        return back();
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
    	$data = $request->all();
    	if(!$request->has('retiro_solo'))$data['retiro_solo']=false;
    	if(!$request->has('retiro_hermano')){
    		$data['retiro_hermano']=false;
    		$data['retiro_hermano_nombre']=null;
    	}
    	$matricula = Matricula::find($id);
    	$matricula->fill($data);
    	$matricula->save();
        Alert::success('Datos actualizados con exito');
        return back();
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        PersonaAutorizada::destroy($id);
        Alert::success('Registro Eliminado con exito');
        return back();
    }
}
