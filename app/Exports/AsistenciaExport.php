<?php

namespace App\Exports;

use App\Models\Asistencia;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AsistenciaExport implements FromCollection, WithHeadings
{
    public $asistencias;

    public function __construct($asistencias) {
        $this->asistencias = $asistencias;
    }

    public function headings(): array
    {
        return [
            '#',
            'Docente',
            'Ingreso',
            'Salida',
            'Ubicación',
            'Detalle ubicación'
        ];
    }

    public function collection()
    {
        //return Asistencia::whereIn('id', $this->asistencias)->with("user","ubicacion")->orderBy('id', 'desc')->get();
        return DB::table('asistencias')
        ->whereIn('asistencias.id', $this->asistencias)
        ->join('users', 'users.id', '=', 'asistencias.user_id')
        ->join('ubicaciones', 'ubicaciones.id', '=', 'asistencias.ubicacion_id')
        ->select('asistencias.id', 'users.name as docente', 'asistencias.ingreso_at as ingreso', 'asistencias.salida_at as salida','ubicaciones.descripcion as ubicación','asistencias.otra_ubicacion')
        ->orderBy('asistencias.id')
        ->get();
    }
}
