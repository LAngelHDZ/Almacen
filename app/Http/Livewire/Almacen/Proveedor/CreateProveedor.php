<?php

namespace App\Http\Livewire\Almacen\Proveedor;

use App\Models\Proveedor;
use Livewire\Component;

class CreateProveedor extends Component
{
    // ---- Variables globales tabla proveedores------
    public $rfc, $empresa, $direccion, $email, $telefono;

   
//---- reglas de validación para el formulario
    protected $rules = [
        'rfc' => 'required|min:10|max:10',
        'empresa' => 'required',
        'direccion' => 'required|max:100',
        'email' => 'required|email',
        'telefono' => 'required|min:10|max:10',
    ];

    // metodod que valida los campos del formulario en tiempo real
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
 
    // metododo que se ejecuta desde el boton guardar del formulario
    //realiza la operacion de guardar datos en la BD
    public function saveProveedor()
    {
        $validatedData = $this->validate();
 
        Proveedor::create($validatedData);
        $this->closemodal();
        $this->emitevent();
        $this->resetdatos();
    }

    //metodo que manda eventos 
    public function emitevent(){
        //manda a refrescar el la vista y componente producto-insumos que muestra los datos en la tabla
        $this->emit('datatable');
        //manda una alerta despues de realizar una operacion de  guardar registro
        $this->emit('alert');
    }

        //resetea todas las variables en 0
    public function resetdatos(){
        $this->reset([
            'rfc',
            'empresa',
            'direccion',
            'email',
            'telefono',
        ]);
    }
    //    cierra el modal del formulario
     public function closemodal(){
        $this->dispatchBrowserEvent('close-form');
     }

        // Muestra el modal del formulario
     public function showmodal(){
         $this->dispatchBrowserEvent('show-form');
    }

    public function render()
    {
        return view('livewire.almacen.proveedor.create-proveedor');
    }
}
