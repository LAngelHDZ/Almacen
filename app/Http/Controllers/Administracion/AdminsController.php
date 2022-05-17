<?php

namespace App\Http\Controllers\Administracion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminsController extends Controller
{
    public function requisicionesA(){
 return View('almacen.Administracion.administrador');
    }


    public function historialreq(){
 return View('almacen.Administracion.historial');
    }
}
