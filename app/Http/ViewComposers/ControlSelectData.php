<?php
namespace App\Http\ViewComposers;

use App\Models\Catalogo;
use App\Models\Grado;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Request;

class ControlSelectData
{
	public function compose(View $view)
	{
		$roles = ['-1' => 'Seleccionar Rol']+Catalogo::Combo('ROLES')->pluck('nombre','id')->toarray();
		$grado = ['-1' => 'Seleccionar grado']+Grado::Activo()->pluck('nombre','id')->toarray();

		$view->with(compact('roles','grado'));
	}
}