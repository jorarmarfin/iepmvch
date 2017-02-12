<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PersonalRequest;
use App\Http\Requests\PersonalUpdateRequest;
use App\Mail\WelcomeUserEmail;
use App\Models\Personal;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Styde\Html\Facades\Alert;
use Validator;

class PersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Lista = Personal::activo()->alfabetico()->get();

        return view('admin.personal.index',compact('Lista'));
    }
    /**
     * Muestra un listado de personal inactivo.
     *
     * @return \Illuminate\Http\Response
     */
    public function inactivo()
    {
        $Lista = Personal::inactivo()->alfabetico()->get();

        return view('admin.personal.index',compact('Lista'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.personal.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PersonalRequest $request)
    {
        $data = $request->all();

        if ($request->hasFile('file'))$data['foto'] = $request->file('file')->store('personal','public');
        if (!$request->hasFile('culmino'))$data['culmino'] = false;
        if (!$request->hasFile('vigente'))$data['vigente'] = false;
        if (!$request->hasFile('fechaegreso'))$data['fechaegreso'] = null;

        Personal::create($data);
        Alert::success('Personal Registrado con exito');
        return redirect()->route('admin.personal.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $personal = Personal::find($id);
        return view('admin.personal.show',compact('personal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $personal = Personal::find($id);
        return view('admin.personal.edit',compact('personal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PersonalUpdateRequest $request, $id)
    {
        $personal = Personal::find($id);
        $data = $request->all();
        if ($request->hasFile('file')) {
            if(!str_contains($personal->foto,'nofoto.jpg'))
            Storage::delete("/public/$personal->foto");

            $data['foto'] = $request->file('file')->store('personal','public');
        }

        if (!$request->hasFile('culmino'))$data['culmino'] = false;
        if (!$request->hasFile('vigente'))$data['vigente'] = false;
        if (!$request->hasFile('fechaegreso'))$data['fechaegreso'] = null;

        #actualiza el Rol y menu de su usuario


        $personal->fill($data);
        $personal->save();
        Alert::success('Personal actualizado con exito');
        return redirect()->route('admin.personal.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $personal = Personal::find($id);
        return view('admin.personal.delete',compact('personal'));

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $personal = Personal::find($id);

        if(!str_contains($personal->foto,'nofoto.jpg'))
        Storage::delete("/public/$personal->foto");

        $personal->delete();
        Alert::success('Personal Eliminado con exito');
        return redirect()->route('admin.personal.index');
    }
    /**
     * Cambia el estado de activo a inactivo
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function activo($id)
    {
        $personal = Personal::find($id);
        $personal->activo = !$personal->activo;
        $personal->save();
        Alert::success('Personal actualizado con exito');
        return redirect()->route('admin.personal.index');
    }
    /**
     * Crea usuario del persona
     *
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function createuser($id)
    {

        $persona = Personal::find($id);

        $data['name'] = $persona->nombres.' '.$persona->paterno;
        $data['email'] = $persona->email;
        $data['password'] = $persona->dni;
        $data['idrole'] = $persona->rol->id;
        $data['foto'] = $persona->foto;
        $data['activo'] = true;
        $data['username'] = $persona->dni;
        $data['menu'] = $persona->menu;

        $validator = Validator::make($data, [
            'email' => 'unique:users,email',
            'username' => 'unique:users,username',
        ],[
            'email.unique'=>'El email de este usuario ya esta registrado',
            'username.unique'=>'El DNI de este usuario ya esta registrado'
        ]
        );
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $usuario = User::create($data);

        if($usuario->id){
            $persona->idusuario = $usuario->id;
            $persona->save();
            $this->senduser($persona->id);
        }

        Alert::success('Usuario creado con exito');
        return back();
    }

    public function senduser($id)
    {
        $persona = Personal::find($id);
        $usuario = User::find($persona->idusuario);
        Mail::to($usuario->email,$usuario->name)
            ->send(new WelcomeUserEmail($usuario));
        Alert::success('Usuario enviado por email con exito');
        return back();

    }

}
