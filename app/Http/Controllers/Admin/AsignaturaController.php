<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AsignaturaRequest;
use App\Models\Asignatura;
use Illuminate\Http\Request;
use Styde\Html\Facades\Alert;

class AsignaturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Lista = Asignatura::OrderBy('nombre')->get();
        return view('admin.asignatura.index',compact('Lista'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.asignatura.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AsignaturaRequest $request)
    {
        Asignatura::create($request->all());
        Alert::success('Asignatura Registrada con exito');
        return redirect()->route('admin.asignatura.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $asignatura = Asignatura::find($id);
        return view('admin.asignatura.delete',compact('asignatura'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $asignatura = Asignatura::find($id);
        return view('admin.asignatura.edit',compact('asignatura'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AsignaturaRequest $request, $id)
    {
        $asignatura = Asignatura::find($id);
        $asignatura->fill($request->all());
        $asignatura->save();
        Alert::success('Asignatura Actualizada con exito');
        return redirect()->route('admin.asignatura.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Asignatura::destroy($id);
        Alert::success('Asignatura Eliminada con exito');
        return redirect()->route('admin.asignatura.index');
    }
}
