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
    public $seguimiento=[];

    public function mount(){
        $empleado=empleado::where('id_user',auth()->user()->id)->get();
        $list= solicitud::select('id','folio','id_empleado')
        ->where('id_empleado',$empleado[0]->id)->Orderby('solicituds.id','desc')->get();
         foreach($list as $data){
            $this->solicitud[]=[
             'id'=>$data->id,
             'folio'=> $data->folio,
             'date'=>$this->values($data->id,'date'),
             'time'=>$this->values($data->id,'time'),
             'descripcion'=>$this->values($data->id,'descripcion'),
             'icon'=>$this->classobject(status_solicitud::select('status')->where('id_solicitud',$data->id)->latest('id')->first()->status, 'icon'),
             'class'=>$this->classobject(status_solicitud::select('status')->where('id_solicitud',$data->id)->latest('id')->first()->status, 'color'),
             'status'=>$this->classobject(status_solicitud::select('status')->where('id_solicitud',$data->id)->latest('id')->first()->status,'status'),
            ];
         }
         $this->aux=status_solicitud::count();

         return $this->solicitud;
    }

    public function seguimiento(){
        $this->reset([
            'seguimiento',
        ]);
        foreach($this->solicitud as $data){
            $this->seguimiento[]=[
                 'status' =>$this->status_seguimiento(status_solicitud::select('status')->where('id_solicitud',$data['id'])->get(), 'status'),
                 'icon' =>$this->status_seguimiento(status_solicitud::select('status')->where('id_solicitud',$data['id'])->get(), 'icon'),
            ];
        }
    }

    public function status_seguimiento($array,$object ){
        $status_array=[];
        foreach($array as $data){
            if($object=='status'){
                switch($data->status){
                    case 'Enviada':$status_array[]=['status'=>'Enviada']; break;
                    case 'Aprobada':$status_array[]=['status'=>'Aprobada']; break;
                    case 'Rechazada':$status_array[]=['status'=>'Rechazada']; break;
                    case 'Transito':$status_array[]=['status'=>'Transito']; break;
                    case 'Almacen':$status_array[]=['status'=>'Almacen']; break;
                }
            }else{
                switch($data->status){
                    case 'Enviada':$status_array[]=['icon'=>'fas fa-lg fa-paper-plane mx-2']; break;
                    case 'Aprobada':$status_array[]=['icon'=>'fas fa-clipboard-check mx-3']; break;
                    case 'Rechazada':$status_array[]=['icon'=>'far fa-file-excel mx-4']; break;
                    case 'Transito':$status_array[]=['icon'=>'fas fa-shipping-fast mx-3']; break;
                    case 'Almacen':$status_array[]=['icon'=>'fas fa-archive mx-3']; break;
                }
            }
        }
         return $status_array;
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
            case 'Enviada'  :  $object='bg-gray-500'; break;
            case 'Revisada'  :  $object='bg-gray-500'; break;
            case 'Aprobada' :  $object='bg-green-700'; break;
            case 'Rechazada':  $object='bg-red-700'; break;
            case 'Transito' :  $object='bg-blue-700'; break;
            case 'Almacen'  :  $object='bg-black'; break;
        }
    }else if($type=='icon'){
        switch($count){
            case 'Enviada'  :  $object='fas fa-lg fa-paper-plane'; break;
            case 'Revisada'  :  $object='fas fa-lg fa-paper-plane'; break;
            case 'Aprobada' :  $object='fas fa-lg fa-clipboard-check'; break;
            case 'Rechazada':  $object='far fa-file-excel'; break;
            case 'Transito' :  $object='fas fa-shipping-fast'; break;
            case 'Almacen'  :  $object='fas fa-archive'; break;
        }
    }else{
        switch($count){
            case 'Enviada' :$object='enviada'; break;
            case 'Revisada' :$object='enviada'; break;
            case 'Aprobada' :$object='aprobada'; break;
            case 'Rechazada':$object='Rechazada'; break;
            case 'Transito' :$object='Transito'; break;
            case 'Almacen'  :$object='Almacen'; break;
        }
    }
return $object;
}

public function values($id,$atribute){
    $des =status_solicitud::select($atribute,'status')->where('id_solicitud',$id)->get();
    $desc =status_solicitud::select($atribute,'status')->where('id_solicitud',$id)->count();
    $auxiliar=null;
    $value=null;
    if($desc==2){
        foreach($des as $index=> $data){
            if($data->status=='Revisada'){
                $value=$auxiliar;
            }else{
                $auxiliar=$data->$atribute;
            }
        }
    }else{
        $value = status_solicitud::select($atribute,'status')->where('id_solicitud',$id)->latest('id')->first()->$atribute;
    }
      if($atribute=='date'){
        $value =  $this->formatdate($value);
      }
    return $value;   
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

        return view('livewire.almacen.general.historial-requisiciones',[$this->seguimiento()]);
    }
}
