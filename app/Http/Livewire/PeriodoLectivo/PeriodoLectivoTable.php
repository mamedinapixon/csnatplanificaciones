<?php

namespace App\Http\Livewire\PeriodoLectivo;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\PeriodoLectivo;
use Illuminate\Support\Facades\Auth;

class PeriodoLectivoTable extends DataTableComponent
{
    protected $model = PeriodoLectivo::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        if(Auth::user()->can('editar periodos lectivos'))
        {
            $this->setTableRowUrl(function($row) {
                return route('periodoLectivo.edit', $row);
            });
        }
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Anio academico", "anio_academico")
                ->sortable(),
            Column::make("Periodo academico", "periodo_academico_id")
                ->eagerLoadRelations()
                ->format(
                    fn($value, $row, Column $column) => $row->periodoAcademico->nombre
                )
                ->sortable(),
            Column::make("Inicio planificaciones", "fecha_inicio_carga_planificaciones")
                ->format(
                    fn($value, $row, Column $column) => optional($row->fecha_inicio_carga_planificaciones)->format('d/m/Y')
                )
                ->sortable(),
            Column::make("Fin planificaciones", "fecha_fin_carga_planificaciones")
                ->format(
                    fn($value, $row, Column $column) => optional($row->fecha_fin_carga_planificaciones)->format('d/m/Y')
                )
                ->sortable(),
            Column::make("Inicio memorias", "fecha_inicio_carga_memorias")
                ->format(
                    fn($value, $row, Column $column) => optional($row->fecha_inicio_carga_memorias)->format('d/m/Y')
                )
                ->sortable(),
            Column::make("Fin memorias", "fecha_fin_carga_memorias")
                ->format(
                    fn($value, $row, Column $column) => optional($row->fecha_fin_carga_memorias)->format('d/m/Y')
                )
                ->sortable(),
        ];
    }
}
