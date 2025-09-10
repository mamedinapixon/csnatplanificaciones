<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Asistencia;
use App\Models\User;
use App\Models\Ubicacion;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class GenerarInformeAsistenciaDiario extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'informe:asistencia-diario';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Genera un informe diario de asistencia en formato PDF.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        setlocale(LC_TIME, 'es_ES.UTF-8'); // Establecer la configuración regional a español
        $this->info('Generando informe diario de asistencia...');

        // Obtener la fecha del día anterior
        $fechaInforme = Carbon::now();

        // Obtener los datos de asistencia del día anterior
        $asistencias = Asistencia::with(['user', 'ubicacion'])
            ->whereDate('fecha_at', $fechaInforme)
            ->get();

        // Preparar los datos para la vista
        $datosInforme = [];
        foreach ($asistencias as $asistencia) {
            $ubicacionTexto = $asistencia->ubicacion ? $asistencia->ubicacion->nombre : 'Desconocida';
            if ($asistencia->otra_ubicacion) {
                $ubicacionTexto .= ' (' . $asistencia->otra_ubicacion . ')';
            }

            $controlTexto = $asistencia->control_realizado ? ($asistencia->control_resultado ? 'Sí (Aprobado)' : 'Sí (Rechazado)') : 'No';

            $datosInforme[] = [
                'apellido_nombre' => $asistencia->user ? $asistencia->user->apellido . ' ' . $asistencia->user->nombre : 'Usuario Desconocido',
                'hora_ingreso' => $asistencia->ingreso_at ? Carbon::parse($asistencia->ingreso_at)->format('H:i') : 'N/A',
                'hora_salida' => $asistencia->salida_at ? Carbon::parse($asistencia->salida_at)->format('H:i') : 'N/A',
                'ubicacion' => $ubicacionTexto,
                'control' => $controlTexto,
            ];
        }

        // Generar el PDF
        $pdf = Pdf::loadView('informes.asistencia_diaria', [
            'fecha' => $fechaInforme->format('d/m/Y'),
            'asistencias' => $datosInforme,
        ]);

        // Crear la ruta de guardado
        $anio = $fechaInforme->format('Y');
        $mes = $fechaInforme->formatLocalized('%B'); // Nombre del mes en español
        $dia = $fechaInforme->format('d');

        $rutaCarpeta = 'informes_asistencia/' . $anio . '/' . $mes;
        $nombreArchivo = 'asistencia_' . $dia . '_' . $fechaInforme->format('m') . '_' . $anio . '.pdf';
        $rutaCompleta = $cd . '/' . $nombreArchivo;

        // Guardar el PDF
        Storage::put($rutaCompleta, $pdf->output());

        $this->info('Informe diario de asistencia generado y guardado en: ' . $rutaCompleta);

        return Command::SUCCESS;
    }
}
