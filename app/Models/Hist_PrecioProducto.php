<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hist_PrecioProducto extends Model
{
    use HasFactory;

    protected $fillable = [
        'idcatalogo',
        'precio',
        'fecha',

    ];
}
