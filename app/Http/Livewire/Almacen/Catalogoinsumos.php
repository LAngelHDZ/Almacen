<?php

namespace App\Http\Livewire\Almacen;

use App\Models\Catalogo;
use Livewire\Component;

class CatalogoInsumos extends Component
{

    public $catalogo;
    public function showcatalogo(){
        $catalogo = Catalogo::join('productos','catalogos.idproducto','=','productos.id')
        ->join('proveedors','catalogos.idproveedor','=','proveedors.id')
        ->select('productos.clave_producto as clave','productos.producto','productos.descripcion'
                 ,'proveedors.empresa','productos.marca','catalogos.precio')->get();
$this->catalogo=$catalogo;
    }

    public function render()
    {
        $this->showcatalogo();
        return view('livewire.almacen.catalogo-insumos');
    }
}
