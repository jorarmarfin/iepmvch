<?php
namespace App\Http\ViewComposers;

use App\Models\AreaAcademica;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Request;

class AreaSelectData
{
	public function compose(View $view)
	{
		$area = AreaAcademica::pluck('nombre','id')->toarray();

		$view->with(compact('area'));
	}
}