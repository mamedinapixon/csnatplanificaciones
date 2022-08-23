<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModalidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('modalidads')->insert([
            'nombre' => 'Presencial'
        ]);
        DB::table('modalidads')->insert([
            'nombre' => 'Virtual'
        ]);
        DB::table('modalidads')->insert([
            'nombre' => 'Mixta'
        ]);
    }
}
