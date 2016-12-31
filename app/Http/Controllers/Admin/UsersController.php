<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Models\Catalogo;

use Storage;
use File;

use Illuminate\Http\Request;
use Styde\Html\Facades\Alert;
use Illuminate\Routing\Route;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Lista = User::all();
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
    public function store(Request $request)
    {
        $data = $request->all();
        $user = new User($data);
        $file = $request->file('file');

        $request->file('file')->store('avatars');
        /*if (isset($file)) {
            $namefile = $file->getClientOriginalName();
            $user['foto']= $namefile;
            Storage::disk('public')->put('/fotos/'.$namefile,File::get($file));
        };*/

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
    public function update(Request $request, $id)
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
