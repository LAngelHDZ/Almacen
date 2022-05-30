<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class materiales extends Model
{

    protected $fillable = [
        'id_empleado',
        'id_producto',
        'stock',
    ];
    use HasFactory;
}
