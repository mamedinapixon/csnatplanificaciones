<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeriodoLectivoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('periodo_lectivos')->insert([
            'anio_academico' => 2022,
            'periodo_academico_id' => 1,
            'fecha_inicio_activo' => '2022-04-01',
            'fecha_fin_activo' => '2014-07-01'
        ]);
        DB::table('periodo_lectivos')->insert([
            'anio_academico' => 2022,
            'periodo_academico_id' => 2,
            'fecha_inicio_activo' => '2022-04-01',
            'fecha_fin_activo' => '2014-07-01'
        ]);
        DB::table('periodo_lectivos')->insert([
            'anio_academico' => 2022,
            'periodo_academico_id' => 3,
            'fecha_inicio_activo' => '2022-08-01',
            'fecha_fin_activo' => '2014-12-01'
        ]);
    }
}
