<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Catedra;
use App\Models\CatedraMember;
use Illuminate\Support\Facades\Hash;

class CatedraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear usuarios de ejemplo
        $jefe = User::firstOrCreate(
            ['email' => 'jefe.catedra@example.com'],
            [
                'name' => 'Dr. Juan Pérez',
                'password' => Hash::make('password'),
            ]
        );

        $miembro1 = User::firstOrCreate(
            ['email' => 'miembro1@example.com'],
            [
                'name' => 'Dra. María García',
                'password' => Hash::make('password'),
            ]
        );

        $miembro2 = User::firstOrCreate(
            ['email' => 'miembro2@example.com'],
            [
                'name' => 'Dr. Carlos López',
                'password' => Hash::make('password'),
            ]
        );

        // Crear cátedra de ejemplo
        $catedra = Catedra::firstOrCreate(
            ['nombre' => 'Cátedra de Matemáticas'],
            [
                'descripcion' => 'Cátedra responsable de las materias de matemáticas',
                'activa' => true,
            ]
        );

        // Asignar miembros a la cátedra
        CatedraMember::firstOrCreate([
            'catedra_id' => $catedra->id,
            'user_id' => $jefe->id,
        ], [
            'role' => 'jefe',
            'fecha_inicio' => now(),
            'activo' => true,
        ]);

        CatedraMember::firstOrCreate([
            'catedra_id' => $catedra->id,
            'user_id' => $miembro1->id,
        ], [
            'role' => 'miembro',
            'fecha_inicio' => now(),
            'activo' => true,
        ]);

        CatedraMember::firstOrCreate([
            'catedra_id' => $catedra->id,
            'user_id' => $miembro2->id,
        ], [
            'role' => 'miembro',
            'fecha_inicio' => now(),
            'activo' => true,
        ]);
    }
}
