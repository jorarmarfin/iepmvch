<?php

namespace App\Http\Controllers\Admin\Birthday;

use App\Http\Controllers\Controller;
use App\Models\Alumno;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BirthdayController extends Controller
{
    public function index()
    {
    	$date = Carbon::now();
    	$Lista = Alumno::Birthday()->orderBy('fechanacimiento','asc')->get();
    	return view('admin.birthday.index',compact('Lista'));
    }
}
