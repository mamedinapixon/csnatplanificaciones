<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SituacionCargoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SituacionCargo::create(['nombre'=>'Regular']);
        SituacionCargo::create(['nombre'=>'Interino']);
    }
}
