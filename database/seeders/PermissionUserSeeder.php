<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class PermissionUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 =Role::create(['name'=>'Root','description'=>'Usuario con todos los privilegios el sistema']);
        $role2 =Role::create(['name'=>'RecursosM','description'=>'Usuario con privilegios de recursos masteriales y usuario general']);
        $role3 =Role::create(['name'=>'Ususario','description'=>'Usuario con privilegios de usuario general']);
        $role4 =Role::create(['name'=>'Almacen','description'=>'Usuario con privilegios de almacen']);
        $role5 =Role::create(['name'=>'Administrador','description'=>'Usuario con privilegios de adminsitrador']);

        Permission::create(['name'=>'root.dashboard.index','description'=>'Permiso de ver la vista principal administrador'])->syncRoles([$role1]);
        Permission::create(['name'=>'root.dashboard.show','description'=>'Permiso de ver contenido en las vistas de adminsitrador'])->syncRoles([$role1]);
        Permission::create(['name'=>'root.dashboard.create','description'=>'Permiso de opciones de crear información'])->syncRoles([$role1]);
        Permission::create(['name'=>'root.dashboard.edit','description'=>'Permiso de opciones de editar informacion'])->syncRoles([$role1]);
        Permission::create(['name'=>'root.dashboard.delete','description'=>'Permiso de opciones de eliminar informacion'])->syncRoles([$role1]);
        Permission::create(['name'=>'root.dashboard.query','description'=>'Permiso de opciones de consultar información'])->syncRoles([$role1]);

        Permission::create(['name'=>'admin.dashboard.index','description'=>'Permiso de ver la vista principal administrador'])->syncRoles([$role1,$role5]);
        Permission::create(['name'=>'admin.dashboard.show','description'=>'Permiso de ver contenido en las vistas de adminsitrador'])->syncRoles([$role1,$role5]);
        Permission::create(['name'=>'admin.dashboard.create','description'=>'Permiso de opciones de crear información'])->syncRoles([$role5]);
        Permission::create(['name'=>'admin.dashboard.edit','description'=>'Permiso de opciones de editar informacion'])->syncRoles([$role5]);
        Permission::create(['name'=>'admin.dashboard.delete','description'=>'Permiso de opciones de eliminar informacion'])->syncRoles([$role5]);
        Permission::create(['name'=>'admin.dashboard.query','description'=>'Permiso de opciones de consultar información'])->syncRoles([$role5]);

        Permission::create(['name'=>'rm.dashboard.index','description'=>'Permiso de ver la vista principal recursos materiales'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'rm.dashboard.show','description'=>'Permiso de ver contenido en las vistas de recursos materiales'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'rm.dashboard.create','description'=>'Permiso de opciones de crear información'])->syncRoles([$role2]);
        Permission::create(['name'=>'rm.dashboard.edit','description'=>'Permiso de opciones de editar informacion'])->syncRoles([$role2]);
        Permission::create(['name'=>'rm.dashboard.delete','description'=>'Permiso de opciones de eliminar informacion'])->syncRoles([$role2]);
        Permission::create(['name'=>'rm.dashboard.query','description'=>'Permiso de opciones de consultar información'])->syncRoles([$role1,$role2]);


        Permission::create(['name'=>'userg.dashboard.index','description'=>'Permiso de ver la vista principal de Usuario General'])->syncRoles([$role3]);
        Permission::create(['name'=>'userg.dashboard.show','description'=>'Permiso de ver contenido en las vistas de Usuario General'])->syncRoles([$role3]);
        Permission::create(['name'=>'userg.dashboard.create','description'=>'Permiso de opciones de crear información'])->syncRoles([$role3]);
        Permission::create(['name'=>'userg.dashboard.edit','description'=>'Permiso de opciones de editar informacion'])->syncRoles([$role3]);
        Permission::create(['name'=>'userg.dashboard.delete','description'=>'Permiso de opciones de eliminar informacion'])->syncRoles([$role3]);
        Permission::create(['name'=>'userg.dashboard.query','description'=>'Permiso de opciones de consultar información'])->syncRoles([$role3]);

        Permission::create(['name'=>'almacen.dashboard.index','description'=>'Permiso de ver la vista principal almacen'])->syncRoles([$role1,$role4]);
        Permission::create(['name'=>'almacen.dashboard.show','description'=>'Permiso de ver la vista principal almacen'])->syncRoles([$role4]);
        Permission::create(['name'=>'almacen.dashboard.create','description'=>'Permiso de opciones de crear información'])->syncRoles([$role4]);
        Permission::create(['name'=>'almacen.dashboard.edit','description'=>'Permiso de opciones de editar informacion'])->syncRoles([$role4]);
        Permission::create(['name'=>'almacen.dashboard.delete','description'=>'Permiso de opciones de eliminar informacion'])->syncRoles([$role4]);
        Permission::create(['name'=>'almacen.dashboard.query','description'=>'Permiso de opciones de consultar información'])->syncRoles([$role1,$role4]);

        Permission::create(['name'=>'profile.dashboard.index','description'=>'Permiso de consultar información de usuario'])->syncRoles([$role2,$role3,$role4,$role5]);


        // Permission::create(['name'=>'rm.dashboard.rm']);
        // Permission::create(['name'=>'rm.dashboard.gen']);
        // Permission::create(['name'=>'root.dashboard.rm']);
        // Permission::create(['name'=>'rm.dashboard.profile']);

    }
}
