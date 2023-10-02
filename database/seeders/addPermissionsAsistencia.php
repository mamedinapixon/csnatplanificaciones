<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class addPermissionsAsistencia extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'ver historial asistencia']);
        Permission::create(['name' => 'editar asistencia']);
        Permission::create(['name' => 'eliminar asistencia']);
        Permission::create(['name' => 'comentar asistencia']);

        $roleGestorMemoria = Role::create(['name' => 'gestor asistencia']);
        $roleGestorMemoria->givePermissionTo([
            'ver historial asistencia',
            'editar asistencia',
            'eliminar asistencia',
            'comentar asistencia',
        ]);

        $roleSuperAdmin = Role::findByName('super-admin');
        $roleSuperAdmin->givePermissionTo([
            'ver historial asistencia',
            'editar asistencia',
            'eliminar asistencia',
            'comentar asistencia',
        ]);
    }
}
