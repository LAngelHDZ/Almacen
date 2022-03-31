<?php

namespace App\Http\Livewire\Almacen\Producto;

use Livewire\Component;
use App\Models\Proveedor;
use App\Models\Catalogo;
use App\Models\Hist_PrecioProducto;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PrecioProducto extends Component
{
    public $listPrecio,$listProve,$precio,$fecha,$idpro,$proveedor,$view,$idcatalogo,$idprecio,$viewinfo=false,$historyprice;

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

    public function createPrice(){
        $this->viewinfo=false;
        $this->view=true;
        $this->showmodal();
        $this->proveedores();
    }

   public function closemodal(){
    $this->dispatchBrowserEvent('close-form');
    }

   public function listprecios(){
         $list = Proveedor::join('catalogos','proveedors.id','=','catalogos.idproveedor')
         ->select('proveedors.id','proveedors.empresa','catalogos.id as idcat','catalogos.precio','catalogos.idproducto')
         ->where('catalogos.idproducto',$this->idpro)
         ->get();
         $this->listPrecio=$list;
   }

   public function insertcat(){
    $validatedData = $this->validate();
    catalogo::create(
        [
            'idproveedor'=> $this->proveedor,
            'idproducto' => $this->idpro,
            'precio' => $this->precio,
        ]);
    }

    public function insertpre(){
      $validatedData = $this->validate();
      $date = Carbon::now();
      $this->fecha = $date->format('Y-m-d');
      $idcat=Catalogo::select('id')->latest('id')->first();
      Hist_PrecioProducto::create(
          [
                'idcatalogo' => $idcat->id,
                'precio' => $this->precio,
                'fecha' => $this->fecha,
        ]);
   }

   public function resetdatos(){
    $this->reset([
        'precio',
        'proveedor',
    ]);
    }

   public function create(){
    $this->insertcat();
    $this->resetdatos();
    $this->emit('alert');

   }

    public function showinfo($idcat){
        $list = Proveedor::join('catalogos','proveedors.id','=','catalogos.idproveedor')
         ->select('proveedors.id','proveedors.empresa','catalogos.id as idcat','catalogos.precio')
         ->where('catalogos.id',$idcat)
         ->get();

         $this->precio=$list[0]->precio;
         $this->proveedor=$list[0]->id;
         $this->idcatalogo=$list[0]->idcat;
    }

   public function update($idcat){
       $this->viewinfo=false;
       $this->view=false;
       $this->showinfo($idcat);
       $this->showmodal();
   }

   public function updateprecio(){
    $precioold =Catalogo::select('precio')->where('id',$this->idcatalogo)->get();
    DB::table('catalogos')->where('id',$this->idcatalogo)->update(['precio'=>$this->precio]);

    $date = Carbon::now();
    $this->fecha = $date->format('Y-m-d');
    Hist_PrecioProducto::create(
        [
              'idcatalogo' => $this->idcatalogo,
              'precio' => $precioold[0]->precio,
              'fecha' => $this->fecha,
        ]);
   }

   public function historyprices($idcat){
    $this->historyprice= Hist_PrecioProducto::where('idcatalogo',$idcat)->get();
       $this->viewinfo=true;
       $this->showmodal();
   }

    public function render()
    {
        $this->proveedores();
        $this->listprecios();
        return view('livewire.almacen.producto.precio-producto');
    }
}
