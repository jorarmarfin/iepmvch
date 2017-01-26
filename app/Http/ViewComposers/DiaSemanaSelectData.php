<?php
namespace App\Http\ViewComposers;

use App\Models\Catalogo;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Request;

class DiaSemanaSelectData
{
	public function compose(View $view)
	{
		$diasemana = Catalogo::table('DIA SEMANA')->orderBy('id','asc')->pluck('nombre','id')->toarray();

		$view->with(compact('diasemana'));
	}
}