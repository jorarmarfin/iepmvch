<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    protected $table = 'personal';
    protected $fillable = ['paterno', 'materno', 'nombres','dni','fechanacimiento','idpais','idubigeonacimiento','email','idestadocivil','numerohijos','idubigeo','direccion','telefonofijo','celular','universidad','culmino','carrera','idgestionuniversidad','gradoobtenido','fechaegreso','numerocolegiatura','idsistemapension','afp','vigente','llamadaatencion','memo','activo','idtipo'];
}
