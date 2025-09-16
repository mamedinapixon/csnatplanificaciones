<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

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
        $fechaAyer = \Carbon\Carbon::yesterday();
        $this->info("Generando informe de asistencia para la fecha: " . $fechaAyer->format('d-m-Y'));

        $asistencias = \App\Models\Asistencia::whereDate('fecha_at', $fechaAyer)
            ->with(['user', 'ubicacion'])
            ->get();

        if ($asistencias->isEmpty()) {
            $this->info("No se encontraron registros de asistencia para la fecha " . $fechaAyer->format('d-m-Y') . ". No se generará el PDF.");
            return 0;
        }

        // Preparar datos para la vista
        $datosInforme = $asistencias->map(function ($asistencia) {
            $ubicacionTexto = optional($asistencia->ubicacion)->nombre ?? 'Desconocida';
            if (!empty($asistencia->otra_ubicacion)) {
                $ubicacionTexto .= ' (' . $asistencia->otra_ubicacion . ')';
            }

            return [
                'apellido_nombre' => optional($asistencia->user)->apellido . ' ' . optional($asistencia->user)->name,
                'hora_ingreso' => optional($asistencia->ingreso_at)->format('H:i'),
                'hora_salida' => optional($asistencia->salida_at)->format('H:i'),
                'ubicacion' => $ubicacionTexto,
                'controlado' => $asistencia->control_realizado ? 'Sí' : 'No',
                'resultado_control' => $asistencia->control_realizado ? ($asistencia->control_resultado ? 'Aprobado' : 'Rechazado') : 'N/A',
            ];
        });

        // Generar el PDF
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('informes.asistencia_diaria', [
            'fecha' => $fechaAyer->format('d/m/Y'),
            'asistencias' => $datosInforme,
        ]);

        // Definir la ruta de guardado
        $anio = $fechaAyer->year;
        $mesNombre = strtolower($fechaAyer->locale('es')->monthName); // Nombre del mes en español
        $dia = $fechaAyer->day;

        $rutaCarpeta = "informes_asistencia/{$anio}/{$mesNombre}";
        $nombreArchivo = "asistencia_{$dia}_{$fechaAyer->format('m')}_{$anio}.pdf";
        $rutaCompleta = "{$rutaCarpeta}/{$nombreArchivo}";

        // Guardar el PDF
        \Illuminate\Support\Facades\Storage::put($rutaCompleta, $pdf->output());

        $this->info("Informe de asistencia diario generado y guardado en: " . $rutaCompleta);
        return 0;
    }
}
