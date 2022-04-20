<?php

namespace App\Http\Livewire\Almacen\General;

use App\Models\empleado;
use App\Models\solicitud;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class HistorialRequisiciones extends Component
{
    use WithPagination;
    public $solicitud=[];
    public function mount(){
        $empleado=empleado::where('id_user',auth()->user()->id)->get();
        $list= solicitud::join('status_solicituds as status','solicituds.id','=','status.id_solicitud')
        ->select('solicituds.id','solicituds.folio','solicituds.id_empleado','status.date','status.time','status.status','status.descripcion')
        ->where('solicituds.id_empleado',$empleado[0]->id)->Orderby('solicituds.id','desc')->get();
         foreach($list as $data){
             $this->solicitud[]=[
             'folio'=> $data->folio,
             'date'=>$this->formatdate($data->date),
             'descripcion'=>$data->descripcion,
             'status'=>$data->status,
             'time'=>$data->time];
         }
    }

    public function formatday($day){
        $dia='';
        switch($day){
            case 'Monday':$dia='Lunes'; break;
            case 'Tuesday':$dia='Martes'; break;
            case 'Wednesday':$dia='Miercoles'; break;
            case 'Thursday':$dia='Jueves'; break;
            case 'Friday':$dia='Viernes'; break;
            case 'Saturday':$dia='Sabado'; break;
            case 'Sunday':$dia='Domingo'; break;
        }
        return $dia;
    }
    public function formatmount($mount){
        $mes='';
        switch($mount){
            case 'January':$mes='Enero'; break;
            case 'February':$mes='Febrero'; break;
            case 'March':$mes='Marzo'; break;
            case 'April':$mes='Abril'; break;
            case 'May':$mes='Mayo'; break;
            case 'June':$mes='Junio'; break;
            case 'July':$mes='Julio'; break;
            case 'August':$mes='Agosto'; break;
            case 'September':$mes='Septiembre'; break;
            case 'October':$mes='Octubre'; break;
            case 'November':$mes='Noviembre'; break;
            case 'December':$mes='Diciembre'; break;
        }
        return $mes;
    }

    public function formatdate($date){
        $dat= new Carbon($date);
        return $this->formatday(date_format($dat,'l')).' '.date_format($dat,'d').' de '.$this->formatmount(date_format($dat,'F')).' del '.date_format($dat,'Y');
    }
    public function render()
    {

        return view('livewire.almacen.general.historial-requisiciones');
    }
}
