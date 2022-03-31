<?php

namespace App\Http\Livewire\Almacen\Root;

use Livewire\Component;
use App\Models\area;
use App\Models\departamento;
use App\Models\empleado;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class FormUsers extends Component
{

    // ----> Variables globales que se ocupan dentro de la clase <----
    public $clave,$id_user,$email,$rfc,$nombre,$apaterno,$amaterno;
    public $idarea,$listarea,$listdep,$idep,$cargo,$pass,$repeatpass;
    public $viewer,$iduser, $ren=true;

    // ---->Metodo que contiene las Reglas de validación del formulario vista registro de usuario ovista actualización de usuario <----
    public function rule(){
        if($this->viewer){
            $this->rules = [
                'clave' => 'required',
                'email' => 'required|email',
                'nombre' => 'required|max:60|min:4',
                'rfc' => 'required|max:13|min:13',
                'idarea' => 'required',
                'cargo' => 'required',
            ];
        }else{
            $this->rules = [
                'clave' => 'required',
                'email' => 'required|email',
                'pass' => 'required|max:16|min:8',
                'repeatpass' => 'required|max:16|min:8',
                'apaterno' => 'required|max:30|min:4',
                'amaterno' => 'required|max:30|min:4',
                'nombre' => 'required|max:60|min:4',
                'rfc' => 'required|max:13|min:13',
                'idarea' => 'required',
                'cargo' => 'required',
            ];
        }
    }

    // ----> Metodo que valida los controles del formulario en tiempo real de la vista registro usuario <----
    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    // ----> Metodo que resetea las variablas globales a vacio cuando son utilizdas en el fomulario <----
    public function resetdatos(){
        $this->reset([
            'clave',
            'email',
            'pass',
            'repeatpass',
            'nombre',
            'apaterno',
            'amaterno',
            'rfc',
            'idarea',
            'idep',
            'cargo',
        ]);
    }


    // ----> metodo que guarda la información de empleado los controles de formulario en la tabla empleado de la base de datos <----
    public  function insertempleado(){
        $validatedData = $this->validate();
        $userid = User::select('id')->latest('id')->first();
            empleado::create([
            'clave' => $this->clave,
            'id_user' => $userid->id,
            'rfc' => $validatedData['rfc'],
            'area' => $this->idarea,
            'cargo' => $validatedData['cargo'],
        ]);
    }

    // ----> metodo que guarda la información de usuario los controles del formulario  en la tabla users que va enlazada a la tabla empleados de la base de datos <----
    public function insertuser(){
        if(!$this->viewer){
            $validatedData = $this->validate();
            $data =array(
                'name' => $validatedData['nombre'].' '.$validatedData['apaterno'].' '.$validatedData['apaterno'],
                'email' =>$validatedData['email'],
                'password' => Hash::make($validatedData['pass'])
            );
            User::create($data);
        }
    }

    // ----> Método que se ejecuta cuando se da clic al boton registrar del formulario de la vista registrar usuaruio <----
    public function create(){
        $validatedData = $this->validate();
        if(!$this->viewer){
            if($validatedData['pass']==$validatedData['repeatpass']){
                $this->insertuser();
                $this->insertempleado();
                $this->resetdatos();
                redirect()->route('users');
            }
        }
    }

    public function updateuser(){
        $validatedData = $this->validate();
        $updateuser = array(
            'name' => $validatedData['nombre'],
            'email' =>$validatedData['email'],
        );
        DB::table('users')->where('id',$this->id_user)->update($updateuser);
    }

    public function updatempleado(){
        $validatedData = $this->validate();
        $updatempleado = array(
            'id_user' => $this->id_user,
            'rfc' => $validatedData['rfc'],
            'area' => $this->idarea,
            'cargo' => $validatedData['cargo'],
        );
        DB::table('empleados')->where('id_user',$this->id_user)->update($updatempleado);
    }

    // ----> Metodo que se ejecutará cuando se de clic en actualizar en la vista actualizar usuario
    //  actualizara los cambios de los datos mostrados  en los controles <----
    public function update(){
        $this->updateuser();
        $this->updatempleado();
        $this->resetdatos();
        redirect()->route('users');
    }

    // ----> Metodo que consulta la información de usuario y empleado que van enlazados a la tabla users empleados y areas de la base de datos <----
    public function infouser(){
        $users= User::join('empleados','users.id','=','empleados.id_user')
            ->join('areas','empleados.area','=','areas.id')
            ->select('users.id','users.name','users.email','empleados.id as id_empleado',
                     'empleados.clave','empleados.rfc','empleados.cargo',
                     'areas.area','areas.id as idarea','areas.id_departamento as idep')
            ->where('users.id',$this->id_user)->get();

            $this->clave=$users[0]->clave;
            $this->email=$users[0]->email;
            $this->nombre=$users[0]->name;
            $this->rfc=$users[0]->rfc;
            $this->idarea=$users[0]->idarea;
            $this->idep=$users[0]->idep;
            $this->cargo=$users[0]->cargo;
    }

    // ----> Metodo que verifica  que si la variable viewer es verdadera para ejecutar el método infouser() escrito arriba
    // y mostrar los datos en la vista actualizar usuario en caso contrario no se mostraran los datos y se mostrara la vista registrar usuario <----
    public function views(){
        if($this->viewer){
            $this->infouser();
            $this->ren=false;
        }
        $this->rule();
    }

    // ----> Metodod que renderiza la vista donde se mostrara un formulario u otro dependiendo del valor de la variabl viewer <----
    public function selectDeparea(){
        $this->listdep =departamento::select('id','clave','departamento')->get();
            $this->listarea =area::select('id','clave','area','id_departamento as id_dep')->get();
    }
    public function render()
    {
        if($this->ren){
            $this->views();
        }
        $this->selectDeparea();
        return view('livewire.almacen.root.form-users');
    }
}
