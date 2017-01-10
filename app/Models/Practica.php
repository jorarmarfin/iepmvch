<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Practica extends Model
{
    protected $table = 'practica';
    protected $fillable = ['idmatricula', 'idtipo', 'nota'];
}
