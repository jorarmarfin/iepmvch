<?php

namespace App\Http\Controllers\Admin\PlanCurricular;

use App\Http\Controllers\Controller;
use App\Http\Requests\AGSRequest;
use App\Models\AsignaturaGradoSeccion;
use App\Models\GradoSeccion;
use Illuminate\Http\Request;
use Styde\Html\Facades\Alert;

class AsignaturaGradoSeccionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Lista = AsignaturaGradoSeccion::all();
        $Grados = GradoSeccion::orderBy('idgrado')->get();
        return view('admin.ags.index',compact('Lista','Grados'));
    }
    public function delete($id)
    {
        AsignaturaGradoSeccion::destroy($id);
        Alert::success('Asignatura eliminada con exito');
        return back();
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
    public function store(AGSRequest $request)
    {
        $idgradoseccion = $request->input('idgradoseccion');
        $data = $request->input('idasignatura');
        foreach ($data as $key => $value) {
            AsignaturaGradoSeccion::create([
                            'idgradoseccion'=>$idgradoseccion,
                            'idasignatura'=>$value
                            ]);
        }

        Alert::success('Asignatura asignada al grado con exito');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
