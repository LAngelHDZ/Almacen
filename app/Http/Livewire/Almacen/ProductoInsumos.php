<?php

namespace App\Http\Livewire\Almacen;

use App\Models\Catalogo;
use App\Models\Productos;
use App\Models\Proveedor;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class ProductoInsumos extends Component
{
    use WithPagination;
    public $idprod, $clave, $listP,$precio,$idprov,$presentacion;
    public $producto,$marca,$categoria,$contenido,$des,$unidad,$view;
    public $search,$filtercategory=0,$campo='clave_producto';
    public $numberPro,$increment, $flag_Prove=false,$repeat,$indiceB,$indiceA;
    public $arrayCats=[],$auxiliar=[],  $into=0,$validad=false;
    public $openbtn=true;
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

    public function updating(){
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

        $this->queryproveedor();
        $this->closemodal();
        $this->resetdatos();
        $this->emit('alert');
    }

    public function proveedores(){
        $listprove = Proveedor::all();
        return $listprove;
    }

    public function queryproveedor()
    {
        foreach($this->arrayCats as $data){
            if($data['idcatalogo'] !=0){
                    $consulta= Catalogo::find($data['idcatalogo']);
                    if($data['precio'] != $consulta->precio){
                    DB::table('catalogos')->where('id',$data['idcatalogo'])->update([
                        'precio' => $data['precio'],
                        ]
                    );
                    }
                }else{
                    Catalogo::create([
                        'idproducto'=>$this->idprod,
                        'idproveedor' => $data['idproveedor'],
                        'precio' => $data['precio'],
                        ]
                    );
             }
        }
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

    public function mount()
    {


        $listprove = Proveedor::count();
        $this->numberPro=$listprove;
    }

    public function addprecio($id){

        redirect()->route('precios-producto',$id);
    }

    public function removeProveedor($index)
    {
        unset($this->arrayCats[$index]);
        $this->arrayCats = array_values($this->arrayCats);
    }

    public function showinfoP($id){
        $list = Proveedor::join('catalogos','proveedors.id','=','catalogos.idproveedor')
        ->join('productos','productos.id','=','catalogos.idproducto')
         ->select('proveedors.id','catalogos.precio','catalogos.id as idcat')
         ->where('catalogos.idproducto',$id)
         ->get();

        //  $this->arrayCats[]=$list;
        foreach ($list as $data) {
            # code...
            $this->arrayCats[] = ['idcatalogo'=>$data->idcat,'idproveedor' => $data->id, 'precio' => $data->precio];
        }
    }

    public function closemodal(){
        $this->dispatchBrowserEvent('close-formedit');
        $this->resetdatos();
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


        $this->showinfoP($id);
        $this->showmodal();
        if(count($this->arrayCats)==0){
            $this->arrayCats[] = ['idcatalogo'=>'','idproveedor' => '', 'precio' => 0];
        }
        $values= count($this->arrayCats);
        $this->increment=$values;
    }

    public function consultaPro(){
        $paginate=10;
        $cat='';
        if($this->filtercategory==0){
            $producto= Productos::where($this->campo,'like','%'.$this->search.'%')
            ->paginate($paginate);
        }else{
            switch($this->filtercategory){
                case '1': $cat='Papeleria'; break;
                case '2': $cat='Reactivo'; break;
                case '3': $cat='Insumo general'; break;
            }
            $producto= Productos::where('categoria',$cat)
            ->where($this->campo,'like','%'.$this->search.'%')
            ->paginate($paginate);
        }
        return $producto;
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


        return view('livewire.almacen.producto-insumos',[
            'products' => $this->consultaPro(),
             'listProve' => $this->proveedores(),
             $this->eerror(),
        ]);
    }
}
