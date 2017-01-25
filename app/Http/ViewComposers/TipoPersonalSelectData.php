<?php
namespace App\Http\ViewComposers;

use App\Models\Catalogo;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Request;

class TipoPersonalSelectData
{
	public function compose(View $view)
	{
		$tipopersonal = Catalogo::Combo('TIPO PERSONAL')->pluck('nombre','id')->toarray();

		$view->with(compact('tipopersonal'));
	}
}