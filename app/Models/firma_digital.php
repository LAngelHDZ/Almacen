<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class firma_digital extends Model
{
    use HasFactory;

    protected $fillable=[
        'firma',
        'id_empleado',
    ];
}
