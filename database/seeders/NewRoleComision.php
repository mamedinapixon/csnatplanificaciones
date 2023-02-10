<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class NewRoleComision extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['name' => 'comision']);
        $role->givePermissionTo(['cambiar estado planificaciones', 'ver planificaciones']);
    }
}
