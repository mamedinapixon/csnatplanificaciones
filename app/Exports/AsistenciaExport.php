<?php

namespace App\Exports;

use App\Models\Asistencia;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Carbon\Carbon;

class AsistenciaExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    public $asistencias;

    public function __construct($asistencias) {
        $this->asistencias = $asistencias;
    }

    public function headings(): array
    {
        return [
            'Docente',
            'Fecha',
            'Ingreso',
            'Salida',
            'Tiempo',
            'Ubicación',
            'Detalle ubicación',
            'Motivo',
        ];
    }

    public function collection()
    {
        $asistencias = DB::table('asistencias')
        ->whereIn('asistencias.id', $this->asistencias)
        ->join('users', 'users.id', '=', 'asistencias.user_id')
        ->join('ubicaciones', 'ubicaciones.id', '=', 'asistencias.ubicacion_id')
            ->select(
                'asistencias.id',
                'users.name as docente',
                'asistencias.ingreso_at as ingreso',
                'asistencias.salida_at as salida',
                'ubicaciones.descripcion as ubicación',
                'asistencias.otra_ubicacion',
                'asistencias.observacion',
            )
            ->orderBy('asistencias.id')
            ->get();

        return $asistencias->map(function ($asistencia) {
            $tiempo = null;
            $ingresoDate = Carbon::parse($asistencia->ingreso);
            $salidaDate = $asistencia->salida ? Carbon::parse($asistencia->salida) : null;

            if ($salidaDate) {
                $diferencia = $ingresoDate->diff($salidaDate);
                $tiempo = sprintf('%02d horas %02d min', $diferencia->h, $diferencia->i);
            }

            $observacion = $asistencia->observacion;
            if (strlen($observacion) > 15) {
                $observacion = substr($observacion, 0, 15) . '...';
            }

            return (object) [
                'docente' => $asistencia->docente,
                'fecha' => $ingresoDate->format('d/m/y'),
                'ingreso' => $ingresoDate->format('H:i'),
                'salida' => $salidaDate ? $salidaDate->format('H:i') : null,
                'tiempo' => $tiempo,
                'ubicación' => $asistencia->ubicación,
                'otra_ubicacion' => $asistencia->otra_ubicacion,
                'observacion' => $observacion,
            ];
        });
    }
}
