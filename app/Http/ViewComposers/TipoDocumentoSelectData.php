<?php
namespace App\Http\ViewComposers;

use App\Models\Catalogo;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Request;

class TipoDocumentoSelectData
{
	public function compose(View $view)
	{
		$tipodocumento = Catalogo::Combo('TIPO DOCUMENTO')->pluck('nombre','id')->toarray();

		$view->with(compact('tipodocumento'));
	}
}