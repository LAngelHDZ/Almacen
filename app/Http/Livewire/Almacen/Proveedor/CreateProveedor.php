<?php

namespace App\Http\Livewire\Almacen\Proveedor;

use App\Models\Proveedor;
use Livewire\Component;

class CreateProveedor extends Component
{

    public $rfc, $empresa, $direccion, $email, $telefono;

    public $type;

    protected $listeners = ['aditform' => 'showmodal'];
    protected $rules = [
        'rfc' => 'required|min:10|max:10',
        'empresa' => 'required',
        'direccion' => 'required|max:100',
        'email' => 'required|email',
        'telefono' => 'required|min:10|max:10',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
 
    public function saveProveedor()
    {
        $validatedData = $this->validate();
 
        Proveedor::create($validatedData);
        $this->closemodal();
        $this->emitevent();
        $this->resetdatos();
    }

    public function emitevent(){
        $this->emit('datatable');
        $this->emit('alert');
    }

    public function resetdatos(){
        $this->reset([
            'rfc',
            'empresa',
            'direccion',
            'email',
            'telefono',
            'type',
        ]);
    }

     public function closemodal(){
        $this->dispatchBrowserEvent('close-form');
        $this->type = null;
     }

     public function showmodal(){
         $this->dispatchBrowserEvent('show-form');
    }

    public function render()
    {
        return view('livewire.almacen.proveedor.create-proveedor');
    }
}
