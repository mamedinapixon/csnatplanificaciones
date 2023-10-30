<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ubicacion;

class UbicacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ubicacion::create([
            'descripcion' => 'Sede Central'
        ]);
        Ubicacion::create([
            'descripcion' => 'Fundación Miguel Lillo'
        ]);
        Ubicacion::create([
            'descripcion' => 'Anexo San Martín 1545'
        ]);
        Ubicacion::create([
            'descripcion' => 'REHM-JB'
        ]);
        Ubicacion::create([
            'descripcion' => 'Cúpulas'
        ]);
        Ubicacion::create([
            'descripcion' => 'INSUGEO'
        ]);
        Ubicacion::create([
            'descripcion' => 'Virla'
        ]);
        Ubicacion::create([
            'descripcion' => 'Otro',
            'is_otro' => true

        ]);
    }
}
