<?php

namespace App\Http\Livewire\Almacen\RecursosM;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Productos;
use App\Models\solicitud;
use App\Models\msmestatus;
use Livewire\WithPagination;
use App\Models\status_solicitud;
use App\Models\solicitud_producto;
use Illuminate\Support\Facades\DB;
use App\Events\RealtimeEventSolicitud;

class RequisicionesRh extends Component
{
    use WithPagination;
    public $products=[];
    public $listadoespera=true;
    public $concept_espera,$descripc;
    public $openbtn=true;
    public $btnenvio=true,$access=1;
    public $solicitudes=[];
    public $id_solicitud,$aux;
    public $id_aux;
    public $status, $filter_status='Enviada';
    public $seguimiento=[];
    public $close=false;
    public $aprobado=false, $idaprob;

    protected $listeners = ['echo:solicitud,RealtimeEventSolicitud' => 'updateview'];
    public function QuerySolicitud(){
        $filter=$this->filter_status;
        $status=true;
      $list = solicitud::join('empleados','empleados.id','=','solicituds.id_empleado')
        ->join('users','users.id','=','empleados.id_user')
        ->join('status_solicituds as status','.id_solicitud','=','solicituds.id')
        ->select('solicituds.id','solicituds.folio','solicituds.descripcion','empleados.id_user','users.name')
        ->where(function ($query) use ($filter,$status) {
            $query->where('status.status',$filter )
                  ->where('solicituds.state',$status);
          })
        ->Orderby('status.date','desc')->Orderby('status.time','desc')
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
        ];
        }
    }

    public function filterquery($var){
        $this->reset([
            'filter_status',
        ]);

        switch ($var){
            case 1: $this->filter_status='Enviada'; break;
            case 2: $this->filter_status='Revisada'; break;
            case 3: $this->filter_status='Aprobada'; break;
            case 4: $this->filter_status='Rechazada'; break;
            case 5: $this->filter_status='Transito'; break;
            default: $this->filter_status='Almacen'; break;
        }

    }

    public function seguimiento(){
        $this->reset([
            'seguimiento',
        ]);
        foreach($this->QuerySolicitud() as $data){
            $this->seguimiento[]=[
                // 'status' => status_solicitud::select('status')->where('id_solicitud',$data->id)->get(),
                 'status' =>$this->status_seguimiento(status_solicitud::select('status')->where('id_solicitud',$data->id)->get(), 'status'),
                 'icon'   =>$this->status_seguimiento(status_solicitud::select('status')->where('id_solicitud',$data->id)->get(), 'icon'),
                 'close'  =>$this->solicitud_close(status_solicitud::select('status')->where('id_solicitud',$data->id)->latest('id')->first()->status),
                 'aprob'  =>$this->solicitud_aprob(status_solicitud::select('status')->where('id_solicitud',$data->id)->latest('id')->first()->status),
            ];
        }
    }

    public function solicitud_close($status){


            $close='';
            if($status =='Rechazada' || $status =='Almacen'){
                $close=true;
            }else{
                $close=false;
            }
            return $close;
            $this->btnenvior=false;

    }
    public function solicitud_aprob($status){

            $close='';
            if($status =='Aprobada'){
                $close=true;
            }else{
                $close=false;
            }
            return $close;

    }

    public function status_seguimiento($array,$object ){
        $status_array=[];
        foreach($array as $data){
            if($object=='status'){
                switch($data->status){
                    case 'Revisada':$status_array[]=['status'=>'Revisado']; break;
                    case 'Aprobada':$status_array[]=['status'=>'Aprobado'];  break;
                    case 'Rechazada':$status_array[]=['status'=>'Rechazada']; $this->close=true; break;
                    case 'Transito':$status_array[]=['status'=>'Transito'];  break;
                    case 'Almacen':$status_array[]=['status'=>'Almacen']; break;
                }
            }else{
                switch($data->status){
                    case 'Revisada':$status_array[]=['icon'=>'fas fa-envelope-open-text mx-3']; break;
                    case 'Aprobada':$status_array[]=['icon'=>'fas fa-clipboard-check mx-3']; break;
                    case 'Rechazada':$status_array[]=['icon'=>'fas fa-file-excel mx-4']; break;
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
       $id=$this->id_solicitud;
        if($this->btnenvio && $this->access<=1){
            if(status_solicitud::where('id_solicitud',$id)->where('status','Revisada')->count() ==0 && $id!=null){
        $id_descripcion = msmestatus::select('id')->where('typestatus','Revisada')->get();

                status_solicitud::create([
                    'id_solicitud'=>$this->id_solicitud,
                    'status'=>'Revisada',
                    'descripcion'=>$id_descripcion[0]->id,
                    'date'=>date('Y-m-d'),
                    'time'=>date('H:i:s'),
                ]);
                event(new RealtimeEventSolicitud);
                $this->btnenvio=false;
                $this->access+=1;
                $this->closemodal();
            }
        }


        }
        public function aprob_req(){

        if($this->btnenvio && $this->access<=1){
           if(status_solicitud::where('id_solicitud',$this->idaprob)->where('status','Transito')->count() ==0){
        // $id_descripcion = msmestatus::select('id')->where('typestatus','Transito')->get();

               status_solicitud::create([
                   'id_solicitud'=>$this->idaprob,
                   'status'=>'Transito',
                   'descripcion'=>$this->descripc,
                   'date'=>date('Y-m-d'),
                   'time'=>date('H:i:s'),
                ]);

                // DB::table('solicituds')->where('id',$id)->update(['state'=>false]);
                event(new RealtimeEventSolicitud);
                $this->closemodaltran();
            }

            // $this->closemodal();
            $this->btnenvio=false;
            $this->access+=1;
        }
            $this->resetdatos();
    }
    public function close_req($id){
        if($this->btnenvio && $this->access<=1){
            if(status_solicitud::where('id_solicitud',$id)->where('status','Cerrada')->count() ==0){
            $id_descripcion = msmestatus::select('id')->where('typestatus','Cerrada')->get();

                status_solicitud::create([
                    'id_solicitud'=>$id,
                    'status'=>'Cerrada',
                    'descripcion'=>$id_descripcion[0]->id,
                    'date'=>date('Y-m-d'),
                    'time'=>date('H:i:s'),
                ]);

                DB::table('solicituds')->where('id',$id)->update(['state'=>false]);
                event(new RealtimeEventSolicitud);
                $this->btnenvio=false;
                $this->access+=1;
                // $this->closemodal();
            }
        }else{
            // $this->access-=1;
        }
        if($this->access>1 && $this->btnenvio){
            $this->reset(['access']);
        }
            $this->resetdatos();
    }

    public function inforeq($id){
        $this->id_solicitud=$id;
        $status='';
       $products = solicitud::
       join('solicitud_productos','solicitud_productos.idsolicitud','=','solicituds.id')
   ->join('productos','solicitud_productos.idproducto','=','productos.id')
   ->select('solicitud_productos.idsolicitud','solicitud_productos.cantidad','solicitud_productos.aprobado','productos.producto','productos.clave_producto as clave')
        ->where('solicitud_productos.idsolicitud',$id)
        ->get();

        if($this->openbtn){
            foreach($products as $data){
                $this->products[]=['clave'=>$data->clave,'producto'=>$data->producto,'cantidad'=>$data->cantidad,'aprobado'=>$data->aprobado];
            }
        }
        $this->openbtn=false;
        $status=status_solicitud::select('status')->where('id_solicitud',$id)->latest('id')->first()->status;
        if($status!='Enviada'){
                $this->status=true;
            }else{
            $this->status=false;
        }
        if($status =='Enviada' || $status=='Revisada' || $status=='Rechazada'){
            $this->aprobado=false;
        }else{
            $this->aprobado=true;
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

public function showmodaltran($id){
    $this->idaprob=$id;
    $this->dispatchBrowserEvent('show-formr');
    // $this->dispatchBrowserEvent('close-form');
}

public function closemodaltran(){
        $this->dispatchBrowserEvent('close-formr');
 // $this->resetdatos();
}

public function resetdatos(){
    $this->reset([
        'products',
        'id_solicitud',
        'openbtn',
        'btnenvio',
        'access',
        'aprobado',
    ]);
}

public function esperalist(){
    $this->listadoespera=false;
    $this->concept_espera = msmestatus::select('id','descripcion')->where('typestatus','Transito')->get();
}

    public function render()
    {

        if($this->listadoespera){
            $this->esperalist();
            }
        return view('livewire.almacen.recursos-m.requisiciones-rh',['solicitud'=> $this->QuerySolicitud(), $this->querydate(),$this->seguimiento()]);
    }


}
