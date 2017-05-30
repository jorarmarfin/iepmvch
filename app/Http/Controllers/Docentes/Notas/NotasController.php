<?php

namespace App\Http\Controllers\Docentes\Notas;

use App\Http\Controllers\Controller;
use App\Models\PersonalAsignatura;
use Illuminate\Http\Request;

class NotasController extends Controller
{
    public function index()
    {
    	$Lista = PersonalAsignatura::Asignaturas()->get();
    	return view('docentes.notas.index',compact('Lista'));
    }
}
