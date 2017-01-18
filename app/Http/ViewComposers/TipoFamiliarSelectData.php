<?php
namespace App\Http\ViewComposers;

use App\Models\Catalogo;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Request;

class TipoFamiliarSelectData
{
	public function compose(View $view)
	{
		$tipofamiliar = ['-1' => 'Seleccionar Tipo de Familiar']+Catalogo::Combo('TIPO FAMILIAR')->pluck('nombre','id')->toarray();

		$view->with(compact('tipofamiliar'));
	}
}