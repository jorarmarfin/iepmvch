<?php

namespace App\Http\Controllers\Admin\Notas;

use App\Http\Controllers\Controller;
use App\Models\PersonalAsignatura;
use Illuminate\Http\Request;

class NotasController extends Controller
{
    public function index()
    {
    	$Lista = PersonalAsignatura::all();
    	return view('admin.notas.index',compact('Lista'));
    }
}
