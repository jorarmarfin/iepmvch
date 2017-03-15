<?php
namespace App\Http\ViewComposers;

use App\Models\Catalogo;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Request;

class EstadoAsistenciaSelectData
{
	public function compose(View $view)
	{
		$estadoasistencia = Catalogo::Combo('ESTADO ASISTENCIA')->pluck('nombre','id')->toarray();

		$view->with(compact('estadoasistencia'));
	}
}