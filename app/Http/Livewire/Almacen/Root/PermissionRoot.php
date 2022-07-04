<?php

namespace App\Http\Livewire\Almacen\Root;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Livewire\Component;
use Livewire\WithPagination;

class PermissionRoot extends Component
{
    use WithPagination;
    public function getPermissions(){
        
        $permission = Permission::select('id','name','description')->paginate(10);
        return $permission; 
    }
    public function render()
    {
        
        return view('livewire.almacen.root.permission-root',['permission'=>$this->getPermissions()]);
    }
}
