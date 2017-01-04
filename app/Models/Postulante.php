<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Postulante extends Model
{
    protected $table = 'postulante';
    protected $fillable = ['nombres', 'telefonos', 'email','dni','idgrado','idasignatura','observacion','fechaentrevista','idestado'];
}
