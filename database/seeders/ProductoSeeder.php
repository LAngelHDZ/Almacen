<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductoSeeder extends Seeder
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
                'clave_producto'=>'352027',
                'producto'=>'TUBOS ESTERILES',
                'marca'=>'BECTON DICKINSON',
                'descripcion'=>' FONDO REDONDO CON TAPA DE ROSCA POLIESTIRENO 13Xx100MN NON PIROGENICO, FALCON, CAJA CON 8 BOLSAS C/125 PIEZAS. REQ. 33 ',
                'categoria'=>'Reactivo',
                'presentacion'=>'caja',
                'contenido'=>'8',
                'unidad'=>'Pqt',

            ],
            [
                'clave_producto'=>'72.694.006',
                'producto'=>'MICROTUBOS',
                'marca'=>'SARSTEDT',
                'descripcion'=>'(VIALES) 2ml DE POLIPROPILENO, C/100 PIEZAS',
                'categoria'=>'Reactivo',
                'presentacion'=>'Caja',
                'contenido'=>'100',
                'unidad'=>'Pz',

            ],
            [
                'clave_producto'=>'s/n-0001',
                'producto'=>'GALÓN DE EXMICROR',
                'marca'=>'BIORGANICO ROBECH',
                'descripcion'=>' DESINFECTANTE DE ORIGEN NATURAL',
                'categoria'=>'Reactivo',
                'presentacion'=>'Unidad',
                'contenido'=>'5',
                'unidad'=>'L',

            ],
            [
                'clave_producto'=>'7021',
                'producto'=>'AGAR',
                'marca'=>'MCD LAB',
                'descripcion'=>'CITRATO DE SIMMONS, FRASCO C/450 GR.',
                'categoria'=>'Reactivo',
                'presentacion'=>'Unidad',
                'contenido'=>'450',
                'unidad'=>'gr',

            ],
            [
                'clave_producto'=>'279510',
                'producto'=>'ENRIQUECIMIENTO LEPTOSPIRA EMJH',
                'marca'=>'DIFCO',
                'descripcion'=>'CAJA C/6 FRASCOS C/100 ML.',
                'categoria'=>'Reactivo',
                'presentacion'=>'Caja',
                'contenido'=>'6',
                'unidad'=>'Pz',

            ],
            [
                'clave_producto'=>'1308-A',
                'producto'=>'CALDO EC CON MUG',
                'marca'=>'DIBICO',
                'descripcion'=>'FRASCO C/450 GR(15 DÍAS SALVO VENTA)',
                'categoria'=>'Reactivo',
                'presentacion'=>'Unidad',
                'contenido'=>'450',
                'unidad'=>'gr',

            ],
            [
                'clave_producto'=>'1288-A',
                'producto'=>'AGAR INDICADOR PM',
                'marca'=>'DIBICO',
                'descripcion'=>'FRASCO C/450 GR(8 DÍAS SALVO VENTA)',
                'categoria'=>'Reactivo',
                'presentacion'=>'Unidad',
                'contenido'=>'450',
                'unidad'=>'gr',

            ],
            [
                'clave_producto'=>'LP0037',
                'producto'=>'PEPTONA BACTERIOLOGICA',
                'marca'=>'OXOID',
                'descripcion'=>'FRASCO C/500 GR(4 SEMANAS)',
                'categoria'=>'Reactivo',
                'presentacion'=>'Unidad',
                'contenido'=>'500',
                'unidad'=>'gr',

            ],
            [
                'clave_producto'=>'101005166',
                'producto'=>'MATRAZ VOLUMÉTRICO',
                'marca'=>'PYREX',
                'descripcion'=>'CLASE "A" (LINEA DE MATERIAL CERTIFICADO Y SERIALIZADO POR LOTE ), CATALOGO: 5642 C-250',
                'categoria'=>'Reactivo',
                'presentacion'=>'Unidad',
                'contenido'=>'250',
                'unidad'=>'ml',

            ],
            [
                'clave_producto'=>'101005167',
                'producto'=>'MATRAZ VOLUMÉTRICO',
                'marca'=>'PYREX',
                'descripcion'=>'CLASE "A" (LINEA DE MATERIAL CERTIFICADO Y SERIALIZADO POR LOTE ), CATALOGO: 5642 C-500',
                'categoria'=>'Reactivo',
                'presentacion'=>'Unidad',
                'contenido'=>'500',
                'unidad'=>'ml',

            ],
            [
                'clave_producto'=>'101005168',
                'producto'=>'MATRAZ VOLUMÉTRICO',
                'marca'=>'PYREX',
                'descripcion'=>'CLASE "A" (LINEA DE MATERIAL CERTIFICADO Y SERIALIZADO POR LOTE ), CATALOGO: 5642 C-1L',
                'categoria'=>'Reactivo',
                'presentacion'=>'Unidad',
                'contenido'=>'1000',
                'unidad'=>'ml',

            ],
            [
                'clave_producto'=>'10100471',
                'producto'=>'BURETA',
                'marca'=>'PYREX',
                'descripcion'=>'CLASE "A" (LINEA DE MATERIAL CERTIFICADO Y SERIALIZADO POR LOTE), CATALOGO: 2103C-50',
                'categoria'=>'Reactivo',
                'presentacion'=>'Unidad',
                'contenido'=>'50',
                'unidad'=>'ml',

            ],
            [
                'clave_producto'=>'211719',
                'producto'=>'AGAR',
                'marca'=>'BD BIOXON',
                'descripcion'=>'HIERRO Y LISINA FRASCO C/450 GR. (8 DÍAS SALVO VENTA)',
                'categoria'=>'Reactivo',
                'presentacion'=>'Unidad',
                'contenido'=>'450',
                'unidad'=>'gr',

            ],
            [
                'clave_producto'=>'211728',
                'producto'=>'BASE DE AGAR SANGRE',
                'marca'=>'MCD LAB',
                'descripcion'=>'FRASCO C/450 GR (DIAS SALVO VENTA)',
                'categoria'=>'Reactivo',
                'presentacion'=>'Unidad',
                'contenido'=>'450',
                'unidad'=>'gr',

            ],
            [
                'clave_producto'=>'7031',
                'producto'=>'AGAR DEXTROSA SABOURAUD',
                'marca'=>'MCD LAB',
                'descripcion'=>'FRASCO C/450 GR (8 DIAS SALVO VENTA)',
                'categoria'=>'Reactivo',
                'presentacion'=>'Unidad',
                'contenido'=>'450',
                'unidad'=>'gr',

            ],
            [
                'clave_producto'=>'211705',
                'producto'=>'CALDO MALONATO',
                'marca'=>'DIFCO',
                'descripcion'=>'FRASCO C/500 GR (3 SEMANAS)',
                'categoria'=>'Reactivo',
                'presentacion'=>'Unidad',
                'contenido'=>'500',
                'unidad'=>'gr',

            ],
            [
                'clave_producto'=>'298076',
                'producto'=>'CALDO LAURIL',
                'marca'=>'BD BBL',
                'descripcion'=>'FRASCO C/500 GR (8 DIAS SALVO VENTA)',
                'categoria'=>'Reactivo',
                'presentacion'=>'Unidad',
                'contenido'=>'500',
                'unidad'=>'gr',

            ],
            [
                'clave_producto'=>'450022',
                'producto'=>'FLORURO DE SODIO ANHIDRO',
                'marca'=>'SIGM-ALDRICH',
                'descripcion'=>'(PUREZA 99.99%) FRASCO DE 5 GRAMOS,NOTA: INCLUIR CERTIFICADO DE ANALISIS Y HOJA DE SEGURIDAD (45 DIAS)',
                'categoria'=>'Reactivo',
                'presentacion'=>'Unidad',
                'contenido'=>'5',
                'unidad'=>'gr',

            ],
            [
                'clave_producto'=>'52906',
                'producto'=>'Kit de extracción',
                'marca'=>'QIAAMP',
                'descripcion'=>'viral QIAGEN',
                'categoria'=>'Insumo general',
                'presentacion'=>'Unidad',
                'contenido'=>'1',
                'unidad'=>'Pz',

            ],
            [
                'clave_producto'=>'11732-088',
                'producto'=>'Encima súper',
                'marca'=>'INVITROGEN.',
                'descripcion'=>'(caja)',
                'categoria'=>'Reactivo',
                'presentacion'=>'Caja',
                'contenido'=>'1',
                'unidad'=>'Pz',

            ],
            [
                'clave_producto'=>'s/n-0002',
                'producto'=>'Chagastes Elisa',
                'marca'=>'Winner Lab',
                'descripcion'=>' recombinante 4.0 wiener lab. Ensayo inmuno enzimatico (Elisa) para deteccion de anticuerpos anti-trypanosoma cruz, presentacion 192 determinaciones',
                'categoria'=>'Reactivo',
                'presentacion'=>'Unidad',
                'contenido'=>'1',
                'unidad'=>'Pz',

            ],
            [
                'clave_producto'=>'278850',
                'producto'=>'Agar XLD',
                'marca'=>'BD DIFCO',
                'descripcion'=>'diferencia de patogenos entericos 500g',
                'categoria'=>'Reactivo',
                'presentacion'=>'Unidad',
                'contenido'=>'500',
                'unidad'=>'gr',

            ],
            [
                'clave_producto'=>'716',
                'producto'=>'Agar salmonella shigella',
                'marca'=>'MCD LAB',
                'descripcion'=>'salmonella shigella frasco 450g',
                'categoria'=>'Reactivo',
                'presentacion'=>'Unidad',
                'contenido'=>'450',
                'unidad'=>'gr',

            ],
            [
                'clave_producto'=>'236950',
                'producto'=>'Agar soya',
                'marca'=>'DIFCO',
                'descripcion'=>'soya frasco 500g',
                'categoria'=>'Reactivo',
                'presentacion'=>'Unidad',
                'contenido'=>'500',
                'unidad'=>'gr',

            ],
            [
                'clave_producto'=>'5001',
                'producto'=>'Alimento de Ratón',
                'marca'=>'Rodent DIet',
                'descripcion'=>'bulto con 50 Lb',
                'categoria'=>'Reactivo',
                'presentacion'=>'Paquete',
                'contenido'=>'50',
                'unidad'=>'Lb',

            ],
            [
                'clave_producto'=>'s/n-0003',
                'producto'=>'GUANTES',
                'marca'=>'AMBIDERM',
                'descripcion'=>'DE NITRILO PIEZAS GRANDES',
                'categoria'=>'Insumo General',
                'presentacion'=>'Caja',
                'contenido'=>'100',
                'unidad'=>'Pz',

            ],
            [
                'clave_producto'=>'s/n-0004',
                'producto'=>'GUANTES',
                'marca'=>'AMBIDERM',
                'descripcion'=>'DE LATEX NO ESTERIL PIEZAS CHICAS',
                'categoria'=>'Insumo General',
                'presentacion'=>'Caja',
                'contenido'=>'100',
                'unidad'=>'Pz',

            ],
            [
                'clave_producto'=>'s/n-0005',
                'producto'=>'GUANTES',
                'marca'=>'AMBIDERM',
                'descripcion'=>'DE LATEX NO ESTERIL PIEZAS MEDIANOS',
                'categoria'=>'Insumo General',
                'presentacion'=>'Caja',
                'contenido'=>'100',
                'unidad'=>'Pz',

            ],
            [
                'clave_producto'=>'s/n-0006',
                'producto'=>'GUANTES',
                'marca'=>'AMBIDERM',
                'descripcion'=>'DE LATEX NO ESTERIL PIEZAS GRANDEZ',
                'categoria'=>'Insumo General',
                'presentacion'=>'Caja',
                'contenido'=>'100',
                'unidad'=>'Pz',

            ],
        ];
    DB::table('productos')->insert($data);


    }
}
