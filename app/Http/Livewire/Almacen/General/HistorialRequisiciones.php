<?php

namespace App\Http\Livewire\Almacen\General;

use App\Models\empleado;
use App\Models\solicitud;
use App\Models\status_solicitud;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class HistorialRequisiciones extends Component
{

    protected $listeners = ['echo:solicitud,RealtimeEventSolicitud' => 'updateview'];
    use WithPagination;
    public $solicitud=[],$aux;

    public function mount(){
        
        $empleado=empleado::where('id_user',auth()->user()->id)->get();
        $list= solicitud::select('id','folio','id_empleado')
        ->where('id_empleado',$empleado[0]->id)->Orderby('solicituds.id','desc')->get();
         foreach($list as $data){
             $this->solicitud[]=[
             'folio'=> $data->folio,
             'date'=>$this->formatdate(status_solicitud::select('date')->where('id_solicitud',$data->id)->latest('id')->first()->date),
             'descripcion'=>status_solicitud::select('descripcion')->where('id_solicitud',$data->id)->latest('id')->first()->descripcion,
             'status'=>status_solicitud::select('status')->where('id_solicitud',$data->id)->latest('id')->first()->status,
             'time'=>status_solicitud::select('time')->where('id_solicitud',$data->id)->latest('id')->first()->time,
             'class'=>$this->classobject(status_solicitud::where('id_solicitud',$data->id)->count(), 'color'),
             'icon'=>$this->classobject(status_solicitud::where('id_solicitud',$data->id)->count(),'icon')];
         }
         $this->aux=status_solicitud::count();
    }

    public function updateview(){
        if(status_solicitud::count()!=$this->aux){
            $this->reset([
                'solicitud'
            ]);
            $this->mount();
        }
    }

public function classobject($count, $type){
    $object='';
    if($type=='color'){
        switch($count){
            case 1:  $object='bg-gray-500'; break;
            case 2:  $object='bg-warning'; break;
            case 3:  $object='bg-green-700'; break;
            case 4:  $object='bg-blue'; break;
        }
    }else{
        switch($count){
            case 1:  $object='fas fa-lg fa-paper-plane'; break;
            case 2:  $object='fas fa-lg fa-clipboard-check'; break;
            case 3:  $object='bg-green-700'; break;
            case 4:  $object='bg-blue'; break;
        }
    }
return $object;
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
