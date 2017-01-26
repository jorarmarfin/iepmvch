<?php
namespace App\Http\ViewComposers;

use App\Models\Personal;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Request;
use DB;
class PersonalSelectData
{
	public function compose(View $view)
	{
		$query = "paterno||' - '||materno||', '||nombres as nombre";
		$personalData = Personal::select('id',DB::raw($query))->alfabetico()->activo()->pluck('nombre','id')->toarray();

		$view->with(compact('personalData'));
	}
}