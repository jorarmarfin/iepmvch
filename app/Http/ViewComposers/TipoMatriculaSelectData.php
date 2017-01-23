<?php
namespace App\Http\ViewComposers;

use App\Models\Catalogo;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Request;

class TipoMatriculaSelectData
{
	public function compose(View $view)
	{
		$tipomatricula = ['-1' => 'Seleccionar Tipo de Matricula']+Catalogo::Combo('TIPO MATRICULA')->pluck('nombre','id')->toarray();

		$view->with(compact('tipomatricula'));
	}
}