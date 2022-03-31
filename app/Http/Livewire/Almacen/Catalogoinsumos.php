<?php

namespace App\Http\Livewire\Almacen;

use App\Models\Catalogo;
use App\Models\Proveedor;
use Livewire\Component;
use Livewire\WithPagination;
class CatalogoInsumos extends Component
{
    use WithPagination;
    public $search,$filtercat,$filterpro,$campo='productos.clave_producto';

    public function updatingSearch(){
        $this->resetPage();
    }

    public function showcatalogo(){
        if($this->filtercat==0 && $this->filterpro==0){
            $catalogo = Catalogo::join('productos','catalogos.idproducto','=','productos.id')
             ->join('proveedors','catalogos.idproveedor','=','proveedors.id')
             ->select('productos.clave_producto as clave','productos.producto','productos.descripcion'
                      ,'proveedors.empresa','productos.marca','catalogos.precio')
             ->where($this->campo,'like','%'.$this->search.'%')
             ->paginate(2);
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
                          ,'proveedors.empresa','proveedors.id as idpro','productos.marca','catalogos.precio')
                 ->where($this->campo,'like','%'.$this->search.'%')
                 ->where('proveedors.id',$this->filterpro)
                 ->paginate(2);
            }
            else if($this->filterpro==0 && $this->filtercat!=0){
               
                $catalogo = Catalogo::join('productos','catalogos.idproducto','=','productos.id')
                 ->join('proveedors','catalogos.idproveedor','=','proveedors.id')
                 ->select('productos.clave_producto as clave','productos.producto','productos.descripcion'
                          ,'proveedors.empresa','productos.marca','catalogos.precio')
                 ->where($this->campo,'like','%'.$this->search.'%')
                 ->where('productos.categoria',$cat)
                 ->paginate(2);
            }
            else{
                $catalogo = Catalogo::join('productos','catalogos.idproducto','=','productos.id')
                 ->join('proveedors','catalogos.idproveedor','=','proveedors.id')
                 ->select('productos.clave_producto as clave','productos.producto','productos.descripcion'
                          ,'proveedors.empresa','productos.marca','catalogos.precio')
                 ->where($this->campo,'like','%'.$this->search.'%')
                 ->where('proveedors.id',$this->filterpro)
                 ->where('productos.categoria',$cat)
                 ->paginate(2);
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

    public function proveedores(){
        $listprov = Proveedor::all();
        return $listprov;
   }

    public function render()
    {
        return view('livewire.almacen.catalogo-insumos',
        ['catalogo'=>$this->showcatalogo()],
        ['proveedor'=>$this->proveedores()]);
    }
}
