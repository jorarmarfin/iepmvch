<?php

namespace App\Http\Controllers\Docentes\Notas;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NotasController extends Controller
{
    public function index()
    {
    	$Lista = [];
    	return view('docentes.notas.index',compact('Lista'));
    }
}
