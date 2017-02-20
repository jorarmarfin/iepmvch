<?php

namespace App;

use App\Models\Catalogo;
use App\Notifications\ResetPassword;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password','idrole','foto','activo','username','menu'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    /**
     * Establecemos el la relacion con catalogo
     * @return [type] [description]
     */
    public function role()
    {
        return $this->hasOne('\App\Models\Catalogo','id','idrole');
    }
    /**
     * Atributos Email
     */
    public function setEmailAttribute($value)
    {
        $this->attributes['email'] = strtolower($value);
    }
    /**
     * Atributos de la clase Users
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
    /**
     * Atributos menu
     */
    public function setidroleAttribute($value)
    {
        $this->attributes['idrole'] = $value;
        $role = Catalogo::find($value);
        switch ($role->codigo) {
            case 'adm':
                $this->attributes['menu'] = 'menu.sider-admin';
                break;
            case 'doc':
                $this->attributes['menu'] = 'menu.sider-doc';
                break;
            case 'psi':
                $this->attributes['menu'] = 'menu.sider-psi';
                break;
        }
    }
    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $name = $this->name;
        $this->notify(new ResetPassword($token,$name));
    }
}
