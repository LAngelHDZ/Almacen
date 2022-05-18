<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlmacenController extends Controller
{
    public function requisiciones(){
        return view('almacen.almacenes.requisicionesAlmacen');
    }
    
}
