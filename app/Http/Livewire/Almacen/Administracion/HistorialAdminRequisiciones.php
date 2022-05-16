<?php

namespace App\Http\Livewire\Almacen\Administracion;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\solicitud;
use App\Models\status_solicitud;

class HistorialAdminRequisiciones extends Component
{
    public $products=[];
    public $openbtn=true;
    public $solicitudes=[];
    public $id_solicitud,$aux;
    public $status, $filter_status='Revisada';
    public $seguimiento=[];
    public $solicitud=[];

    public function querysoliitudes(){
        $filter=$this->filter_status;
        $status=true;
        // $empleado=empleado::where('id_user',auth()->user()->id)->get();
        $list = solicitud::join('empleados','empleados.id','=','solicituds.id_empleado')
        ->join('users','users.id','=','empleados.id_user')
        ->join('status_solicituds as status','.id_solicitud','=','solicituds.id')
        ->select('solicituds.active','solicituds.id','solicituds.folio','solicituds.descripcion','empleados.id_user','users.name')
        ->where(function ($query) use ($filter,$status) {
            $query->where('status.status',$filter )
                  ->where('solicituds.state',$status);
          })
        ->Orderby('status.date','desc')->Orderby('status.time','desc')
        ->paginate(5);
        //relleno el areglo con los datos
         foreach($list as $data){
            $this->solicitud[]=[
             'id'=>$data->id,  //id de solicitud
             'folio'=> $data->folio,  //folio de la solicitud
             'dateA'=>$this->values($data->id,'dateA'),  //metodo a la cual le paso el id de solicitud para que muestre ciertas fechas de status en español
             'dateC'=>$this->values($data->id,'dateC'),  //metodo a la cual le paso el id de solicitud para que muestre ciertas fechas de status en español
            //  'time'=>$this->values($data->id,'time'), // Lo mismo que fecha solo que con la hora
            //  'descripcion'=>$this->values($data->id,'descripcion'), //metodo que le paso el id de solicitud para que me consulte la descripcion e los status
             // aqui al metodo le pasu la colecion de los status   para determinar que icono, color y status se va a mostrar dependiendo de como valla el seguimiento
            //  'icon'=>$this->classobject(status_solicitud::select('status')->where('id_solicitud',$data->id)->latest('id')->first()->status, 'icon'),
            //  'class'=>$this->classobject(status_solicitud::select('status')->where('id_solicitud',$data->id)->latest('id')->first()->status, 'color'),
            //  'status'=>$this->classobject(status_solicitud::select('status')->where('id_solicitud',$data->id)->latest('id')->first()->status,'status'),
            ];
         }
        //  $this->aux=status_solicitud::count(); // realizo un contedo de los status
         return $this->solicitud;

    }

    public function values($id,$atribute){
        $des =status_solicitud::select('date','status')->where('id_solicitud',$id)->get();
        // $desc =status_solicitud::select($atribute,'status')->where('id_solicitud',$id)->count();
        // $auxiliar=null;
        $value=null;
            foreach($des as $index=> $data){
                if($data->status=='Enviada' && $atribute=='dateA'){
                $value =  $this->formatdate($value);
                   break;
                }
                
                if($data->status=='Cerrada' && $atribute=='dateC'){
                    $value =  $this->formatdate($value);
                    break;
                }
            }
       
        //   if($atribute=='date'){
        //     $value =  $this->formatdate($value);
        //   }
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
        return view('livewire.almacen.administracion.historial-admin-requisiciones');
    }
}
