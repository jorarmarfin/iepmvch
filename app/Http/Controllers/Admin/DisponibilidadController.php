<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DisponibilidadRequest;
use App\Models\DisponibilidadHoraria;
use App\Models\Personal;
use Illuminate\Http\Request;
use Styde\Html\Facades\Alert;

class DisponibilidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Lista = DisponibilidadHoraria::orderBy('id')->get();
        return view('admin.disponibilidad.index',compact('Lista'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DisponibilidadRequest $request)
    {
        DisponibilidadHoraria::create($request->all());
        Alert::success('Horario Registrado con exito');
        return redirect()->route('admin.disponibilidad.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $disponibilidad = DisponibilidadHoraria::find($id);
        return view('admin.disponibilidad.edit',compact('disponibilidad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DisponibilidadRequest $request, $id)
    {
        $disponibilidad = DisponibilidadHoraria::find($id);
        $disponibilidad->fill($request->all());
        $disponibilidad->save();
        Alert::success('Horario Actualizado con exito');
        return redirect()->route('admin.disponibilidad.index');
    }
    public function delete($id)
    {
        $disponibilidad = DisponibilidadHoraria::find($id);
        return view('admin.disponibilidad.delete',compact('disponibilidad'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DisponibilidadHoraria::destroy($id);
        Alert::success('Horario eliminado con exito');
        return redirect()->route('admin.disponibilidad.index');
    }
}
