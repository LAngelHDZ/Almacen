<?php

namespace App\Http\Livewire\Almacen\General;

use App\Models\empleado;
use Livewire\Component;
use App\Models\hist_salida;

class HitorialSalidas extends Component
{
    public function registrosalidas(){
        return hist_salida::join('productos','productos.id','=','hist_salidas.id_producto')
         ->join('empleados','empleados.id','=','hist_salidas.id_empleado')
         ->join('users','empleados.id_user','=','users.id')
         ->select('productos.producto','users.name','hist_salidas.date','hist_salidas.time','hist_salidas.cantidad')
        ->where('hist_salidas.id_empleado', empleado::where('id_user',auth()->user()->id)->get()[0]->id )
         ->get();
     }
    public function render()
    {
        return view('livewire.almacen.general.hitorial-salidas',['salidas'=>$this->registrosalidas()]);
    }
}
