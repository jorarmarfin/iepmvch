<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AlumnoRequest;
use App\Models\Alumno;
use App\Models\Catalogo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Styde\Html\Facades\Alert;
class AlumnosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Lista = Alumno::all();
        return view('admin.alumnos.index',compact('Lista'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.alumnos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AlumnoRequest $request)
    {
        $data = $request->all();
        if ($request->hasFile('file')) {
            $data['foto'] = $request->file('file')->store('fotos','public');
        }

        Alert::success('Alumno Registrado con exito');
        Alumno::create($data);
        return redirect()->route('admin.alumnos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $alumno = Alumno::find($id);
        return view('admin.alumnos.show',compact('alumno'));

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $alumno = Alumno::find($id);
        return view('admin.alumnos.delete',compact('alumno'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $alumno = Alumno::find($id);
        return view('admin.alumnos.edit',compact('alumno'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AlumnoRequest $request, $id)
    {
        Alumno::Guardar($request,$id);
        Alert::success('Usuario actualizado');
        return redirect()->route('admin.alumnos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $alumno = Alumno::find($id);
        Storage::delete("/public/$alumno->foto");
        $alumno->delete();
        Alert::success('Alumno eliminado con exito');
        return redirect()->route('admin.alumnos.index');
    }
}
