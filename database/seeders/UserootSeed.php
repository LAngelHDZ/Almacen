<?php

namespace Database\Seeders;

use App\Models\User;
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

        User::create([
            'name'=>'Super Administrador',
            'email'=>'root@gmail.com',
            'password'=> Hash::make('Admin'),
            'access'=>'1',
        ])->assignRole('root');
    }
}
