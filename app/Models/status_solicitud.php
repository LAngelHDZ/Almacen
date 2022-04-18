<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class status_solicitud extends Model
{
    use HasFactory;

    protected $fillable=[
        'id_solicitud',
        'status',
        'descripcion',
        'date',
        'time',
    ];
}
