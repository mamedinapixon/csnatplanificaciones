<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'mamedina',
            'email' => 'mamedina@csnat.unt.edu.ar',
            'password' => Hash::make('cambiar123'),
        ]);
        DB::table('users')->insert([
            'name' => 'prueba',
            'email' => 'preuba@csnat.unt.edu.ar',
            'password' => Hash::make('cambiar123'),
        ]);
        //\App\Models\User::factory(10)->create();
    }
}
