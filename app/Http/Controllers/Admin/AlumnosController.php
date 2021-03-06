<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AlumnoRequest;
use App\Http\Requests\AlumnoUpdateRequest;
use App\Models\Alumno;
use App\Models\Catalogo;
use App\Models\GradoSeccion;
use App\Models\Matricula;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Styde\Html\Facades\Alert;
use Validator;
class AlumnosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Lista = Alumno::orderBy('id','desc')->get();
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
        $alumno = Alumno::with('familiar')->find($id);
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
    public function update(AlumnoUpdateRequest $request, $id)
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
    /**
     * Matricula de alumno
     */
    public function matricular($id)
    {
        $alumno = Alumno::find($id);
        $estado_matricula = collect([EstadoId('ESTADO ALUMNO','Regular'),EstadoId('ESTADO ALUMNO','Promovido')])->implode(',');
        $validator = Validator::make($alumno->toArray(), [
            'idestado' => 'in:'.$estado_matricula,
        ],[
            'idestado.in'=>'No se puede matricular a este alumno'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }
        $gradoseccion = GradoSeccion::where('idgrado',$alumno->idgrado +1)->first();

        $matricula = Matricula::create([
                'idalumno'=>$alumno->id,
                'idgradoseccion'=>$gradoseccion->id,
                'idtipo'=>EstadoId('TIPO MATRICULA','Activa'),
                'year'=>Carbon::now()->year,
            ]);
        if($matricula->id>0){
            $alumno->idestado = EstadoId('ESTADO ALUMNO','Matriculado');
            $alumno->save();
            Alert::success('Alumno matriculado con exito');
            return redirect()->route('admin.alumnos.index');
        }else{
            return redirect()->route('admin.alumnos.index');
        }

    }
}
