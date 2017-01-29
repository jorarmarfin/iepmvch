<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Catalogo;
use App\Models\Checklist;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Styde\Html\Facades\Alert;


class CheckListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        Checklist::GeneraCheklist($id);
        $Lista = Checklist::where('idmatricula',$id)->orderBy('id','asc')->get();
        return view('admin.checklist.index',compact('Lista'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $checklist = Checklist::find($id);
        $checklist->aplica = !$checklist->aplica;
        $checklist->save();
        Alert::success('Se actualizo con exito');
        return redirect()->route('admin.checklist.show',$checklist->idmatricula);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function entrego($id,$cond)
    {
        $checklist = Checklist::find($id);
        $date = Carbon::now();
        $checklist->fecha = ($cond=='si') ? $date->toDateString() : null ;

        $checklist->save();
        Alert::success('Se actualizo con exito');
        return redirect()->route('admin.checklist.show',$checklist->idmatricula);
    }
}
