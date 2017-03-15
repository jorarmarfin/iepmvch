<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MatriculaRequest;
use App\Models\Alumno;
use App\Models\GradoSeccion;
use App\Models\Matricula;
use Illuminate\Http\Request;
use Styde\Html\Facades\Alert;

class MatriculaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Lista = Matricula::Activas()->orderBy('matricula.id','desc')->get();
        return view('admin.matricula.index',compact('Lista'));
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
    public function store(MatriculaRequest $request)
    {
        $this->ValidoGrado($request);

        if(Matricula::guardar($request))
        Alert::success('La matricula se ha registrado con exito');
        else
        Alert::warning('Esta registrando la matricula dos veces');


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
        $matricula = Matricula::find($id);
        return view('admin.matricula.edit',compact('matricula'));
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
        $this->ValidoGrado($request);

        $matricula = Matricula::find($id);
        $matricula->fill($request->all());

        if($matricula->save())
        Alert::success('Matricula Actualizada con exito');
        else
        Alert::success('No se puede actualizar a este grado');

        return redirect()->route('admin.matricula.index');
    }
    public function delete($id)
    {
        $matricula = Matricula::find($id);
        return view('admin.matricula.delete',compact('matricula'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $matricula = Matricula::find($id);
        $idalumno = $matricula->idalumno;
        if($matricula->delete()){
            Alumno::where('id',$idalumno)->update(['idestado'=>EstadoId('ESTADO ALUMNO','Regular')]);
        }
        Alert::success('Matricula eliminada con exito');
        return redirect()->route('admin.matricula.index');
    }
    /**
     * Valida el grado que debe matricularse el Alumno
     * @param [type] $request [description]
     */
    public function ValidoGrado($request)
    {
        //dd($request->all());
        $idtipo = EstadoId('TIPO MATRICULA','Pre-Matricula');
        if ($idtipo != $request->input('idtipo')) {
            $autorizado = GradoSeccion::GradoSeccionAutorizado($request)->get();
            $autorizado = $autorizado->implode('id', ',');
            $this->validate($request, [
                'idgradoseccion' => 'in:'.$autorizado,
            ],[
                'idgradoseccion.in'=>'El grado escogido no es correcto'
            ]);
        }
    }
    /**
     * Ruta del recibo
     */
    public function printrecibo($id)
    {
        return view('admin.matricula.recibo',compact('id'));
    }
    /**
     * Ruta del Compromiso
     */
    public function printcompromiso($id)
    {
        return view('admin.matricula.compromiso',compact('id'));
    }
    public function printreporte()
    {
        return view('admin.matricula.reporte');
    }
    public function printreportegrado()
    {
        return view('admin.matricula.reportegrado');
    }

}
