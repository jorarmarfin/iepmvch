<?php
namespace App\Http\ViewComposers;

use App\Models\AreaAcademica;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Request;

class AreaSelectData
{
	public function compose(View $view)
	{
		$area = AreaAcademica::pluck('nombre','id')->toarray();
		$areaactivo = AreaAcademica::where('subarea',1)->where('activo',1)->pluck('nombre','id')->toarray();
		$areaactivado = AreaAcademica::where('activo',1)->pluck('nombre','id')->toarray();

		$view->with(compact('area','areaactivo','areaactivado'));
	}
}