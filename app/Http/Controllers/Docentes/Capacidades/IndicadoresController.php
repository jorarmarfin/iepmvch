<?php

namespace App\Http\Controllers\Docentes\Capacidades;

use Alert;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateIndicadorRequest;
use App\Models\Capacidad;
use App\Models\CapacidadDetalle;
use Illuminate\Http\Request;
class IndicadoresController extends Controller
{
    public function show($id)
    {
    	$capacidad = Capacidad::find($id);
    	$Lista = CapacidadDetalle::where('idcapacidad',$capacidad->id)->orderBy('id')->get();
    	return view('docentes.indicadores.show',compact('Lista','capacidad'));
    }
    public function store(CreateIndicadorRequest $request)
    {
        $cantidad = CapacidadDetalle::where('idcapacidad',$request->input('idcapacidad'))->count();
        if($cantidad<4){
    	    CapacidadDetalle::create($request->all());
    	    Alert::success('Indicador registrado con exito');
        }else{
            Alert::success('No puede agregar mas indicadores para esta capacidad');
        }
  		return redirect()->route('docentes.capacidad.indicadores.show',$request->input('idcapacidad'));
    }
    public function edit($id)
    {
    	$indicador = CapacidadDetalle::find($id);
    	$capacidad = Capacidad::find($indicador->idcapacidad);
    	return view('docentes.indicadores.edit',compact('indicador','capacidad'));
    }
    public function update(Request $request,$id)
    {
    	$indicador = CapacidadDetalle::find($id);
    	$indicador->fill($request->all());
    	$indicador->save();
    	Alert::success('Indicador actualizado con exito');
  		return redirect()->route('docentes.capacidad.indicadores.show',$indicador->idcapacidad);
    }
}
