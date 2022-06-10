<?php

namespace App\Http\Livewire\Almacen\Almacenes;

use App\Models\hist_salida;
use App\Models\materiales;
use App\Models\User;
use Livewire\Component;

class RegistroSalida extends Component
{
    public $idproducto, $idempleado, $cantidad,$user;
    public $disponible=[];
    public function registrosalidas(){
       return hist_salida::join('productos','productos.id','=','hist_salidas.id_producto')
        ->join('empleados','empleados.id','=','hist_salidas.id_empleado')
        ->join('users','empleados.id_user','=','users.id')
        ->select('productos.producto','users.name','hist_salidas.date','hist_salidas.time')
        ->get();
    }

    public function search(){
        // $this->user=User::where();

     $this->disponible=materiales::join('productos','productos.id','materiales.id_producto')
     ->join('empleados','empleados.id','materiales.id_empleado')
     ->select('productos.clave_producto as clave','productos.producto','materiales.stock')
     ->where('materiales.id_empleado',$this->idempleado)
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
