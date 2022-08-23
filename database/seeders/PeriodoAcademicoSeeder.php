<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeriodoAcademicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('periodo_academicos')->insert([
            'nombre' => 'Anual'
        ]);
        DB::table('periodo_academicos')->insert([
            'nombre' => '1er Cuatrimestre'
        ]);
        DB::table('periodo_academicos')->insert([
            'nombre' => '2do Cuatrimestre'
        ]);
    }
}
