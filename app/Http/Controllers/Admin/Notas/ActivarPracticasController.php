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
}
