<?php

namespace App\Http\Livewire\Almacen\Solictud;

use App\Events\RealtimeEventSolicitud;
use App\Models\Productos;
use App\Models\solicitud;
use App\Models\solicitud_producto;
use App\Models\status_solicitud;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PreSolicitud extends Component
{
    public $datas=[];
    public $addprod=true;
    public $messageP=false;
    public $usuario,$intfolio;
    public $arrayProduct = [],$producto,$cantidad,$cat,$activeBtn=false,$idempleado,$descripcion;

    public function mount(){
            $userid=Auth::user()->id;
            $usuario=User::join('empleados','users.id','=','empleados.id_user')
            ->join('areas','empleados.area','=','areas.id')
            ->join('departamentos','areas.id_departamento','=','departamentos.id')
            ->select('users.id','users.name','empleados.id as idempl','empleados.clave'
            ,'areas.area','areas.clave as cl_area','departamentos.departamento','departamentos.clave as cl_dep')
            ->where('users.id',$userid)->get();
            $this->idempleado=$usuario[0]->idempl;
            $date = Carbon::now();
            $fecha = $date->format('Y-m-d');
            $year = $date->format('y');
            $week = $date->format('m');
            $day = $date->format('d');
            $prefolio = $year.''.$week.''.$day.''.$usuario[0]->cl_area;
            $this->datas[]=['fecha'=>$fecha,'prefolio'=>$prefolio,'departamento'=>$usuario[0]->departamento,'area'=>$usuario[0]->area];
}

public function addproduct(){
    $active=true;
    if($this->addprod){


    foreach($this->arrayProduct as $data){
        if($data['idPro']==$this->producto){
            $this->messageP=true;
    $active=false;
        }
    }

    if($active){
        $product=Productos::select('descripcion','producto')->where('id',$this->producto)->get();
        $this->arrayProduct[]=['idPro'=>$this->producto,'producto'=>strtoupper($product[0]->producto),'descripcion'=>strtoupper($product[0]->descripcion),'cantidad'=>$this->cantidad];
        $this->reset([
            'producto',
            'cantidad',
            'messageP',
        ]);
    }
}
}

public function removeProduct($index){
    unset($this->arrayProduct[$index]);
    $this->arrayProduct = array_values($this->arrayProduct);
}

public function folio(){
    $folio=solicitud::join('status_solicituds as status','status.id_solicitud','=','solicituds.id')
    ->where('date',date('Y-m-d'))->where('status','Enviada')->count();
    return $this->datas[0]['prefolio'].'-'.$folio+=1;
}

public function create(){
    solicitud::create([
        'folio'=>$this->folio(),
        'id_empleado'=>$this->idempleado,
        'descripcion'=>$this->descripcion,
        'active'=>true,
        'state'=>true,
    ]);

    $idsolicitud=solicitud::select('id')->where('id_empleado',$this->idempleado)->latest('id')->first();
    status_solicitud::create([
        'id_solicitud'=>$idsolicitud->id,
        'status' => 'Enviada',
        'descripcion'=>'Solicitud enviada en espera de revisión y aprobación',
        'date'=> date('Y-m-d'),
        'time'=> date('H:i:s'),
    ]);

    foreach($this->arrayProduct as $data){
        solicitud_producto::create([
            'idsolicitud'=>$idsolicitud->id,
            'idproducto'=>$data['idPro'],
            'cantidad'=>$data['cantidad'],
            'aprobado'=>0,
        ]);
    }
    event(new RealtimeEventSolicitud);
    $this->emit('alert');
}

     public function showProducts(){
         return Productos::where('categoria',$this->cat)->get();
     }

     public function secureBtn(){
        if($this->arrayProduct!=null || $this->descripcion!=''){
            $this->activeBtn=true;
        }else{
            $this->activeBtn=false;
        }
     }
    public function render()
    {

        return view('livewire.almacen.solictud.pre-solicitud',['materiales'=>$this->showProducts(),$this->secureBtn()]);
    }
}
