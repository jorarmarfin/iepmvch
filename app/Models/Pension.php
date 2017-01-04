<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pension extends Model
{
    protected $table = 'pension';
    protected $fillable = ['idnivel', 'monto','activo'];
}
