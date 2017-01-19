<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AlumnoFamiliarRequest;
use App\Http\Requests\FamiliarRequest;
use App\Models\AlumnoFamiliar;
use App\Models\Familiar;
use Illuminate\Http\Request;
use Styde\Html\Facades\Alert;

class FamiliarController extends Controller
{
    /**
     * Lista familiares del alumno
     */
    public function lists($id)
    {
        $Lista = Familiar::Familia($id)->get();

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
        $data = $request->all();
        Familiar::Guardar($data);
        Alert::success('Familiar Registrado con exito');
        return redirect()->route('admin.familiar.lists',$data['idalumno']);

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
        $idalumno = IdAlumno($id);
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
        $idalumno = IdAlumno($id);
        return view('admin.familiar.edit',compact('familiar','idalumno'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FamiliarRequest $request, $id)
    {
        Familiar::Actualizar($request,$id);
        $idalumno = IdAlumno($id);
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
        $idalumno = IdAlumno($id);
        return view('admin.familiar.delete',compact('familiar','idalumno'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Familiar::destroy($id);
        $idalumno = IdAlumno($id);
        Alert::success('Usuario eliminado con exito');
        return redirect()->route('admin.familiar.lists',$idalumno);
    }
    public function relation(AlumnoFamiliarRequest $request)
    {
        AlumnoFamiliar::create($request->all());
        Alert::success('Familiar Registrado con exito');
        return back();
    }
}
