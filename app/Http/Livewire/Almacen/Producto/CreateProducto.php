<?php

namespace App\Http\Livewire\Almacen\Producto;

use App\Models\Catalogo;
use App\Models\Productos;
use App\Models\Proveedor;
use Livewire\Component;

class CreateProducto extends Component
{
    public $idprod, $clave,$presentacion;
    public $producto,$marca,$categoria,$contenido,$des,$unidad;
    public $precio,$proveedor;
    public $arrayCats=[];
    protected $rules=[
        'clave' => 'required',
        'marca' => 'required',
        'producto' => 'required|min:4|max:30',
        'presentacion' => 'required',
        'categoria' => 'required',
        'contenido' => 'required',
        'unidad' => 'required',
        'des' => 'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function mount()
    {
        $this->arrayCats = [
        ['idproducto'=>'','idproveedor' => '', 'precio' => 0]
        ];
    }

    public function addProveedor()
    {
        $this->arrayCats[] = ['idproducto'=>'','idproveedor' => 2, 'precio' => 0];
    }

    public function removeProveedor($index)
    {
        unset($this->arrayCats[$index]);
        $this->arrayCats = array_values($this->arrayCats);
    }

    public function insertpro(){
        $catalogo=Productos::create(
            [
                'clave_producto' => $this->clave,
                'producto' => $this->producto,
                'marca' => $this->marca,
                'descripcion' => $this->des,
                'categoria' => $this->categoria,
                'presentacion' => $this->presentacion,
                'contenido' => $this->contenido,
                'unidad' => $this->unidad,
             ]
         );
    }

    public function insertcat(){
        $validatedData = $this->validate();
        $proid = Productos::select('id')->latest('id')->first();

        foreach ($this->arrayCats as $cat) {
            Catalogo::create(
                ['idproducto'=>$proid->id,
                'idproveedor' => $cat['idproveedor'],
                'precio' => $cat['precio'],
                ]
            );
      }
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
        $this->resetdatos();
        $this->dispatchBrowserEvent('close-form');
    }


   // Muestra el modal del formulario
    public function showmodal(){
         $this->dispatchBrowserEvent('show-form');
    }

     public function proveedores(){
         $listprove = Proveedor::all();
         return $listprove;
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
            'producto',
            'presentacion',
            'categoria' ,
            'contenido',
            'unidad',
            'des',
            'arrayCats',
        ]);
    }

    public function render()
    {


        return view('livewire.almacen.producto.create-producto',['listProve'=> $this->proveedores()]);
    }
}
