<?php

namespace App\Http\Controllers\Resource;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
            $headers,
            ResponseHeaderBag::DISPOSITION_INLINE
        );
    }
}
