<?php
namespace App\Http\ViewComposers;

use App\Models\Catalogo;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Request;

class TipoIdentificacionSelectData
{
	public function compose(View $view)
	{
		$tipoidentificacion = Catalogo::Combo('TIPO DOCUMENTO IDENTIDAD')->pluck('nombre','id')->toarray();
		$view->with(compact('tipoidentificacion'));
	}
}