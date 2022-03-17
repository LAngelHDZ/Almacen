<?php

namespace App\Http\Livewire\Almacen\Producto;

use App\Models\Catalogo;
use App\Models\Productos;
use App\Models\Proveedor;
use Livewire\Component;

class CreateProducto extends Component
{
    public $idprod, $clave, $listP,$precio,$idprov,$empaque;
    public $producto,$marca,$categoria,$contenido,$des;

    protected $rules=[
        'clave' => 'required',
        'marca' => 'required',
        'precio' => 'required',
        'producto' => 'required|min:4|max:30',
        'idprov' => 'required',
        'empaque' => 'required',
        'categoria' => 'required',
        'contenido' => 'required',
        'des' => 'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function insertpro(){
        Productos::create(
            [
                'clave_producto' => $this->clave,
                'producto' => $this->producto,
                'marca' => $this->marca,
                'descripcion' => $this->des,
                'categoria' => $this->categoria,
                'empaque' => $this->empaque,
                'contenido' => $this->contenido,
                // 'precio' => 'required',
                // 'prov' => 'required',
             ]
         );
    }

    public function insertcat(){
        $validatedData = $this->validate();
        $proid = Productos::select('id')->latest('id')->first();

        Catalogo::create(
           [
               'idproveedor' => $this->idprov,
               'idproducto' =>$proid->id,
               'precio' => $this->precio,
            ]
        );
    }

    public function createp(){
        $validatedData = $this->validate();
       $this->insertpro();
       $this->insertcat();
        $this->closemodal();
         $this->emitevent();
        $this->resetdatos();

    }

    public function closemodal(){
        $this->dispatchBrowserEvent('close-form');
    }


   // Muestra el modal del formulario
    public function showmodal(){
         $this->dispatchBrowserEvent('show-form');
    }

    public function proveedores(){
        $listprove = Proveedor::all();
        $this->listP=$listprove;
    }

     //metodo que manda eventos 
     public function emitevent(){
        //manda a refrescar el la vista y componente producto-insumos que muestra los datos en la tabla
        $this->emit('datatable');
        //manda una alerta despues de realizar una operacion de  guardar registro
        $this->emit('alert');
    }

    public function resetdatos(){
        $this->reset([
            'clave',   
            'marca', 
            'precio' ,
            'producto',
            'idprov', 
            'empaque', 
            'categoria' ,
            'contenido', 
            'des', 
        ]);
    }
    
    public function render()
    {

        $this->proveedores();
        return view('livewire.almacen.producto.create-producto');
    }
}
