<?php

namespace App\Http\Livewire\Almacen;

use App\Models\Productos;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ProductoInsumos extends Component
{
    public $idprod, $clave, $listP,$precio,$idprov,$empaque;
    public $producto,$marca,$categoria,$contenido,$des;
    protected $listeners = ['datatable' => 'render'];

    protected $rules=[
        'clave' => 'required',
        'marca' => 'required',
        'producto' => 'required|min:4|max:30',
        'empaque' => 'required',
        'categoria' => 'required',
        'contenido' => 'required',
        'des' => 'required',
    ];
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function update(){
        $validatedData = $this->validate();
        $update=array(
            'clave_producto'=>$this->clave,
            'producto'=>$this->producto,
            'marca'=>$this->marca,
            'descripcion'=>$this->des,
            'categoria'=>$this->categoria,
            'empaque'=>$this->empaque,
            'contenido'=>$this->contenido,
        );

        DB::table('productos')->where('id',$this->idprod)->update($update);
        $this->closemodal();
        $this->resetdatos();
        $this->emit('alert');
        

        
    }

    public function delete(){

    }
    public function closemodal(){
        $this->dispatchBrowserEvent('close-formedit');
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

   // Muestra el modal del formulario
    public function showmodal(){
         $this->dispatchBrowserEvent('show-formedit');
    }
    public function modalupdate($id){
        $idproducto= Productos::find($id);
        $this->idprod=$id;
        $this->clave=$idproducto->clave_producto;
        $this->producto=$idproducto->producto;
        $this->marca=$idproducto->marca;
        $this->des=$idproducto->descripcion;
        $this->categoria=$idproducto->categoria;
        $this->empaque=$idproducto->empaque;
        $this->contenido=$idproducto->contenido;
        $this->showmodal();
    }

    public function render()
    {
        return view('livewire.almacen.producto-insumos',[
            'products' => Productos::paginate(10)
        ]);
    }
}
