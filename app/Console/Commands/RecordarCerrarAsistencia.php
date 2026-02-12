<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Asistencia;
use App\Notifications\RecordatorioSalidaNotification;
use Carbon\Carbon;

class RecordarCerrarAsistencia extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'asistencia:recordar-salida';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Envía una notificación a los usuarios que no han marcado su salida del día.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $hoy = Carbon::today();

        $asistenciasAbiertas = Asistencia::whereDate('fecha_at', $hoy)
            ->whereNull('salida_at')
            ->with('user')
            ->get();

        $count = 0;

        foreach ($asistenciasAbiertas as $asistencia) {
            if ($asistencia->user) {
                $asistencia->user->notify(new RecordatorioSalidaNotification());
                $count++;
            }
        }

        $this->info("Se enviaron notificaciones a {$count} usuarios que no marcaron salida.");

        return 0;
    }
}
