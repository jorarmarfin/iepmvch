<?php
namespace App\Http\ViewComposers;

use App\Models\Catalogo;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Request;

class AreaSelectData
{
	public function compose(View $view)
	{
		$area = Catalogo::Combo('AREA')->pluck('nombre','id')->toarray();

		$view->with(compact('area'));
	}
}