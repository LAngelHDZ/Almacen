<?php

namespace App\Http\Livewire\Almacen\RecursosM;

use App\Models\solicitud;
use Livewire\Component;
use Livewire\WithPagination;

class RequisicionesRh extends Component
{
    use WithPagination;

    public function QuerySolicitud(){
      return  solicitud::join('status_solicituds as status','solicituds.id','=','status.id_solicitud')
        ->join('empleados','empleados.id','=','solicituds.id_empleado')
        ->join('users','users.id','=','empleados.id_user')
        ->select('solicituds.id','solicituds.folio','solicituds.descripcion','status.status','status.date','status.time','empleados.id_user','users.name')
        ->paginate(3);
    }
     

    public function render()
    {
        return view('livewire.almacen.recursos-m.requisiciones-rh',['solicitudes'=> $this->QuerySolicitud()]);
    }
}
