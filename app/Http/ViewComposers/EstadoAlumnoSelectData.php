<?php
namespace App\Http\ViewComposers;

use App\Models\Catalogo;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Request;

class EstadoAlumnoSelectData
{
	public function compose(View $view)
	{
		$estadoalumno = ['-1' => 'Seleccionar estado alumno']+Catalogo::Combo('ESTADO ALUMNO')->pluck('nombre','id')->toarray();
		$view->with(compact('estadoalumno'));
	}
}