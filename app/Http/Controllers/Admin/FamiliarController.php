<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AlumnoFamiliarRequest;
use App\Http\Requests\FamiliarRequest;
use App\Http\Requests\FamiliarUpdateRequest;
use App\Models\Alumno;
use App\Models\AlumnoFamiliar;
use App\Models\Familiar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Styde\Html\Facades\Alert;

class FamiliarController extends Controller
{
    /**
     * Lista familiares del alumno
     */
    public function lists($id)
    {
        $Lista = Familiar::Familia($id)->get();
        Session::put('IDALUMNO', $id);
        return view('admin.familiar.index',compact('Lista','id'));
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $idalumno = $id;
        return view('admin.familiar.create',compact('idalumno'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FamiliarRequest $request)
    {
        $idalumno = $request->input('idalumno');
        Familiar::Guardar($request);
        Alert::success('Familiar Registrado con exito');
        return redirect()->route('admin.familiar.lists', $idalumno);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $familiar = Familiar::find($id);
        $idalumno = Session::get('IDALUMNO');
        return view('admin.familiar.show',compact('familiar','idalumno'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $familiar = Familiar::find($id);
        $idalumno = Session::get('IDALUMNO');
        return view('admin.familiar.edit',compact('familiar','idalumno'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FamiliarUpdateRequest $request, $id)
    {
        Familiar::Actualizar($request,$id);
        $idalumno = Session::get('IDALUMNO');
        Alert::success('Familiar actualizado con exito');
        return redirect()->route('admin.familiar.lists',$idalumno);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $familiar = Familiar::find($id);
        $idalumno = Session::get('IDALUMNO');
        $relacionados = AlumnoFamiliar::relacionados($id,$idalumno)->get();
        $Lista = Alumno::wherein('id',$relacionados)->get();
        return view('admin.familiar.delete',compact('familiar','idalumno','Lista'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $idalumno = Session::get('IDALUMNO');
        Familiar::eliminar($id,$idalumno);
        Alert::success('Familiar eliminado con exito');
        return redirect()->route('admin.familiar.lists',$idalumno);
    }
    /**
     * Agregar Relacion de un alumno con un familiar
     * @param  AlumnoFamiliarRequest $request [description]
     * @return [type]                         [description]
     */
    public function relation(AlumnoFamiliarRequest $request)
    {
        AlumnoFamiliar::create($request->all());
        Alert::success('Familiar Registrado con exito');
        return back();
    }
    /**
     * Agregar Relacion de un alumno con un familiar
     * @param  AlumnoFamiliarRequest $request [description]
     * @return [type]                         [description]
     */
    public function quitar($id)
    {
        $idalumno = Session::get('IDALUMNO');
        Familiar::quitar($id,$idalumno);
        Alert::success('Familiar quitado con exito');
        return back();
    }
}
