<?php

namespace App\Http\Livewire\Almacen\Producto;

use Livewire\Component;

class CreateProducto extends Component
{
    public $clave, $mprewa;
    public function render()
    {
        return view('livewire.almacen.producto.create-producto');
    }
}
