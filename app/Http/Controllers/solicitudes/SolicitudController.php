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
         $userid=Auth::user()->id;

        $usuario=User::join('empleados','users.id','=','empleados.id_user')
        ->join('areas','empleados.area','=','areas.id')
        ->join('departamentos','areas.id_departamento','=','departamentos.id')
        ->select('users.id','users.name','empleados.id as idempl','empleados.clave'
        ,'areas.area','areas.clave as cl_area','departamentos.departamentos','departamentos.clave as cl_dep')
        ->where('users.id',$userid)->get();

        $date = Carbon::now();
        $fecha = $date->format('Y-m-d');
        $year = $date->format('Y');
        $week = $date->format('m');
        $day = $date->format('d');

        
            $fecha = $date->format('Y-m-d');
            $prefolio = $year.''.$week.''.$day.''.$usuario[0]->cl_area;
        
        return view('almacen.solicitudes.prerequisicion',compact('usuario','fecha','prefolio'));

    }
}
