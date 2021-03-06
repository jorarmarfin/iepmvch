<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AlumnoFamiliarRequest;
use App\Http\Requests\FamiliarRequest;
use App\Http\Requests\FamiliarUpdateRequest;
use App\Mail\WelcomeUserEmail;
use App\Models\Alumno;
use App\Models\AlumnoFamiliar;
use App\Models\Familiar;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Styde\Html\Facades\Alert;
use Validator;
use Illuminate\Support\Facades\Mail;

class FamiliarController extends Controller
{
    /**
     * Lista familiares del alumno
     */
    public function lists($id)
    {
        $Lista = Familiar::Familia($id)->get();
        Session::put('IDALUMNO', $id);
        return view('admin.familiar.index',compact('Lista','id'));
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Lista = Familiar::where('email','like','%pendiente%')->get();
        $id = '';
        return view('admin.familiar.list',compact('Lista','id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $idalumno = $id;
        return view('admin.familiar.create',compact('idalumno'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FamiliarRequest $request)
    {
        $idalumno = $request->input('idalumno');
        Familiar::Guardar($request);
        Alert::success('Familiar Registrado con exito');
        return redirect()->route('admin.familiar.lists', $idalumno);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $familiar = Familiar::find($id);
        $idalumno = Session::get('IDALUMNO');
        return view('admin.familiar.show',compact('familiar','idalumno'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $familiar = Familiar::find($id);
        $idalumno = Session::get('IDALUMNO');
        return view('admin.familiar.edit',compact('familiar','idalumno'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FamiliarUpdateRequest $request, $id)
    {
        Familiar::Actualizar($request,$id);
        $idalumno = Session::get('IDALUMNO');
        Alert::success('Familiar actualizado con exito');
        return redirect()->route('admin.familiar.lists',$idalumno);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $familiar = Familiar::find($id);
        $idalumno = Session::get('IDALUMNO');
        $relacionados = AlumnoFamiliar::relacionados($id,$idalumno)->get();
        $Lista = Alumno::wherein('id',$relacionados)->get();
        return view('admin.familiar.delete',compact('familiar','idalumno','Lista'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $idalumno = Session::get('IDALUMNO');
        Familiar::eliminar($id,$idalumno);
        Alert::success('Familiar eliminado con exito');
        return redirect()->route('admin.familiar.lists',$idalumno);
    }
    /**
     * Agregar Relacion de un alumno con un familiar
     * @param  AlumnoFamiliarRequest $request [description]
     * @return [type]                         [description]
     */
    public function relation(AlumnoFamiliarRequest $request)
    {
        AlumnoFamiliar::create($request->all());
        Alert::success('Familiar Registrado con exito');
        return back();
    }
    /**
     * Agregar Relacion de un alumno con un familiar
     * @param  AlumnoFamiliarRequest $request [description]
     * @return [type]                         [description]
     */
    public function quitar($id)
    {
        $idalumno = Session::get('IDALUMNO');
        Familiar::quitar($id,$idalumno);
        Alert::success('Familiar quitado con exito');
        return back();
    }
    /**
     * Crea usuario del persona
     *
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function createuser($id)
    {

        $familiar = Familiar::find($id);

        $data['name'] = $familiar->nombres.' '.$familiar->paterno;
        $data['email'] = $familiar->email;
        $data['password'] = $familiar->dni;
        $data['idrole'] = RoleId('pad');
        $data['foto'] = 'avatars/nofoto.jpg';
        $data['activo'] = true;
        $data['username'] = $familiar->dni;
        $data['menu'] = 'menu.sider-pad';

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
            $familiar->idusuario = $usuario->id;
            $familiar->save();
            $this->senduser($familiar->id);
        }

        Alert::success('Usuario creado con exito');
        return back();
    }

    public function senduser($id)
    {
        $familiar = Familiar::find($id);
        $usuario = User::find($familiar->idusuario);
        Mail::to($usuario->email,$usuario->name)
            ->send(new WelcomeUserEmail($usuario));
        Alert::success('Usuario enviado por email con exito');
        return back();

    }
}
