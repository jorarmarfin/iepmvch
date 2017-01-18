<?php
namespace App\Http\ViewComposers;

use App\Models\Catalogo;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Request;

class EstadoCivilSelectData
{
	public function compose(View $view)
	{
		$estadocivil = ['-1' => 'Seleccionar Estado civil']+Catalogo::Combo('ESTADO CIVIL')->pluck('nombre','id')->toarray();

		$view->with(compact('estadocivil'));
	}
}