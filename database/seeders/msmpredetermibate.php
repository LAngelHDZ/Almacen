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
                'descripcion'=>'Rechazo por activo fijo',
            ],
            [
                'typestatus'=>'Rechazada',
                'descripcion'=>'Rechazo por solicitud duplicada',
            ],
            [
                'typestatus'=>'Rechazada',
                'descripcion'=>'Rechazo por falta de recursos',
            ],
            [
                'typestatus'=>'Rechazada',
                'descripcion'=>'Rechazo por existencia de producto',
            ],
            [
                'typestatus'=>'Rechazada',
                'descripcion'=>'Rechazo por otro motivo',
            ],
            [
                'typestatus'=>'Cerrada',
                'descripcion'=>'Solicitud cerrada',
            ],

        ];

        DB::table('msmestatuses')->insert($data);
    }
}
