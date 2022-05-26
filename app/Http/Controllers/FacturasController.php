<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FacturasController extends Controller
{
    public function index(){
        return view('almacen.finanzas.facturas');
    }

    public function stock(){
        return view('almacen.finanzas.stock');
    }
}
