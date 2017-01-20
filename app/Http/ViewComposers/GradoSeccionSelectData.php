<?php
namespace App\Http\ViewComposers;

use App\Models\Grado;
use App\Models\GradoSeccion;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Request;
use DB;
class GradoSeccionSelectData
{
	public function compose(View $view)
	{
		$field = "g.nombre||' ('||s.nombre||')'";
		$gradoseccion = GradoSeccion::select(DB::raw("$field as nombre"),'grado_seccion.id')
									->join('grado as g','g.id','=','grado_seccion.idgrado')
									->join('catalogo as s','s.id','=','grado_seccion.idseccion')
									->orderBy('grado_seccion.id','asc')
									->pluck('nombre','id')
									->toarray();
		$gradoseccion = ['-1' => 'Seleccionar grado seccion']+ $gradoseccion;
		$view->with(compact('gradoseccion'));
	}
}