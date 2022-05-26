<?php

namespace App\Http\Livewire\Almacen\General;

use Livewire\Component;
use App\Models\empleado;
use App\Models\materiales;

class MaterialesUser extends Component
{
    public function Querymaterial(){
        $empleado=empleado::where('id_user',auth()->user()->id)->get();
      return  materiales::join('productos','productos.id','materiales.id_producto')
        ->join('empleados','empleados.id','materiales.id_empleado')
        ->select('productos.clave_producto as clave','productos.producto','materiales.stock')
        ->where('materiales.id_empleado',$empleado[0]->id)
        ->get();
    }

    public function render()
    {
        return view('livewire.almacen.general.materiales-user',['stock'=>$this->Querymaterial()]);
    }
}
