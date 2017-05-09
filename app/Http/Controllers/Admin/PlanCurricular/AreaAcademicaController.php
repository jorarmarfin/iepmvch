<?php

namespace App\Http\Controllers\Admin\PlanCurricular;

use App\Http\Controllers\Controller;
use App\Models\AreaAcademica;
use Illuminate\Http\Request;
use Styde\Html\Facades\Alert;

class AreaAcademicaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Lista = AreaAcademica::all();
        return view('admin.areaacademica.index',compact('Lista'));
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
    public function store(Request $request)
    {
        $data = $request->all();
        if (!$request->has('subarea'))$data['subarea'] = false;
        if (!$request->has('activo'))$data['activo'] = false;
        AreaAcademica::create($data);
        Alert::success('Area Academica registrada con exito');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $areaacademica = AreaAcademica::find($id);
        return view('admin.areaacademica.delete',compact('areaacademica'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $areaacademica = AreaAcademica::find($id);
        return view('admin.areaacademica.edit',compact('areaacademica'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        if (!$request->has('subarea'))$data['subarea'] = false;
        if (!$request->has('activo'))$data['activo'] = false;

        $areaacademica = AreaAcademica::find($id);
        $areaacademica->fill($data);
        $areaacademica->save();
        Alert::success('Area Academica actualizada con exito');
        return redirect()->route('admin.areaacademica.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        AreaAcademica::destroy($id);
        Alert::success('Area Academica eliminada con exito');
        return redirect()->route('admin.areaacademica.index');
    }
}
