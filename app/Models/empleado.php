<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class empleado extends Model
{
    use HasFactory;
    protected $fillable =[
        'id_empelado',
        'id_user',
        'nss',
        'rfc',
        'nombre',
        'apaterno',
        'amaterno',
        'fecha_nac',
        'direccion',
        'cargo',

    ];
}
