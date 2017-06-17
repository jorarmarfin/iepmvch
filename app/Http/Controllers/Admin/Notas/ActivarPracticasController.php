<?php

namespace App\Http\Controllers\Admin\Notas;

use App\Http\Controllers\Controller;
use App\Models\PeriodoPractica;
use Illuminate\Http\Request;

class ActivarPracticasController extends Controller
{
	public function index()
	{
		$Lista = PeriodoPractica::orderBy('id')->get();
		return view('admin.notas.practicas.activar',compact('Lista'));
	}
	public function store(Request $request)
	{
		$data = $request->all();

		for ($i=0; $i < 10; $i++) {
			$practica = 'pc'.pad(($i+1),2,'0','L');
				PeriodoPractica::whereNotNull('id')->update([$practica=>false]);
			if($request->has($practica)){
				foreach ($data[$practica] as $key => $item) {
					PeriodoPractica::where('id',$data['id'][$key])->update([$practica=>$item]);
				}
			}else{

			}
		}
		return back();
	}
	public function trimestre(Request $request)
	{
		$data = $request->all();
		for ($i=0; $i < 3; $i++) {
			$trimestre = 'examen';
				PeriodoPractica::whereNotNull('id')->update([$trimestre=>false]);
			if($request->has($trimestre)){
				foreach ($data[$trimestre] as $key => $item) {
					PeriodoPractica::where('id',$data['id'][$key])->update([$trimestre=>$item]);
				}
			}
		}
		return back();
	}
	public function comportamiento(Request $request)
	{
		$data = $request->all();
		for ($i=0; $i < 3; $i++) {
			$trimestre = 'comportamiento';
				PeriodoPractica::whereNotNull('id')->update([$trimestre=>false]);
			if($request->has($trimestre)){
				foreach ($data[$trimestre] as $key => $item) {
					PeriodoPractica::where('id',$data['id'][$key])->update([$trimestre=>$item]);
				}
			}
		}
		return back();
	}
	public function indicadores(Request $request)
	{
		$data = $request->all();
		for ($i=0; $i < 16; $i++) {
			$trimestre = 'in'.pad($i+1,2,'0','L');
				PeriodoPractica::whereNotNull('id')->update([$trimestre=>false]);
			if($request->has($trimestre)){
				foreach ($data[$trimestre] as $key => $item) {
					PeriodoPractica::where('id',$data['id'][$key])->update([$trimestre=>$item]);
				}
			}
		}
		return back();
	}
	public function actitud(Request $request)
	{
		$data = $request->all();

		for ($i=0; $i < 5; $i++) {
			$actitud = 'ac'.pad(($i+1),2,'0','L');
				PeriodoPractica::whereNotNull('id')->update([$actitud=>false]);
			if($request->has($actitud)){
				foreach ($data[$actitud] as $key => $item) {
					PeriodoPractica::where('id',$data['id'][$key])->update([$actitud=>$item]);
				}
			}else{

			}
		}
		return back();
	}
}
