<?php

namespace App\Http\Livewire\Almacen\Producto;

use Livewire\Component;
use App\Models\Proveedor;
use App\Models\Catalogo;
use App\Models\preciosproducto;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PrecioProducto extends Component
{
    public $listPrecio,$listProve,$precio,$fecha,$idpro,$proveedor,$view,$idcatalogo,$idprecio;

    protected $rules=[
        'precio' => 'required',
        'proveedor' => 'required',
    ];

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    public function proveedores(){
         $listprov = Proveedor::all();
         $this->listProve=$listprov;
    }

    public function showmodal(){

        $this->dispatchBrowserEvent('show-form');

    }

    public function show(){
        $this->view=true;
        $this->showmodal();
        $this->proveedores();
    }

   public function closemodal(){
    $this->dispatchBrowserEvent('close-form');
    }

   public function listprecios(){

        // $list = Catalogo::join('proveedors','proveedors.id','=','catalogos.idproveedor')
        // ->join('preciosproductos','catalogos.id','=','preciosproductos.idcatalogo')
        // ->where('catalogos.idproducto',$this->idpro)->get();
        // ->select('preciosproductos.id as idprecio','preciosproductos.precio','preciosproductos.fecha','proveedors.id','proveedors.empresa')
         $list = Proveedor::join('catalogos','proveedors.id','=','catalogos.idproveedor')
         ->join('preciosproductos as precios','catalogos.id','=','precios.idcatalogo')
         ->select('precios.actualprecio','precios.id as idprecio','precios.precio','precios.fecha','proveedors.id','proveedors.empresa','catalogos.id as idcat')
         ->where('catalogos.idproducto',$this->idpro)
         ->where('precios.actualprecio',1)
        //  ->groupby()
        // ->latest('precios.precio')->first()
         ->get();

         $this->listPrecio=$list;

   }

   public function insertcat(){
    $validatedData = $this->validate();

    catalogo::create(
        [
            'idproveedor'=> $this->proveedor,
            'idproducto' => $this->idpro,
        ]
        );
    }

    public function insertpre(){
      $validatedData = $this->validate();
      $date = Carbon::now();
      $this->fecha = $date->format('Y-m-d');
      $idcat=Catalogo::select('id')->latest('id')->first();
      preciosproducto::create(
          [
                'idcatalogo' => $idcat->id,
                'precio' => $this->precio,
                'fecha' => $this->fecha,
          ]
      );
   }

   public function resetdatos(){
    $this->reset([
        'precio',
        'proveedor',
    ]);
    }

   public function create(){

   $this->insertcat();
   $this->insertpre();
$this->resetdatos();
   $this->emit('alert');

   }

    public function showinfo($idprecio){
        $list = Proveedor::join('catalogos','proveedors.id','=','catalogos.idproveedor')
         ->join('preciosproductos as precios','catalogos.id','=','precios.idcatalogo')
         ->select('precios.id as idprecio','precios.precio','precios.fecha','proveedors.id','proveedors.empresa','catalogos.id as idcat')
         ->where('precios.id',$idprecio)->get();

         $this->precio=$list[0]->precio;
         $this->proveedor=$list[0]->id;
         $this->idcatalogo=$list[0]->idcat;
         $this->idprecio=$list[0]->idprecio;
    }

   public function update($idprecio){
       $this->view=false;
       $this->showinfo($idprecio);
    $this->showmodal();

   }

   public function updateprecio(){
    DB::table('preciosproductos')->where('id',$this->idprecio)->update(['actualprecio'=>0]);

    $date = Carbon::now();
    $this->fecha = $date->format('Y-m-d');
    preciosproducto::create(
        [
              'idcatalogo' => $this->idcatalogo,
              'precio' => $this->precio,
              'fecha' => $this->fecha,
        ]
    );
   }

    public function render()
    {
        $this->proveedores();
    $this->listprecios();
        return view('livewire.almacen.producto.precio-producto');
    }
}
