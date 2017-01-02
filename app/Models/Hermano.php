<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hermano extends Model
{
    protected $table = 'hermano';
    protected $fillable = ['nombres', 'descripcion', 'edad','idalumno'];
}
