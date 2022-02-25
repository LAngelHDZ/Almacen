<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlmacenController extends Controller
{
    public function catalogo(){

        return view('almacen.catalogo');
    }

    public function proveedor(){

        return view('almacen.proveedor');
    }

    public function producto(){

        return view('almacen.producto');
    }
}
