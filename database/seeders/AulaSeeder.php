<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Aula;

class AulaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $aulas = [
            'Aula 2',
            'Aula 34',
            'Aula 5',
            'Aula 6',
            'Aula 7',
            'Aula 10',
            'Aula 11',
            'Anfiteatro',
            'Sala de inforática',
            'Sala de conferencias',
            'Laboratorio química',
            'Laboratorio de Suelo',
            'Aula C',
            'Aula D',
            'SUM del Anexo',
            'Aula Virla',
            'Otra',
        ];

        foreach ($aulas as $aula) {
            Aula::create(['nombre' => $aula]);
        }
    }
}
