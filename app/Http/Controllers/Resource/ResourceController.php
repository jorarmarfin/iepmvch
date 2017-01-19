<?php

namespace App\Http\Controllers\Resource;

use App\Http\Controllers\Controller;
use App\Models\Catalogo;
use App\Models\Familiar;
use Auth;
use DB;
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
    /**
     * Devuelve Los familiares
     * @return [type] [description]
     */
    public function familiares(Request $request)
    {
        $name = $request->varsearch ?:'';
        $query = "paterno||' - '||materno||', '||nombres";
        $familiares = Familiar::select('id',DB::raw("$query as text"))
                        ->get();
        return $familiares;
    }
}
