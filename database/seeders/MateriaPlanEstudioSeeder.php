<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MateriaPlanEstudio;

class MateriaPlanEstudioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MateriaPlanEstudio::factory()->count(100)->create();
    }
}
