<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function peticiones(){

        return view('almacen.general.H_requisiciones');
    }
    public function historial(){

        return view('almacen.general.historial');
    }
    // public function adminlte(){
    //     return view('almacen.adminlte');
    // }
}
