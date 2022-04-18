<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EmpleadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'=>'Alberto Hernandez Garcia',
            'email'=>'empleado@gmail.com',
            'password'=> Hash::make('Empleado'),
            'access'=>'1',
        ]);

        DB::table('empleados')->insert([
            'clave'=>001,
            'id_user'=>2,
            'rfc'=>'HEGA9604058R7',
            'area'=>11,
            'cargo'=>'Jefe',
        ]);
    }
}
