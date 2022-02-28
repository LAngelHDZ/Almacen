<?php

namespace App\Http\Livewire\Almacen\Proveedor;

use Livewire\Component;

class CreateProveedor extends Component
{

    //  public $openmodal = true;

    public function showmodal(){
        // $this->openmodal = true;
        $this->dispatchBrowserEvent('show-form');
    }
    public function render()
    {
        return view('livewire.almacen.proveedor.create-proveedor');
    }
}
