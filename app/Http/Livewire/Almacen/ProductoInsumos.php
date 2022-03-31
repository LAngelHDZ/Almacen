<?php

namespace App\Http\Livewire\Almacen;

use App\Models\Productos;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class ProductoInsumos extends Component
{
    use WithPagination;
    public $idprod, $clave, $listP,$precio,$idprov,$presentacion;
    public $producto,$marca,$categoria,$contenido,$des,$unidad,$view;
    public $search,$filtercategory=0,$campo='clave_producto';
    protected $listeners = ['datatable' => 'render'];

    protected $rules=[
        'clave' => 'required',
        'marca' => 'required',
        'producto' => 'required|min:4|max:30',
        'presentacion' => 'required',
        'categoria' => 'required',
        'contenido' => 'required',
        'des' => 'required',
        'unidad' => 'required',
    ];
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function updatingSearch(){
        $this->resetPage();
    }

    public function update(){
        $validatedData = $this->validate();
        $update=array(
            'clave_producto'=>$this->clave,
            'producto'=>$this->producto,
            'marca'=>$this->marca,
            'descripcion'=>$this->des,
            'categoria'=>$this->categoria,
            'presentacion'=>$this->presentacion,
            'contenido'=>$this->contenido,
            'unidad'=>$this->unidad,
        );

        DB::table('productos')->where('id',$this->idprod)->update($update);
        $this->closemodal();
        $this->resetdatos();
        $this->emit('alert');
    }

    public function addprecio($id){

        redirect()->route('precios-producto',$id);
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
            'presentacion', 
            'categoria' ,
            'contenido', 
            'des', 
            'unidad', 
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
        $this->presentacion=$idproducto->presentacion;
        $this->contenido=$idproducto->contenido;
        $this->unidad=$idproducto->unidad;
        $this->showmodal();
    }

    public function consultaPro(){
        $cat='';
        if($this->filtercategory==0){
            $producto= Productos::where($this->campo,'like','%'.$this->search.'%')
            ->paginate(2);
        }else{
            switch($this->filtercategory){
                case '1': $cat='Papeleria'; break;
                case '2': $cat='Reactivo'; break;
                case '3': $cat='Insumo general'; break;
            }
            $producto= Productos::where('categoria',$cat)
            ->where($this->campo,'like','%'.$this->search.'%')
            ->paginate(2);
        }
        return $producto;
    }

    public function render()
    {
        return view('livewire.almacen.producto-insumos',[
            'products' => $this->consultaPro()
        ]);
    }
}
