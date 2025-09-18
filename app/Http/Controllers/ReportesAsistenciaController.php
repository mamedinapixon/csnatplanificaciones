<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Importar Storage

class ReportesAsistenciaController extends Controller
{
    private $basePath = 'informes_asistencia';

    /**
     * Muestra una lista de años disponibles.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $years = Storage::directories($this->basePath);
        $years = array_map('basename', $years); // Obtener solo el nombre del directorio (año)
        rsort($years); // Ordenar años de forma descendente

        return view('reportes.asistencia.years', compact('years'));
    }

    /**
     * Muestra una lista de meses para un año específico.
     *
     * @param string $year
     * @return \Illuminate\View\View
     */
    public function showMonths(string $year)
    {
        $path = "{$this->basePath}/{$year}";
        if (!Storage::exists($path)) {
            abort(404, 'Año no encontrado.');
        }

        $months = Storage::directories($path);
        $months = array_map('basename', $months); // Obtener solo el nombre del directorio (mes)
        // Opcional: ordenar meses de forma lógica si se usan nombres de mes en español
        // Por ejemplo, si los nombres son 'enero', 'febrero', etc., se necesitaría un mapeo a números.
        // Para este caso, asumimos que el orden alfabético es suficiente o que se ordenarán en la vista.
        
        // Mapeo de nombres de meses a números para ordenar correctamente
        $monthOrder = [
            'enero' => 1, 'febrero' => 2, 'marzo' => 3, 'abril' => 4, 'Mayo' => 5, 'junio' => 6,
            'julio' => 7, 'agosto' => 8, 'septiembre' => 9, 'octubre' => 10, 'noviembre' => 11, 'diciembre' => 12
        ];

        usort($months, function($a, $b) use ($monthOrder) {
            return $monthOrder[strtolower($a)] <=> $monthOrder[strtolower($b)];
        });


        return view('reportes.asistencia.months', compact('year', 'months'));
    }

    /**
     * Muestra una lista de reportes PDF para un mes y año específicos.
     *
     * @param string $year
     * @param string $month
     * @return \Illuminate\View\View
     */
    public function showReports(string $year, string $month)
    {
        $path = "{$this->basePath}/{$year}/{$month}";
        if (!Storage::exists($path)) {
            abort(404, 'Mes o año no encontrado.');
        }

        $files = Storage::files($path);
        $reports = array_map('basename', $files); // Obtener solo el nombre del archivo

        return view('reportes.asistencia.reports', compact('year', 'month', 'reports'));
    }

    /**
     * Permite la descarga de un reporte PDF específico.
     *
     * @param string $year
     * @param string $month
     * @param string $filename
     * @return \Symfony\Component\HttpFoundation\StreamedResponse
     */
    public function downloadReport(string $year, string $month, string $filename)
    {
        $filePath = "{$this->basePath}/{$year}/{$month}/{$filename}";

        if (!Storage::exists($filePath)) {
            abort(404, 'Reporte no encontrado.');
        }

        return Storage::download($filePath, $filename);
    }
}
