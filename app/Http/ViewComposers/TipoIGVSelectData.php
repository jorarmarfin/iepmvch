<?php
namespace App\Http\ViewComposers;

use App\Models\Catalogo;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Request;

class TipoIGVSelectData
{
	public function compose(View $view)
	{
		$tipoigv = Catalogo::Combo('TIPO IGV')->pluck('nombre','id')->toarray();

		$view->with(compact('tipoigv'));
	}
}