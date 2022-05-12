<?php

namespace App\Http\Livewire\Almacen\Producto;

use App\Models\Catalogo;
use App\Models\Productos;
use App\Models\Proveedor;
use Livewire\Component;

class CreateProducto extends Component
{
    public $idprod, $clave,$presentacion;
    public $producto,$marca,$categoria,$contenido,$des,$unidad,$precio,$proveedor;
    // Variables para usar en agregar proveedor
    public $openbtn=true;
    public $numberPro,$increment, $flag_Prove=false,$repeat;
    public $arrayCats=[],$auxiliar=[],  $into=0,$validad=false,$indiceA,$indiceB;
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
        $this->increment=1;
        $listprove = Proveedor::count();
        $this->numberPro=$listprove;
        $this->arrayCats = [
        ['idproveedor' => '', 'precio' => 0]
        ];

    }

    public function addProveedor()
    {
        if($this->increment==3){
            $this->openbtn=false;
        }

        if($this->openbtn){

            $this->arrayCats[] = ['idproveedor' => '', 'precio' => 0];
            $this->increment+=1;
        }

        $this->validad=false;


    }

    public function removeProveedor($index)
    {
            $this->increment-=1;
        unset($this->arrayCats[$index]);
        $this->arrayCats = array_values($this->arrayCats);

        $this->reset([
            'auxiliar',
            'into',
            'flag_Prove',
            'validad',
            'repeat',
            'increment',
            'openbtn',
        ]);
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
        $this->mount();
        $this->dispatchBrowserEvent('close-form');
    }


   // Muestra el modal del formulario
    public function showmodal(){
         $this->dispatchBrowserEvent('show-form');
    }

     public function proveedores(){
         $listprove = Proveedor::all();

         $this->proveedor=$listprove;
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
            'auxiliar',
            'into',
            'flag_Prove',
            'validad',
            'repeat',
            'increment',
            'openbtn',
        ]);
    }

    public function eerror(){
        foreach($this->arrayCats as $key =>$data){
            if($key==$this->into){
                if($this->arrayCats[$key]['idproveedor']!=0){
                    $this->auxiliar[]=['idproveedor'=>$this->arrayCats[$key]['idproveedor']];
                    $this->into++;
                    $this->validad=true;
                }
            }
            if($this->validad){
                foreach($this->auxiliar as $ind =>$dat){
                    if($data['idproveedor']!=$dat['idproveedor'] && $key==$ind){
                        $this->auxiliar[$ind]=['idproveedor'=>$this->arrayCats[$key]['idproveedor']];
                        $this->indiceB+=1;
                    }
                    if($data['idproveedor']==$dat['idproveedor'] && $key!=$ind){
                        $this->flag_Prove=true;
                        break;
                    }else{
                        $this->flag_Prove=false;
                        // break;
                    }
                }
            }
        }
    }

    public function render()
    {
        return view('livewire.almacen.producto.create-producto',[
            'listProve'=> $this->proveedores(),
            $this->eerror()
        ]);
    }
}
