<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class factura extends Model
{

    protected $fillable=[
        'no_factura',
        'idproveedor',
        'descripcion',
        'fecha_elaboracion',
    ];
    use HasFactory;
}
