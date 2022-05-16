<?php

namespace App\Http\Livewire\Almacen\General;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\empleado;
use App\Models\solicitud;
use App\Models\status_solicitud;

class HistorialGeneral extends Component
{

    public $solicitud=[];

    public function querysoliitudes(){
        $empleado=empleado::where('id_user',auth()->user()->id)->get();
        $list= solicitud::select('id','folio','id_empleado','active')
        ->where('id_empleado',$empleado[0]->id)
        ->where('active',false)
        ->Orderby('solicituds.id','desc')->get();
        //relleno el areglo con los datos
         foreach($list as $data){
            $this->solicitud[]=[
             'id'=>$data->id,  //id de solicitud
             'folio'=> $data->folio,  //folio de la solicitud
             'dateA'=>$this->values($data->id,'dateA'),  //metodo a la cual le paso el id de solicitud para que muestre ciertas fechas de status en español
             'dateC'=>$this->values($data->id,'dateC'),  //metodo a la cual le paso el id de solicitud para que muestre ciertas fechas de status en español
             'status'=>$this->getstatus(status_solicitud::select('status')->where('id_solicitud',$data->id)->get()),
            //  'time'=>$this->values($data->id,'time'), // Lo mismo que fecha solo que con la hora
            //  'descripcion'=>$this->values($data->id,'descripcion'), //metodo que le paso el id de solicitud para que me consulte la descripcion e los status
             // aqui al metodo le pasu la colecion de los status   para determinar que icono, color y status se va a mostrar dependiendo de como valla el seguimiento
            //  'icon'=>$this->classobject(status_solicitud::select('status')->where('id_solicitud',$data->id)->latest('id')->first()->status, 'icon'),
            //  'class'=>$this->classobject(status_solicitud::select('status')->where('id_solicitud',$data->id)->latest('id')->first()->status, 'color'),
            ];
         }
        //  $this->aux=status_solicitud::count(); // realizo un contedo de los status
         return $this->solicitud;

    }

    public function getstatus($status){

        foreach($status as $index => $data){
                if($data->status =='Aprobada' || $data->status=='Rechazada'){
                    $status=$data->status;
                    break;
                }
        }
        return $status;
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
        return view('livewire.almacen.general.historial-general',['solicitudes'=> $this->querysoliitudes()]);
    }
}
