<?php

namespace App\Http\Livewire\Almacen\RecursosM;

use App\Models\Productos;
use App\Models\solicitud;
use App\Models\solicitud_producto;
use App\Models\status_solicitud;
use Livewire\Component;
use Livewire\WithPagination;

class RequisicionesRh extends Component
{
    use WithPagination;
    public $products=[];
    public $id_solicitud;
    public function QuerySolicitud(){
      return  solicitud::join('status_solicituds as status','solicituds.id','=','status.id_solicitud')
        ->join('empleados','empleados.id','=','solicituds.id_empleado')
        ->join('users','users.id','=','empleados.id_user')
        ->select('solicituds.id','solicituds.folio','solicituds.descripcion','status.status','status.date','status.time','empleados.id_user','users.name')
        ->paginate(5);
    }

    public function mount(){

    }

    public function aceptar(){
        status_solicitud::create([
            'id_solicitud'=>$this->id_solicitud,
            'status'=>'Revisada',
            'descripcion'=>'Solicitud revisada y en proceso de autorización',
            'date'=>date('Y-m-d'),
            'time'=>date('H:i:s'),
        ]);

        $this->showmodal();

    }

    public function inforeq($id){
        $this->id_solicitud=$id;
       $products = solicitud::
    //    $products = solicitud_producto::all();
       join('solicitud_productos','solicitud_productos.idsolicitud','=','solicituds.id')
   ->join('productos','solicitud_productos.idproducto','=','productos.id')
   ->select('solicitud_productos.idsolicitud','solicitud_productos.cantidad','productos.producto','productos.clave_producto as clave')
//    ->select('solicitud_productos.idsolicitud','solicitud_productos.cantidad')
        ->where('solicitud_productos.idsolicitud',$id)
        ->get();
        foreach($products as $data){
            $this->products[]=['clave'=>$data->clave,'producto'=>$data->producto,'cantidad'=>$data->cantidad];
        }
        $this->showmodal();
    }
     
    public function showmodal(){
        $this->dispatchBrowserEvent('show-form');
   }

   public function closemodal(){
    $this->dispatchBrowserEvent('close-form');
    $this->resetdatos();
}

public function resetdatos(){
    $this->reset([
        'products'
    ]);
}

    public function render()
    {
        return view('livewire.almacen.recursos-m.requisiciones-rh',['solicitudes'=> $this->QuerySolicitud()]);
    }

    
}
