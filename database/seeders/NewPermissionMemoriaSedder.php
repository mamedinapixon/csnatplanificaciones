<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class NewPermissionMemoriaSedder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'ver todas memorias']);
        Permission::create(['name' => 'editar cualquier memoria']);
        Permission::create(['name' => 'eliminar cualquier memoria']);
        Permission::create(['name' => 'cambiar estado memoria']);
        Permission::create(['name' => 'revisar memorias']);

        $roleGestorMemoria = Role::create(['name' => 'gestor memorias']);
        $roleGestorMemoria->givePermissionTo(['ver todas memorias','editar cualquier memoria','eliminar cualquier memoria','cambiar estado memoria']);

        $roleSuperAdmin = Role::findByName('super-admin');
        $roleSuperAdmin->givePermissionTo(['ver todas memorias','editar cualquier memoria','eliminar cualquier memoria','cambiar estado memoria']);

    }
}
