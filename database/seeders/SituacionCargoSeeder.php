<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

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
