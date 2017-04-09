<?php
namespace App\Http\ViewComposers;

use App\Models\Asignatura;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Request;

class AsignaturaSelectData
{
	public function compose(View $view)
	{
		$asignaturas = Asignatura::orderBy('nombre')->pluck('nombre','id')->toarray();

		$view->with(compact('asignaturas'));
	}
}