<?php
namespace App\Http\ViewComposers;

use App\Models\Catalogo;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Request;

class SistemaPensionSelectData
{
	public function compose(View $view)
	{
		$sistemapension = Catalogo::Combo('SISTEMA PENSION')->pluck('nombre','id')->toarray();

		$view->with(compact('sistemapension'));
	}
}