<?php

namespace App\Http\Livewire\Almacen\General;

use App\Models\empleado;
use App\Models\solicitud;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class HistorialRequisiciones extends Component
{

    public $solicitud=[];

    public function mount(){
        $empleado=empleado::where('id_user',auth()->user()->id)->get();
        $list= solicitud::join('status_solicituds as status','solicituds.id','=','status.id_solicitud')
        ->select('solicituds.folio','solicituds.id_empleado','status.date','status.time','status.status','status.descripcion')
        ->where('solicituds.id_empleado',$empleado[0]->id)->get();

         foreach($list as $data){
             $this->solicitud[]=[
             'folio'=> $data->folio,
             'date'=>$data->date,
             'descripcion'=>$data->descripcion,
             'status'=>$data->status,
             'time'=>$data->time];
         }
    }
    public function render()
    {

        return view('livewire.almacen.general.historial-requisiciones');
    }
}
