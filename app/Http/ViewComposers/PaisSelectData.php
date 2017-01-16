<?php
namespace App\Http\ViewComposers;

use App\Models\Catalogo;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Request;

class PaisSelectData
{
	public function compose(View $view)
	{
		$pais = ['-1' => 'Seleccionar Pais']+Catalogo::Combo('PAIS')->pluck('nombre','id')->toarray();

		$view->with(compact('pais'));
	}
}