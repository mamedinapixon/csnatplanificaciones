<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class AddPermissionsLibroTema extends Seeder
{
    private $permissions = [
            'ver historial libro tema',
            'editar libro tema',
            'eliminar libro tema',
            'comentar libro tema',
    ];

    public function run()
    {
        $this->createPermissions();
        $this->assignPermissionsToRoles();
    }

    private function createPermissions()
    {
        foreach ($this->permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }

    private function assignPermissionsToRoles()
    {
        $roleGestorAsistencia = Role::create(['name' => 'gestor libro tema']);
        $roleSuperAdmin = Role::findByName('super-admin');
        $roleGestorAsistencia->givePermissionTo($this->permissions);
        $roleSuperAdmin->givePermissionTo($this->permissions);
    }
}
