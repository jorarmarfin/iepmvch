<?php
namespace App\Http\ViewComposers;

use App\Models\Producto;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Request;

class ProductosSelectData
{
	public function compose(View $view)
	{
		$productos = Producto::select('id','nombre')->orderBy('id')->pluck('nombre','id')->toarray();

		$view->with(compact('productos'));
	}
}