<?php

namespace App\Http\Livewire\Almacen\Finanzas;

use App\Models\factura;
use Livewire\Component;

class FacturasFinanzas extends Component
{

    public function listadoF(){
      return  factura::join('proveedors','proveedors.id','=','idproveedor')
        ->select('proveedors.id','proveedors.empresa','facturas.no_factura as nfactura','facturas.fecha_elaboracion as fecha')
        ->get();
    }

    public function render()
    {
        return view('livewire.almacen.finanzas.facturas-finanzas',['facturas'=>$this->listadoF()]);
    }
}
