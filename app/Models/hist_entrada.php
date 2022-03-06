<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hist_entrada extends Model
{
    use HasFactory;

    protected $fillable=[
        'id_producto',
        'id_solicitud',
    ];
}
