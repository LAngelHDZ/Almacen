<?php

namespace App\Http\Livewire\Almacen\Root;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class TableUsers extends Component
{
    use WithPagination;
    public $id_user,$email,$pass,$repeatpass;
    public $clave,$rfc,$nombre,$apaterno,$amaterno,$cargo;
    public $cl_area,$area;
    public $cl_dep, $dep;
    public $search,$campo='users.name';
    public $users,$datauser;

    public function showuser(){
        $users= User::join('empleados','users.id','=','empleados.id_user')
        ->join('areas','empleados.area','=','areas.id')
        ->select('users.id','users.name','users.email','empleados.id as id_empleado','empleados.clave','empleados.cargo','areas.area')
        ->orderBy('id_empleado','desc')
        ->where($this->campo,'like','%'.$this->search.'%')
        ->paginate(10);
        return $users;
    }

    public function updatingSearch(){
        $this->resetPage();
    }

    public function delete($id){
        User::destroy($id);
    }

    public function selectuser($iduser){
        $users = User::join('empleados','users.id','=','empleados.id_user')
        ->join('areas','empleados.area','=','areas.id')
        ->join('departamentos','areas.id_departamento','=','departamentos.id')
        ->select('users.id','users.name','users.email','empleados.id as id_empleado',
                 'empleados.clave','empleados.rfc','empleados.cargo',
                 'areas.area','areas.id as idarea','areas.clave as cl_area',
                 'departamentos.clave as cl_dep','departamentos.departamento as dep')
        ->where('users.id',$iduser)->get();

        $this->clave=$users[0]->clave;
        $this->email=$users[0]->email;
        $this->nombre=$users[0]->name;
        $this->rfc=$users[0]->rfc;
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
        return view('livewire.almacen.root.table-users',[ 'listuser'=> $this->showuser()]);
    }
}
