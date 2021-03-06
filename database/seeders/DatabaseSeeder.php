<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(PermissionUserSeeder::class);
        $this->call(UserootSeed::class);
        $this->call(DepartamentoSeeder::class);
        $this->call(AreaSeeder::class);
        $this->call(ProveedorSeeder::class);
        $this->call(ProductoSeeder::class);
        $this->call(EmpleadoSeeder::class);
        $this->call(msmpredetermibate::class);
    }
}
