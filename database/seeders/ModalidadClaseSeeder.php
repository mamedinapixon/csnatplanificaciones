<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ModalidadClaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $modalidadesClases = [
            'Presencial',
            'Virtual',
            'Híbrida'
        ];

        $now = Carbon::now();

        $data = array_map(function ($nombre) use ($now) {
            return [
                'nombre' => $nombre,
                'created_at' => $now,
                'updated_at' => $now
            ];
        }, $modalidadesClases);

        DB::table('modalidades_clases')->insert($data);
    }
}
