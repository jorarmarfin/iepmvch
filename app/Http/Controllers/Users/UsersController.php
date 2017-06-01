<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Styde\Html\Facades\Alert;
class UsersController extends Controller
{

    public function perfil()
    {
        $user = Auth::user();
        return view('users.index',compact('user'));
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
        $user = User::find($id);
        if($request->has('password')){
            $user->fill($request->all());
            $user->save();
        }
        Alert::success('Datos actualizados con exito');
        return redirect()->route('home.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
