<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class NewPermissionEstado extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleComision = Role::findByName('comision');
        $roleComision->revokePermissionTo('cambiar estado planificaciones');
        Permission::create(['name' => 'revisar planificaciones']);
        $roleComision->givePermissionTo(['revisar planificaciones']);

    }
}
