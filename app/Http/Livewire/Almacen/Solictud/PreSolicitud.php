<?php

namespace App\Http\Livewire\Almacen\Solictud;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PreSolicitud extends Component
{

    public $datas=[];
    public $usuario;

    public function mount(){
    $userid=Auth::user()->id;

    $usuario=User::join('empleados','users.id','=','empleados.id_user')
    ->join('areas','empleados.area','=','areas.id')
    ->join('departamentos','areas.id_departamento','=','departamentos.id')
    ->select('users.id','users.name','empleados.id as idempl','empleados.clave'
    ,'areas.area','areas.clave as cl_area','departamentos.departamento','departamentos.clave as cl_dep')
    ->where('users.id',$userid)->get();

    $date = Carbon::now();
    $fecha = $date->format('Y-m-d');
    $year = $date->format('y');
    $week = $date->format('m');
    $day = $date->format('d');
    $prefolio = $year.''.$week.''.$day.''.$usuario[0]->cl_area;
    $this->datas[]=['fecha'=>$fecha,'prefolio'=>$prefolio,'usuario'=>$usuario];
    $this->usuario=$usuario;
}


    public function render()
    {
        return view('livewire.almacen.solictud.pre-solicitud');
    }
}
