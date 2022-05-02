<?php

namespace App\Http\Livewire\Almacen\Perfil;

use App\Models\empleado;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PerfilUser extends Component
{

    public $info,$idempleado;
    public function mount(){
        $userid=Auth::user()->id;
       $this->info= User::join('empleados','users.id','=','empleados.id_user')
        ->join('areas','areas.id','=','empleados.area')
        ->join('departamentos as dep','dep.id','=','areas.id_departamento')
        // ->join('firma_digitals as efirma','empleados.id','=','efirma.id_empleado')
        ->select('users.name','users.email','empleados.id_user','empleados.id as ide','empleados.clave','empleados.cargo','empleados.rfc',
        'areas.clave','areas.area','dep.clave as clavedep','dep.departamento'
        )
        ->where('users.id',$userid)
        ->get();

        $this->idempleado=$this->info[0]->ide;
    }

    public function render()
    {
        return view('livewire.almacen.perfil.perfil-user');
    }
}
