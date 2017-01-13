<?php
namespace App\Http\ViewComposers;

use App\Models\Grado;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Request;

class GradoSelectData
{
	public function compose(View $view)
	{
		$grado = ['-1' => 'Seleccionar grado']+Grado::Activo()->OrderBy('id','asc')->pluck('nombre','id')->toarray();
		$view->with(compact('grado'));
	}
}