<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alumno;
use App\Models\Hermano;
use App\Models\Matricula;
use Illuminate\Http\Request;
use Styde\Html\Facades\Alert;

class HermanosController extends Controller
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
        $hermanos = Hermano::where('idalumno',$matricula->idalumno)->get();
        return view('admin.hermanos.index',compact('matricula','hermanos'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Hermano::create($request->all());
        Alert::success('Hermano Registrado con exito');
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
        Hermano::destroy($id);
        Alert::success('Hermano Eliminado con exito');
        return back();
    }

}
