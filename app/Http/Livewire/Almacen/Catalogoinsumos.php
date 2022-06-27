<?php

namespace App\Http\Livewire\Almacen;

use App\Models\Catalogo;
use App\Models\cotizacion;
use App\Models\Cotizacion_cat;
use App\Models\Proveedor;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class CatalogoInsumos extends Component
{
    use WithPagination;
    public $search,$filtercat,$filterpro,$campo='productos.clave_producto';
    public $cotizacion, $arraycat=[];
    
    public function updating(){
        $this->resetPage();
    }

    public function showcatalogo(){
        $paginate=10;
        if($this->filtercat==0 && $this->filterpro==0){
            $catalogo = Catalogo::join('productos','catalogos.idproducto','=','productos.id')
             ->join('proveedors','catalogos.idproveedor','=','proveedors.id')
             ->select('productos.clave_producto as clave','productos.producto','productos.descripcion'
                      ,'proveedors.empresa','productos.marca','catalogos.precio','catalogos.id as idcat')
             ->where($this->campo,'like','%'.$this->search.'%')
             ->paginate($paginate);
        }else{
            $cat='';
            switch($this->filtercat){
                case '1': $cat='Papeleria'; break;
                case '2': $cat='Reactivo'; break;
                case '3': $cat='Insumo general'; break;
            }
            if($this->filterpro!=0 && $this->filtercat==0){
                $catalogo = Catalogo::join('productos','catalogos.idproducto','=','productos.id')
                 ->join('proveedors','catalogos.idproveedor','=','proveedors.id')
                 ->select('productos.clave_producto as clave','productos.producto','productos.descripcion'
                          ,'proveedors.empresa','proveedors.id as idpro','productos.marca','catalogos.precio','catalogos.id as idcat')
                 ->where($this->campo,'like','%'.$this->search.'%')
                 ->where('proveedors.id',$this->filterpro)
                 ->paginate($paginate);
            }
            else if($this->filterpro==0 && $this->filtercat!=0){

                $catalogo = Catalogo::join('productos','catalogos.idproducto','=','productos.id')
                 ->join('proveedors','catalogos.idproveedor','=','proveedors.id')
                 ->select('productos.clave_producto as clave','productos.producto','productos.descripcion'
                          ,'proveedors.empresa','productos.marca','catalogos.precio','catalogos.id as idcat')
                 ->where($this->campo,'like','%'.$this->search.'%')
                 ->where('productos.categoria',$cat)
                 ->paginate($paginate);
            }
            else{
                $catalogo = Catalogo::join('productos','catalogos.idproducto','=','productos.id')
                 ->join('proveedors','catalogos.idproveedor','=','proveedors.id')
                 ->select('productos.clave_producto as clave','productos.producto','productos.descripcion'
                          ,'proveedors.empresa','productos.marca','catalogos.precio','catalogos.id as idcat')
                 ->where($this->campo,'like','%'.$this->search.'%')
                 ->where('proveedors.id',$this->filterpro)
                 ->where('productos.categoria',$cat)
                 ->paginate($paginate);
            }
        }
        return $catalogo;
    }

    public function resetfilter(){
        $this->search='';
        $this->filtercat='0';
        $this->filterpro='0';
        $this->campo='productos.clave_producto';
    }

    public function cotizacion(){
        $this->cotizacion=false;
        // $this->arraycat[]=['idcatalogo'=>0];

    }

    public function savecotizacion(){
        $date = Carbon::now();
        $fecha = $date->format('Y-m-d');
        cotizacion::create([
            'descripcion'=>'Nueva cotización',
            'fecha'=>$fecha,
        ]);

        $cotid = cotizacion::select('id')->latest('id')->first();

        foreach($this->arraycat as $data){
            Cotizacion_cat::create([
                'idcotizacion' =>$cotid->id, 
                'idcatalogo'=> $data['idcatalogo'],
            ]);
        }
        $this->cotizacion=true;
        $this->resetdatos();
    }

    public function resetdatos(){
        $this->reset([
            'arraycat',
        ]);
    }

    public function addproducto($idcat){
        $this->arraycat[]=['idcatalogo'=>$idcat];

    }

    public function removeCat($index)
    {
        unset($this->arraycat[$index]);
        $this->arraycat = array_values($this->arraycat);
    }

    public function proveedores(){
        $listprov = Proveedor::all();
        return $listprov;
   }

   public function mount(){
    $this->cotizacion=true;
   }

    public function render()
    {
        return view('livewire.almacen.catalogo-insumos',
        ['catalogo'=>$this->showcatalogo()],
        ['proveedor'=>$this->proveedores()]);
    }
}
