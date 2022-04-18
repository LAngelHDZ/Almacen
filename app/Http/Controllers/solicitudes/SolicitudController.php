<?php

namespace App\Http\Controllers\solicitudes;

use App\Http\Controllers\Controller;
use App\Models\empleado;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SolicitudController extends Controller
{
    public $datos;
    public function prerequicision(){
        return view('almacen.solicitudes.prerequisicion');
    }
}
