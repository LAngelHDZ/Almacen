<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class empleado extends Model
{
    use HasFactory;
    protected $fillable =[
        'clave',
        'id_user',
        'nss',
        'rfc',
        'fecha_nac',
        'direccion',
        'area',
        'cargo',

    ];
}
