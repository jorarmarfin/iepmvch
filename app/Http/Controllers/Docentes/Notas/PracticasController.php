<?php

namespace App\Http\Controllers\Docentes\Notas;

use App\Http\Controllers\Controller;
use App\Models\PersonalAsignatura;
use Illuminate\Http\Request;

class PracticasController extends Controller
{
    public function index()
    {
    	$Lista = [];
    	$personal_asignatura = PersonalAsignatura::Asignaturas()->get();
    	dd($personal_asignatura->toArray());
    	return view('docentes.notas.practicas',compact('Lista'));
    }
}
