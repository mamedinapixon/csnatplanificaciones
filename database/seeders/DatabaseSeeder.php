<?php

namespace Database\Seeders;

use App\Models\PeriodoLectivo;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(CarreraSeeder::class);
        $this->call(ModalidadSeeder::class);
        $this->call(PeriodoAcademicoSeeder::class);
        $this->call(TipoAsignaturaSeeder::class);
        $this->call(RoleAndPermissionSeeder::class);
        $this->call(EstadoSeeder::class);
        $this->call(NewPermissionsSeeder::class);
        $this->call(ControlAsistenciaRoleAndPermissionSeeder::class);

        //$this->call(PeriodoLectivoSeeder::class);
        //$this->call(DocenteSeeder::class);
        //$this->call(MateriaSeeder::class);
        //$this->call(MateriaPlanEstudioSeeder::class);
    }
}
