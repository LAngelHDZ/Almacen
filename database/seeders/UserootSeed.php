<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserootSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'=>'Super Administrador',
            'email'=>'root@gmail.com',
            'password'=> Hash::make('Admin'),
            'access'=>'1',
        ]);
    }
}
