<?php

namespace Database\Seeders;

use App\Models\User;
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

        User::create([
            'name'=>'Alberto Hernandez Garcia',
            'email'=>'empleado@gmail.com',
            'password'=> Hash::make('Empleado'),
            'access'=>'1',
        ])->assignRole('RecursosM');

        DB::table('empleados')->insert([
            'clave'=>001,
            'id_user'=>2,
            'rfc'=>'HEGA9604058R7',
            'area'=>7,
            'cargo'=>'Jefe',
        ]);

        User::create([
            'name'=>'Adrian Morales Vazquez',
            'email'=>'empleado2@gmail.com',
            'password'=> Hash::make('Empleado'),
            'access'=>'1',
        ])->assignRole('Ususario');

        DB::table('empleados')->insert([
            'clave'=>002,
            'id_user'=>3,
            'rfc'=>'MOVA9702158S9',
            'area'=>11,
            'cargo'=>'Jefe',
        ]);
        User::create([
            'name'=>'Jose Vazquez Mendoza',
            'email'=>'almacen@gmail.com',
            'password'=> Hash::make('Almacen'),
            'access'=>'1',
        ])->assignRole('Almacen');

        DB::table('empleados')->insert([
            'clave'=>003,
            'id_user'=>4,
            'rfc'=>'VAMJ3652158S9',
            'area'=>11,
            'cargo'=>'Jefe',
        ]);

        User::create([
            'name'=>'Benjamin Vazquez Vinalay',
            'email'=>'administrador@gmail.com',
            'password'=> Hash::make('Admin'),
            'access'=>'1',
        ])->assignRole('Administrador');

        DB::table('empleados')->insert([
            'clave'=>004,
            'id_user'=>5,
            'rfc'=>'VAMJ3652158S5',
            'area'=>11,
            'cargo'=>'Jefe',
        ]);
    }
}
