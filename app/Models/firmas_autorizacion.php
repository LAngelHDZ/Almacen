<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class firmas_autorizacion extends Model
{
    use HasFactory;

    protected $fillable=[
        'id_firma',
        'id_solicitud',
    ];
}
