<?php
namespace App\Http\ViewComposers;

use App\Models\Catalogo;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Request;

class GestionSelectData
{
	public function compose(View $view)
	{
		$gestion = Catalogo::Combo('GESTION')->pluck('nombre','id')->toarray();

		$view->with(compact('gestion'));
	}
}