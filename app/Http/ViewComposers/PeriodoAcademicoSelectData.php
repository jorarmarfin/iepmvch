<?php
namespace App\Http\ViewComposers;

use App\Models\Catalogo;
use App\Models\Grado;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Request;

class PeriodoAcademicoSelectData
{
	public function compose(View $view)
	{
		$periodo = Catalogo::table('PERIODO ACADEMICO')->pluck('nombre','id')->toarray();

		$view->with(compact('periodo'));
	}
}