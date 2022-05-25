<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productos_factura extends Model
{

    protected $fillable = [
        'id_factura',
        'id_producto',
        'id_solicitud',
        'cantidad',
    ];
    use HasFactory;
}
