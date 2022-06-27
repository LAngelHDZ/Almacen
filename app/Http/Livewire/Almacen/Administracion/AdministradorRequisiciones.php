<?php

namespace App\Http\Livewire\Almacen\Administracion;

use Livewire\Component;
use App\Models\solicitud;
use App\Models\msmestatus;
use Livewire\WithPagination;
use App\Traits\DateFunctions;
use App\Models\status_solicitud;
use Illuminate\Support\Facades\DB;
use App\Events\RealtimeEventSolicitud;
use App\Traits\DataStatus;

class AdministradorRequisiciones extends Component
{
    use DateFunctions;
    use DataStatus;
    use WithPagination;
    public $products=[];
    public $openbtn=true;
    public $solicitudes=[];
    public $id_solicitud,$aux;
    public $status, $filter_status='Revisada';
    public $seguimiento=[];
    public $messageP=false;
    public $rechazo=false;
    public $messagetxt;
    public $descripc;
    public $btnenvio=true;
    public $concept_rechazo;
    public $listadorechazos=true;
    public $typemodal="";

    protected $listeners = ['echo:solicitud,RealtimeEventSolicitud' => 'updateview'];


    public function QuerySolicitud(){
        $filter=$this->filter_status;
        $status=true;
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
                 'status' =>$this->status_seguimiento(status_solicitud::select('status')->where('id_solicitud',$data->id)->get(), 'status'),
                 'icon' =>$this->status_seguimiento(status_solicitud::select('status')->where('id_solicitud',$data->id)->get(), 'icon'),
            ];
        }
    }

   

    public function updateview(){
        if(solicitud::count()!=$this->aux){
            $this->reset([
                'solicitudes',
            ]);
            $this->mount();
        }
    }


    public function product_aprobado(){
        foreach($this->products as $data){
            $aprobado=array('aprobado'=>$data['aprobado']);

            DB::table('solicitud_productos')->where('id',$data['id'])->update($aprobado);
            $aprobado=null;
        }
    }

    public function aceptar($state){
        $status='';
        $aprobado=null;
        $this->reset(['messagetxt']);
        if($this->btnenvio){

        if($state==1){
            foreach($this->products as $data){
                if($data['aprobado']!=0){
                $aprobado=false;
                break;
            }else{
                $this->rechazo=true;
                $this->typemodal="R";
                $aprobado=true;
                $status='Rechazada';
            }
        }
        $this->messagetxt='Para rechar una solicitud no debe de estar aprobado ningun producto';


    }else{
        foreach($this->products as $data){
            if($data['aprobado']==0){
                $aprobado=false;
            }else{
                $this->typemodal="A";
                $aprobado=true;
                break;
            }
        }
        $this->messagetxt='Debe de aprobar minimo un producto';
            $status='Aprobada';
            $this->descripc= msmestatus::select('id')->where('typestatus','Aprobada')->get()[0]->id;
            ;
        }

        if($aprobado){
            $this->product_aprobado();
            status_solicitud::create([
                'id_solicitud'=>$this->id_solicitud,
                'status'=>$status,
                'descripcion'=>$this->descripc,
                'date'=>date('Y-m-d'),
                'time'=>date('H:i:s'),
            ]);
            $aprobado=false;
            event(new RealtimeEventSolicitud);
            $this->fuctModals();

            $this->btnenvio=false;
        }else{
            $this->messageP=true;
        }

    }
    }

    public function inforeq($id){

        $this->id_solicitud=$id;
        $status='';
       $products = solicitud::
       join('solicitud_productos','solicitud_productos.idsolicitud','=','solicituds.id')
   ->join('productos','solicitud_productos.idproducto','=','productos.id')
   ->select('solicitud_productos.id','solicitud_productos.idsolicitud as id_sol','solicitud_productos.cantidad','solicitud_productos.aprobado','productos.producto','productos.id as idpro','productos.clave_producto as clave')
        ->where('solicitud_productos.idsolicitud',$id)
        ->get();

        if($this->openbtn){
            foreach($products as $data){
                $this->products[]=[
                    'clave'=>$data->clave,
                    'id'=>$data->id,
                    'idsol'=>$data->id_sol,
                    'idprod'=>$data->idpro,
                    'producto'=>$data->producto,
                    'cantidad'=>$data->cantidad,
                    'aprobado'=>$data->aprobado];

                }
            }
            $this->openbtn=false;
        $status=status_solicitud::select('status')->where('id_solicitud',$id)->latest('id')->first()->status;
        if($status!='Revisada'){
                $this->status=true;
            }else{
            $this->status=false;

        }

        $this->showmodal();
    }

    public function fuctModals(){
        if($this->typemodal=="A"){
            $this->closemodal();
        }else{
            $this->closemodalrec();
        }

    }

    public function showmodal(){
        $this->dispatchBrowserEvent('show-form');
   }

   public function closemodal(){
    $this->dispatchBrowserEvent('close-form');
    $this->resetdatos();
}
    public function showmodalrec(){
        $this->dispatchBrowserEvent('show-formr');
        $this->dispatchBrowserEvent('close-form');
   }

   public function closemodalrec(){
       if($this->rechazo){

           $this->dispatchBrowserEvent('close-formr');
        }else{
            $this->dispatchBrowserEvent('close-formr');
            $this->dispatchBrowserEvent('show-form');
        }
    // $this->resetdatos();
}

public function rechazolist(){
    $this->listadorechazos=false;
    $this->concept_rechazo = msmestatus::select('id','descripcion')->where('typestatus','Rechazada')->get();
}

public function resetdatos(){
    $this->reset([
        'products',
        'id_solicitud',
        'openbtn',
        'btnenvio',
        'messageP',
        'rechazo',
    ]);
}

    public function render()
    {
        if($this->listadorechazos){
        $this->rechazolist();
        }
        return view('livewire.almacen.administracion.administrador-requisiciones',['solicitud'=> $this->QuerySolicitud(), $this->querydate(),$this->seguimiento()]);
    }
}
