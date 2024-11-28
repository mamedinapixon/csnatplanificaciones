<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CaracterClaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $caracterClases = [
            'Teórica',
            'Teórico práctico',
            'Práctica',
            'Laboratorio',
            'Evaluativa',
            'Taller',
            'Trabajo de campo',
            'Seminario',
            'Otra',
        ];

        $now = Carbon::now();

        $data = array_map(function ($nombre) use ($now) {
            return [
                'nombre' => $nombre,
                'created_at' => $now,
                'updated_at' => $now
            ];
        }, $caracterClases);

        DB::table('caracter_clases')->insert($data);
    }
}
