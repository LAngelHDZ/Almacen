<?php

namespace App\Http\Livewire\Almacen\RecursosM;

use App\Events\RealtimeEventSolicitud;
use App\Models\Productos;
use App\Models\solicitud;
use App\Models\solicitud_producto;
use App\Models\status_solicitud;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class RequisicionesRh extends Component
{
    use WithPagination;
    public $products=[];
    public $solicitudes=[];
    public $id_solicitud,$aux;
    public $status, $filter_status;
    public $seguimiento=[];
    // protected $listeners = ['refresh' => 'updateview'];
    protected $listeners = ['echo:solicitud,RealtimeEventSolicitud' => 'updateview'];
    public function QuerySolicitud(){
      $list = solicitud::join('empleados','empleados.id','=','solicituds.id_empleado')
        ->join('users','users.id','=','empleados.id_user')
        // ->join('status_solicituds as status','.id_solicitud','=','solicituds.id')
        ->select('solicituds.id','solicituds.folio','solicituds.descripcion','empleados.id_user','users.name')
        // ->where('status.status',)
        // ->where('status.status',)->latest('id')->first()->status
        ->paginate(5);
        return $list;
     $this->aux=solicitud::count();
    }

    public function querydate(){
        $this->reset([
            'solicitudes',
        ]);

        foreach($this->QuerySolicitud() as $data){
            $this->solicitudes[]=[
            'date'=>$this->formatdate(status_solicitud::select('date')->where('id_solicitud',$data->id)->latest('id')->first()->date),
            'status'=>status_solicitud::select('status')->where('id_solicitud',$data->id)->latest('id')->first()->status,
            'time'=>status_solicitud::select('time')->where('id_solicitud',$data->id)->latest('id')->first()->time,
            // 'class'=>$this->classobject(status_solicitud::where('id_solicitud',$data->id)->count(), 'color'),
            // 'icon'=>$this->classobject(status_solicitud::where('id_solicitud',$data->id)->count(),'icon')
        ];
        }
    }

    public function filterquery($var){
        // $this->reset([
        //     'filter_status',
        // ]);
        $this->filter_status=$var;
    }

    public function seguimiento(){
        $this->reset([
            'seguimiento',
        ]);
        foreach($this->QuerySolicitud() as $data){
            $this->seguimiento[]=[
                // 'status' => status_solicitud::select('status')->where('id_solicitud',$data->id)->get(),
                 'status' =>$this->status_seguimiento(status_solicitud::select('status')->where('id_solicitud',$data->id)->get(), 'status'),
                 'icon' =>$this->status_seguimiento(status_solicitud::select('status')->where('id_solicitud',$data->id)->get(), 'icon'),
            ];
        }
    }

    public function status_seguimiento($array,$object ){
        $status_array=[];
        foreach($array as $data){
            if($object=='status'){
                switch($data->status){
                    case 'Revisada':$status_array[]=['status'=>'Revisado']; break;
                    case 'Aprobada':$status_array[]=['status'=>'Aprobado']; break;
                    case 'Transito':$status_array[]=['status'=>'Transito']; break;
                    case 'Almacen':$status_array[]=['status'=>'Almacen']; break;
                }
            }else{
                switch($data->status){
                    case 'Revisada':$status_array[]=['icon'=>'fas fa-envelope-open-text mx-3']; break;
                    case 'Aprobada':$status_array[]=['icon'=>'fas fa-clipboard-check mx-3']; break;
                    case 'Transito':$status_array[]=['icon'=>'fas fa-shipping-fast mx-3']; break;
                    case 'Almacen':$status_array[]=['icon'=>'fas fa-archive mx-3']; break;
                }
            }
        }
         return $status_array;

    }

    public function updateview(){
        if(solicitud::count()!=$this->aux){
            $this->reset([
                'solicitudes',
            ]);
            $this->mount();
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
    public function formatweek($week){
        $mes='';
        switch($week){
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
        return $this->formatday(date_format($dat,'l')).' '.date_format($dat,'d').' de '.$this->formatweek(date_format($dat,'F')).' del '.date_format($dat,'Y');
    }

    public function aceptar(){
        status_solicitud::create([
            'id_solicitud'=>$this->id_solicitud,
            'status'=>'Revisada',
            'descripcion'=>'Solicitud revisada y en proceso de autorización',
            'date'=>date('Y-m-d'),
            'time'=>date('H:i:s'),
        ]);
        event(new RealtimeEventSolicitud);

        $this->closemodal();
        $this->resetdatos();
    }

    public function inforeq($id){
        $this->id_solicitud=$id;
        $status='';
       $products = solicitud::
       join('solicitud_productos','solicitud_productos.idsolicitud','=','solicituds.id')
   ->join('productos','solicitud_productos.idproducto','=','productos.id')
   ->select('solicitud_productos.idsolicitud','solicitud_productos.cantidad','productos.producto','productos.clave_producto as clave')
        ->where('solicitud_productos.idsolicitud',$id)
        ->get();
        foreach($products as $data){
            $this->products[]=['clave'=>$data->clave,'producto'=>$data->producto,'cantidad'=>$data->cantidad];

        }
        $status=status_solicitud::select('status')->where('id_solicitud',$id)->latest('id')->first()->status;
        if($status!='Enviada'){
                $this->status=true;
            }else{
            $this->status=false;

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
        'products',
        'id_solicitud',
        // 'status',
    ]);
}

    public function render()
    {
        return view('livewire.almacen.recursos-m.requisiciones-rh',['solicitud'=> $this->QuerySolicitud(), $this->querydate(),$this->seguimiento()]);
    }


}
