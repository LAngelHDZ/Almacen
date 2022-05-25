<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class registro_entrada extends Model
{

    protected $fillable = [
        'reg_factura_pro',
        'fecha',
        'time',
    ];
    use HasFactory;
}
