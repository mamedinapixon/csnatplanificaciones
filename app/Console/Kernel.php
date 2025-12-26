<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Console\Commands\GenerarInformeAsistenciaDiario; // Importar el comando
use App\Console\Commands\RecordarCerrarAsistencia;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command(GenerarInformeAsistenciaDiario::class)->dailyAt('00:01');
        $schedule->command(RecordarCerrarAsistencia::class)->dailyAt(config('asistencia.recordatorio_hora', '20:00'));
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
