<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProveedorSeeder extends Seeder
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
                'rfc'=>'DOV494828323',
                'empresa'=>'DOVITA S.A. DE C.V.',
                'direccion'=>'Calle la esperanza No.7 Valle de México, Mexico, , col. La progreso CP 93842 Mz 80 Lt 87',
                'email'=>'dovita@gmail.com',
                'telefono'=>'5523458736',
                'active'=>'1',
            ],
            [
                'rfc'=>'INTE83436785',
                'empresa'=>'INTEGRADORA MEDICA',
                'direccion'=>'Calle la Union No.5 Guadalajara ,Jalisco , Col. Margarita CP 43942 Mz 32 Lt 12',
                'email'=>'intemedic@gmail.com',
                'telefono'=>'3367458734',
                'active'=>'1',
            ],
            [
                'rfc'=>'MVM80236734',
                'empresa'=>'MELANY VILLAREAL MIRANDA',
                'direccion'=>'Calle la paz No.5 Acapulco Guerrero, Col. Centro CP 39808 Mz 19 Lt 44',
                'email'=>'melanyvm@gmail.com',
                'telefono'=>'7444676539',
                'active'=>'1',
            ],
        ];

        DB::table('proveedors')->insert($data);

    }
}
