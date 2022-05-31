<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class msmpredetermibate extends Seeder
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
                'typestatus'=>'Enviado',
                'descripcion'=>'Solicitud enviada en espera de revisión y aprobación',
            ],
            [
                'typestatus'=>'Revisada',
                'descripcion'=>'Solicitud revisada y en proceso de autorización',
            ],
            [
                'typestatus'=>'Aprobada',
                'descripcion'=>'Solicitud aprobada en proceso de realizar compra',
            ],
            [
                'typestatus'=>'Transito',
                'descripcion'=>'Compra realizada al proveedor',
            ],
            [
                'typestatus'=>'Almacen',
                'descripcion'=>'Los materiales han llegado al almacen, en espera de darlos de alta al sistema',
            ],
            [
                'typestatus'=>'Rechazada',
                'descripcion'=>'Solicitud Rechazada por razon No. 1',
            ],
            [
                'typestatus'=>'Rechazada',
                'descripcion'=>'Solicitud Rechazada por razon No. 2',
            ],
            [
                'typestatus'=>'Rechazada',
                'descripcion'=>'Solicitud Rechazada por razon No. 3',
            ],
            [
                'typestatus'=>'Rechazada',
                'descripcion'=>'Solicitud Rechazada por razon No. 4',
            ],
            [
                'typestatus'=>'Rechazada',
                'descripcion'=>'Solicitud Rechazada por razon No. 5',
            ],
           

        ];

        DB::table('msmestatuses')->insert($data);
    }
}
