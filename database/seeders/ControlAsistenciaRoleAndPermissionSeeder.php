<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class ControlAsistenciaRoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crear el permiso si no existe
        $permission = Permission::firstOrCreate(['name' => 'controlar asistencia']);

        // Crear el rol si no existe
        $role = Role::firstOrCreate(['name' => 'Control de Asistencia']);

        // Asignar el permiso al rol
        if (!$role->hasPermissionTo($permission)) {
            $role->givePermissionTo($permission);
        }

        $this->command->info('Permiso "controlar asistencia" y rol "Control de Asistencia" creados y asignados.');
    }
}
