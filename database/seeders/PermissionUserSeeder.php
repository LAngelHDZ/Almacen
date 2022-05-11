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
        $role1 =Role::create(['name'=>'root']);
        $role2 =Role::create(['name'=>'rm']);
        $role3 =Role::create(['name'=>'userG']);

        Permission::create(['name'=>'root.dashboard.root'])->syncRoles([$role1]);
        Permission::create(['name'=>'root.dashboard.gen'])->syncRoles([$role2,$role3]);
        Permission::create(['name'=>'root.dashboard.almacen'])->syncRoles([$role1]);
        Permission::create(['name'=>'root.dashboard.rm'])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>'root.dashboard.admon'])->syncRoles([$role1]);
        Permission::create(['name'=>'root.dashboard.profile'])->syncRoles([$role2]);

        // Permission::create(['name'=>'rm.dashboard.rm']);
        // Permission::create(['name'=>'rm.dashboard.gen']);
        // Permission::create(['name'=>'root.dashboard.rm']);
        // Permission::create(['name'=>'rm.dashboard.profile']);
    
    }
}
