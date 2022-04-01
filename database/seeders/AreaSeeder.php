<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AreaSeeder extends Seeder
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
                'id_departamento' => 1,
                'clave' => 'GC',
                'area' => 'Coord. Gestion de calidad',
                'descripcion' => 'Coordinación Gestion de calidad',
            ],
            [
                'id_departamento' => 1,
                'clave' => 'RM',
                'area' => 'Coord. RCPT de muestras y atención al publico',
                'descripcion' => 'Coordinación RCPT. de muestras y atención al publico',
            ],
            [
                'id_departamento' => 1,
                'clave' => 'CB',
                'area' => 'Coor. Ingenieria biomedica',
                'descripcion' => 'Coordinación Ingenieria biomedica',
            ],
            [
                'id_departamento' => 1,
                'clave' => 'RL',
                'area' => 'Coord. Red estatal de Laboratorios clinicos',
                'descripcion' => 'Coordinación Red estatal de Laboratorios clinicos',
            ],
            [
                'id_departamento' => 1,
                'clave' => 'IF',
                'area' => 'Coor. Informatica',
                'descripcion' => 'Coordinación Informatica',
            ],

            [
                'id_departamento' => 2,
                'clave' => 'RF',
                'area' => 'Recursos financieros',
                'descripcion' => 'Oficina de Recursos financieros',
            ],
            [
                'id_departamento' => 2,
                'clave' => 'RE',
                'area' => 'Recursos materiales',
                'descripcion' => 'Oficina de Recursos materiales',
            ],
            [
                'id_departamento' => 2,
                'clave' => 'RH',
                'area' => 'Recursos humanos',
                'descripcion' => 'Oficina de Recursos humanos',
            ],
            [
                'id_departamento' => 2,
                'clave' => 'IM',
                'area' => 'Ingenieria y mantenimiento',
                'descripcion' => 'Oficina de ingenieria y mantenimiento',
            ],

            [
                'id_departamento' => 3,
                'clave' => 'AB',
                'area' => 'LAB. Microbiologia de  alimentos y bebidas',
                'descripcion' => 'LAB. Microbiologia de  alimentos y bebidas',
            ],
            [
                'id_departamento' => 3,
                'clave' => 'TX',
                'area' => 'LAB. Toxicología ambiental',
                'descripcion' => 'LAB. toxicologia ambiental',
            ],
            [
                'id_departamento' => 3,
                'clave' => 'MA',
                'area' => 'LAB. Microbiologia de aguas',
                'descripcion' => 'LAB. Microbiologia de aguas',
            ],
            [
                'id_departamento' => 3,
                'clave' => 'QA',
                'area' => 'LAB. Analisis fisioquimicos',
                'descripcion' => 'LAB. Analisis fisioquimicos',
            ],
            [
                'id_departamento' => 3,
                'clave' => 'IT',
                'area' => 'LAB. Tipificación y cepario',
                'descripcion' => 'LAB. Tipificación y cepario',
            ],
            [
                'id_departamento' => 3,
                'clave' => 'MC',
                'area' => 'LAB. Medios de cultivo, lavado y esterilización',
                'descripcion' => 'LAB. Medios de cultivo, lavado y esterilización',
            ],

            [
                'id_departamento' => 4,
                'clave' => 'BM',
                'area' => 'LAB. Biología molecular',
                'descripcion' => 'LAB. Biologiá molecular',
            ],

            [
                'id_departamento' => 4,
                'clave' => 'TB',
                'area' => 'LAB. Microbacterias',
                'descripcion' => 'LAB. Microbacterias',
            ],
            [
                'id_departamento' => 4,
                'clave' => 'VI',
                'area' => 'LAB. Virología',
                'descripcion' => 'LAB. Virología',
            ],
            [
                'id_departamento' => 4,
                'clave' => 'PE',
                'area' => 'LAB. Parasitolgia y Entomología',
                'descripcion' => 'LAB. Parasitolgia y Entomología',
            ],
            [
                'id_departamento' => 4,
                'clave' => 'ME',
                'area' => 'LAB. Microbiología Epidemiológica',
                'descripcion' => 'LAB. Microbiología Epidemiológica',
            ],
            [
                'id_departamento' => 4,
                'clave' => 'CI',
                'area' => 'LAB. Citología exfoliativa',
                'descripcion' => 'LAB. Citología exfoliativa',
            ],
        ];
        DB::table('areas')->insert($data);
    }
}
