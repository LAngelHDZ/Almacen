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
    // protected $listeners = ['refresh' => 'updateview'];
    protected $listeners = ['echo:solicitud,RealtimeEventSolicitud' => 'updateview'];
    public function QuerySolicitud(){
        // $solicitud=[];
      $list = solicitud::join('empleados','empleados.id','=','solicituds.id_empleado')
        ->join('users','users.id','=','empleados.id_user')
        ->select('solicituds.id','solicituds.folio','solicituds.descripcion','empleados.id_user','users.name')
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

    }

    public function inforeq($id){
        $this->id_solicitud=$id;
       $products = solicitud::
       join('solicitud_productos','solicitud_productos.idsolicitud','=','solicituds.id')
   ->join('productos','solicitud_productos.idproducto','=','productos.id')
   ->select('solicitud_productos.idsolicitud','solicitud_productos.cantidad','productos.producto','productos.clave_producto as clave')
        ->where('solicitud_productos.idsolicitud',$id)
        ->get();
        foreach($products as $data){
            $this->products[]=['clave'=>$data->clave,'producto'=>$data->producto,'cantidad'=>$data->cantidad];
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
    ]);
}

    public function render()
    {
        return view('livewire.almacen.recursos-m.requisiciones-rh',['solicitud'=> $this->QuerySolicitud(), $this->querydate()]);
    }


}
