<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReservaPsicologicaRequest;
use App\Models\Catalogo;
use App\Models\DisponibilidadHoraria;
use App\Models\ReservaPsicologica;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Styde\Html\Facades\Alert;

class ReservaPsicologicaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Lista = ReservaPsicologica::Activo()->with('Grado')->with('Estado')->OrderBy('id','desc')->get();

        return view('admin.reservapsicologica.index',compact('Lista'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hp = DisponibilidadHoraria::HorarioPsicologico()->get();
        return view('admin.reservapsicologica.create',compact('hp'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReservaPsicologicaRequest $request)
    {
        $this->ValidoHora($request);
        $data = $request->all();
        dd('se puede guardar');
        $estado = Catalogo::Table('ESTADO PSICOLOGICO')->where('nombre','Pendiente')->first();
        $data['idestado'] = $estado->id;

        ReservaPsicologica::create($data);
        Alert::success('Reserva registrada con exito');
        return redirect()->route('admin.reservapsicologica.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = ReservaPsicologica::find($id);
        return view('admin.reservapsicologica.delete',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = ReservaPsicologica::find($id);
        return view('admin.reservapsicologica.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ReservaPsicologicaRequest $request, $id)
    {
        $data = ReservaPsicologica::find($id);
        $data->fill($request->all());
        $data->save();
        Alert::success('Se actualizo el registro satisfactoriamente');
        return redirect()->route('admin.reservapsicologica.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ReservaPsicologica::destroy($id);
        Alert::success('Se ha eliminado el registro satisfactoriamente');
        return redirect()->route('admin.reservapsicologica.index');
    }
    /**
     * Valida la hora disponible
     * @param [type] $request [description]
     */
    public function ValidoHora($request)
    {
        $data = $request->all();
        $date = Carbon::parse($data['fecha']);
        #valido dias
        $dias = DisponibilidadHoraria::select('d.valor as dias')
                                        ->join('catalogo as d','d.id','=','iddia')
                                        ->where('idpersonal',$data['idpersonal'])
                                        ->groupBy('d.valor')
                                        ->get()->implode('dias',',');

        if (!str_contains($dias,$date->dayOfWeek))
            $this->Bloquea($request);

    }
    /**
     * Detiene el flujo
     * @param [type] $text [description]
     */
    public function Bloquea($request)
    {
        $this->validate($request, [
            'fecha' => 'accepted:yes',
        ],[
            'fecha.accepted'=>'Esta fecha y hora no esta disponible'
        ]);
    }
}
