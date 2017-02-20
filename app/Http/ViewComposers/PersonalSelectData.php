<?php
namespace App\Http\ViewComposers;

use App\Models\Catalogo;
use App\Models\Personal;
use DB;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Request;
class PersonalSelectData
{
	public function compose(View $view)
	{
		$query = "paterno||' - '||materno||', '||nombres as nombre";
		$allpersonal = Personal::select('id',DB::raw($query))
									->alfabetico()->activo()
									->pluck('nombre','id')->toarray();
		$tipo = Catalogo::table('TIPO PERSONAL')->where('codigo','Pisco')->first();
		$psipersonal = Personal::select('id',DB::raw($query))
									->where('idtipo',$tipo->id)
									->alfabetico()->activo()
									->pluck('nombre','id')->toarray();

		$view->with(compact('allpersonal','psipersonal'));
	}
}