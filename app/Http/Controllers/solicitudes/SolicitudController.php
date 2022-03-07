<?php

namespace App\Http\Controllers\solicitudes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SolicitudController extends Controller
{
    public function prerequicision(){
        return view('almacen.solicitudes.prerequisicion');

    }
}
