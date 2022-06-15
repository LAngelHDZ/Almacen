<?php

namespace App\Http\Livewire\Almacen\Almacenes;

use App\Models\empleado;
use App\Models\hist_salida;
use App\Models\materiales;
use App\Models\User;
use Livewire\Component;

class RegistroSalida extends Component
{
    public $idproducto, $id_empleado, $cantidad,$user;
    public $disponible=[];
    public function registrosalidas(){
       return hist_salida::join('productos','productos.id','=','hist_salidas.id_producto')
        ->join('empleados','empleados.id','=','hist_salidas.id_empleado')
        ->join('users','empleados.id_user','=','users.id')
        ->select('productos.producto','users.name','hist_salidas.date','hist_salidas.time')
        ->get();
    }

    public function search_user(){
$this->resetdata();
         $this->id_empleado= empleado::select('id')
         ->where('id_user',User::select('id')->where('name',$this->user)->get()[0]->id)
         ->get()[0]->id;

     $materiales=materiales::join('productos','productos.id','materiales.id_producto')
     ->join('empleados','empleados.id','materiales.id_empleado')
     ->select('productos.clave_producto as clave','productos.producto','materiales.stock','productos.id as id_producto')
     ->where('materiales.id_empleado',$this->id_empleado)
     ->get();

     foreach($materiales as $index=> $data){
        $this->disponible[]=['clave'=>$data->clave, 'producto'=>$data->producto, 'stock'=>$data->stock,'id_prod'=>$data->id_producto];
     }
    }

    public function registrarsalida(){
        hist_salida::create(
            [
                'id_producto'=>$this->idproducto,
                'id_empleado'=>$this->idempleado,
                'cantidad'=>$this->cantidad,
                'Representante'=>"",
                'date'=> date('Y-m-d'),
                'time'=> date('H:i:s'),
            ]
        );
    }


    public function showmodal(){
        $this->dispatchBrowserEvent('show-form');
    }

    public function closemodal(){
        $this->dispatchBrowserEvent('close-form');
        }

        public function resetdata(){
            $this->reset(
                [
                    'disponible'
                ]
            );
        }
    public function render()
    {
        return view('livewire.almacen.almacenes.registro-salida',['salidas'=>$this->registrosalidas()]);
    }
}
