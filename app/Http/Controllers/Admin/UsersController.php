<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\UserRequest;
use App\Models\Catalogo;
use App\User;
use File;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Storage;
use Styde\Html\Facades\Alert;

class UsersController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Lista = User::orderBy('name','asc')->get();
        return view('admin.users.index',compact('Lista'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $data = $request->all();
        $user = new User($data);
        $file = $request->file('file');
        if ($request->hasFile('file')) {
            $data['foto'] = $request->file('file')->store('avatars');
        }
        $user->save();
        Alert::success('Usuario Registrado con exito');
        return redirect()->route('admin.users.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        Alert::danger('ALERTA')->details('Esta seguro de eliminar este registro no podra deshacer esta opcion');
        return view('admin.users.delete',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $user->fill($request->all());
        if ($request->hasFile('file')) {
            $user->foto = $request->file('file')->store("avatars",'public');
        }
        $user->save();
        Alert::success('Usuario actualizado');
        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        Alert::success('Usuario Eliminado');
        return redirect()->route('admin.users.index');
    }
}
