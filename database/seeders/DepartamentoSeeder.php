<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $data=[
            [
                'clave' => 'DI',
                'departamento' => 'Direccion',
                'descripcion' => 'Direccion',
            ],
            [
                'clave' => 'AD',
                'departamento' => 'Control administrativo',
                'descripcion' => 'Control administrativo',
            ],
            [
                'clave' => 'CM',
                'departamento' => 'Vigilancia sanitaria',
                'descripcion' => 'Vigilancia sanitaria',
            ],
            [
                'clave' => 'CC',
                'departamento' => 'Vigilancia epidemiologica',
                'descripcion' => 'Vigilancia epidemiologica',
            ],
        ];

        DB::table('departamentos')->insert($data);
        
    }
}
