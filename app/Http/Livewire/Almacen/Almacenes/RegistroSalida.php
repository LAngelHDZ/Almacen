<?php

namespace App\Http\Livewire\Almacen\Almacenes;

use App\Models\hist_salida;
use Livewire\Component;

class RegistroSalida extends Component
{
    public $salidasr=[];
    public function registrosalidas(){
       return hist_salida::join('productos','productos.id','=','hist_salidas.id_producto')
        ->join('empleados','empleados.id','=','hist_salidas.id_empleado')
        ->join('users','empleados.id_user','=','users.id')
        ->select('productos.producto','users.name','hist_salidas.date','hist_salidas.time')
        ->get();
    }


    public function showmodal(){
        $this->dispatchBrowserEvent('show-form');
    }

    public function closemodal(){
        $this->dispatchBrowserEvent('close-form');
        }

    public function render()
    {
        return view('livewire.almacen.almacenes.registro-salida',['salidas'=>$this->registrosalidas()]);
    }
}
