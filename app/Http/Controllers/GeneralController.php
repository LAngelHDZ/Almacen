<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function historial(){

        return view('almacen.general.H_requisiciones');
    }
    public function adminlte(){
        return view('almacen.adminlte');
    }
}
