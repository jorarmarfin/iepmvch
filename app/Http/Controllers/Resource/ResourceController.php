<?php

namespace App\Http\Controllers\Resource;

use App\Http\Controllers\Controller;
use App\Models\Catalogo;
use Auth;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    public function getavatar()
    {
    	$foto = Auth::user()->foto;
        dd($foto);
        $headers = [];
        return response()->download(
            storage_path('app/'.$foto),
            null,
            $headers
        );
    }
    /**
     * Devuelve el Ubigeo
     * @return [type] [description]
     */
    public function ubigeo(Request $request)
    {
        $name = $request->varsearch ?:'';
        $name = trim(strtoupper($name));
        $ubigeo = Catalogo::ubigeo($name);
        return $ubigeo;
    }
}
