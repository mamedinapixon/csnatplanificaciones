<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleAdmin = Role::create(['name' => 'admin']);
        $roleGestor = Role::create(['name' => 'gestor']);
        $roleDocente = Role::create(['name' => 'docente']);

        $user = User::find(1);
        $user->assignRole($roleAdmin);

        $user = User::find(2);
        $user->assignRole($roleDocente);
    }
}
