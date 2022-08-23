<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoAsignaturaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_asignaturas')->insert([
            'nombre' => 'No Promocional'
        ]);
        DB::table('tipo_asignaturas')->insert([
            'nombre' => 'Promocional'
        ]);
    }
}
