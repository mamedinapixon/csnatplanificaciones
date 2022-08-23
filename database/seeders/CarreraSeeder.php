<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarreraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('carreras')->insert([
            'nombre' => 'Licenciatura en Ciencias Biológicas',
            'codigo_siu' => 'LIC00',
            'plan_anio' => 2000,
            'nombre_reducido' => 'Lic en Cs Biológicas Plan 2000',
            'estado_id' => 1
        ]);
        DB::table('carreras')->insert([
            'nombre' => 'Licenciatura en Ciencias Biológicas',
            'codigo_siu' => 'LIC13',
            'plan_anio' => 2013,
            'nombre_reducido' => 'Lic en Cs Biológicas Plan 2013',
            'estado_id' => 1
        ]);
        DB::table('carreras')->insert([
            'nombre' => 'Profesorado de Ciencias Biológicas',
            'codigo_siu' => 'LPRO00',
            'plan_anio' => 2000,
            'nombre_reducido' => 'Prof de Biología Plan 2000',
            'estado_id' => 1
        ]);
    }
}
