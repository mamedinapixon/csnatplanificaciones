<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class NewPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'ver planificaciones']);
        Permission::create(['name' => 'editar planificaciones']);
        Permission::create(['name' => 'elininar planificaciones']);
        Permission::create(['name' => 'cambiar estado planificaciones']);

        Permission::create(['name' => 'editar docentes']);
        Permission::create(['name' => 'ver docentes']);
        Permission::create(['name' => 'eliminar docentes']);

        Permission::create(['name' => 'editar periodos lectivos']);
        Permission::create(['name' => 'eliminar periodos lectivos']);
        Permission::create(['name' => 'ver periodos lectivos']);

        Permission::create(['name' => 'editar usuarios']);
        Permission::create(['name' => 'ver usuarios']);
        Permission::create(['name' => 'eliminar usuarios']);
        Permission::create(['name' => 'gestionar rol usuarios']);

        $roleObservador = Role::create(['name' => 'observador']);
        $roleObservador->givePermissionTo(['ver planificaciones']);

        //$roleGestor = Role::create(['name' => 'gestor']);
        $roleGestor = Role::findByName('gestor');
        $roleGestor->givePermissionTo(['cambiar estado planificaciones', 'ver planificaciones']);
        $roleGestor->givePermissionTo(['editar docentes', 'ver docentes', 'eliminar docentes']);
        $roleGestor->givePermissionTo(['editar periodos lectivos', 'ver periodos lectivos', 'eliminar periodos lectivos']);
        //$roleDocente = Role::create(['name' => 'docente']);

        $roleSuperAdmin = Role::create(['name' => 'super-admin']);
        $roleSuperAdmin->givePermissionTo(Permission::all());

        $user = User::find(1);
        $user->assignRole($roleSuperAdmin);
    }
}
