<?php

namespace App\Http\Livewire\Almacen\Root;

use App\Models\User;
use Livewire\Component;

class TableUsers extends Component
{
    public $id_user,$email,$pass,$repeatpass;
    public $clave,$nss,$rfc,$nombre,$apaterno,$amaterno,$cargo,$fecha,$dir;
    public $cl_area,$area;
    public $cl_dep, $dep;

    public $users, $listuser,$datauser;

    public function showuser(){
        $users= User::join('empleados','users.id','=','empleados.id_user')
        ->join('areas','empleados.area','=','areas.id')
        ->select('users.id','users.name','users.email','empleados.id as id_empleado','empleados.clave','empleados.cargo','areas.area')->orderBy('id_empleado','desc')->get();
        $this->listuser=$users;
    }

    public function delete($id){
        User::destroy($id);
    }

    public function selectuser($iduser){
        $users = User::join('empleados','users.id','=','empleados.id_user')
        ->join('areas','empleados.area','=','areas.id')
        ->join('departamentos','areas.id_departamento','=','departamentos.id')
        ->select('users.id','users.name','users.email','empleados.id as id_empleado',
                 'empleados.clave','empleados.rfc','empleados.nss','empleados.fecha_nac',
                 'empleados.direccion','empleados.cargo',
                 'areas.area','areas.id as idarea','areas.clave as cl_area',
                 'departamentos.clave as cl_dep','departamentos.departamentos as dep')
        ->where('users.id',$iduser)->get();
        
        $this->clave=$users[0]->clave;
        $this->email=$users[0]->email;
        $this->nombre=$users[0]->name;
        $this->rfc=$users[0]->rfc;
        $this->nss=$users[0]->nss;
        $this->fecha=$users[0]->fecha_nac;
        $this->dir=$users[0]->direccion;
        $this->area=$users[0]->area;
        $this->cl_area=$users[0]->cl_area;
        $this->dep=$users[0]->dep;
        $this->cl_dep=$users[0]->cl_dep;
        $this->cargo=$users[0]->cargo; 

        
    }

    public function viewinfo($id){
        $this->selectuser($id);
        $this->viewinfomodal();
    }
    public function viewinfomodal(){
        $this->dispatchBrowserEvent('show-modal');
    }

    public function render()
    {
        $this->showuser();
        return view('livewire.almacen.root.table-users');
    }
}
