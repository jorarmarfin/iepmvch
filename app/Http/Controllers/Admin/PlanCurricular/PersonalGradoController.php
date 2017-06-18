<?php

namespace App\Http\Controllers\Admin\PlanCurricular;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePersonalGradoRequest;
use App\Models\PersonalGrado;
use Illuminate\Http\Request;
use Alert;
class PersonalGradoController extends Controller
{
    public function index()
    {
    	$Lista = PersonalGrado::all();
    	return view('admin.personalgrado.index',compact('Lista'));
    }
    public function store(CreatePersonalGradoRequest $request)
    {
    	PersonalGrado::create($request->all());
    	Alert::success('Tutor creado con exito');
    	return back();
    }
    public function edit($id)
    {
    	$personalgrado = PersonalGrado::find($id);
    	return view('admin.personalgrado.edit',compact('personalgrado'));
    }
    public function update(Request $request,$id)
    {
    	$personalgrado = PersonalGrado::find($id);
    	$personalgrado->fill($request->all());
    	$personalgrado->save();
    	return redirect()->route('admin.personalgrado.index');
    }
    public function delete($id)
    {
    	PersonalGrado::destroy($id);
    	Alert::success('Tutor elliminado con exito');
    	return redirect()->route('admin.personalgrado.index');
    }
}
