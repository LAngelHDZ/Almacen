<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    use HasFactory;

    protected $fillable = [
        'clave_producto',
        'producto',
        'marca',
        'descripcion',
        'categoria',
        'presentacion',
        'contenido',
        'unidad',
    ];

    public function proveedors()
    {
    	return $this->belongsToMany(Proveedor::class);
    }
}
