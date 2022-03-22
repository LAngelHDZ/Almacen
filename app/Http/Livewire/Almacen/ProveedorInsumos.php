<?php

namespace App\Http\Livewire\Almacen;

use App\Models\Proveedor;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class ProveedorInsumos extends Component
{
    use WithPagination;
    public $editprove;
    public $idpro,$rfc, $empresa, $direccion, $email, $telefono;


    protected $listeners = ['datatable' => 'render'];

     public function closeditmodal(){
         $this->dispatchBrowserEvent('close-formedit');
     }

     public function showeditmodal(){
        $this->dispatchBrowserEvent('show-formedit');
    }

      public function edit($idprovedor){
       $oneprovedor= Proveedor::find($idprovedor);
       $this->idpro=$idprovedor;
       $this->rfc = $oneprovedor->rfc;
       $this->empresa = $oneprovedor->empresa;
       $this->direccion = $oneprovedor->direccion;
       $this->email = $oneprovedor->email;
       $this->telefono = $oneprovedor->telefono;

        $this->showeditmodal();
        
     }

     protected $rules = [
        'rfc' => 'required',
        'empresa' => 'required',
        'direccion' => 'required|max:100',
        'email' => 'required|email',
        'telefono' => 'required|min:10|max:10',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
 
    public function updateProveedor()
    {
        $validatedData = $this->validate();
 
        $updatepro = array(
            'rfc'=>$validatedData['rfc'],
            'empresa'=>$validatedData['empresa'],
            'direccion'=>$validatedData['direccion'],
            'email'=>$validatedData['email'],
            'telefono'=>$validatedData['telefono'],
        );

        DB::table('proveedors')->where('id',$this->idpro)->update($updatepro);
        $this->closeditmodal();
        // $this->emitevent();
        $this->resetdatos();
        $this->emit('alert');
    }

    public function delete($id){
        $updatepro = array(
            'active'=>0,
        );
        DB::table('proveedors')->where('id',$id)->update($updatepro);
     
        $this->emit('alert');
    }

    public function resetdatos(){
        $this->reset([
            'id',
            'rfc',
            'empresa',
            'direccion',
            'email',
            'telefono',
        ]);
    }


    public function render()
    {
        return view('livewire.almacen.proveedor-insumos',[
            'proveedor' => Proveedor::paginate(10)
        ]);
    }
}
