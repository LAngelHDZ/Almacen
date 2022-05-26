<?php

namespace App\Http\Livewire\Almacen\Finanzas;

use App\Models\stock;
use Livewire\Component;

class StockProductos extends Component
{

    public function liststock(){
      return  stock::join('productos','productos.id', '=','stocks.id_producto')
        ->select('productos.id','productos.producto','productos.clave_producto as clave','stocks.stock')
        ->get();
    }

    public function render()
    {
        return view('livewire.almacen.finanzas.stock-productos',['stock'=>$this->liststock()]);
    }
}
