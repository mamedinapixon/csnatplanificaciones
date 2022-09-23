<?php

namespace App\Http\Livewire\PeriodoLectivo;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\PeriodoLectivo;

class PeriodoLectivoTable extends DataTableComponent
{
    protected $model = PeriodoLectivo::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setTableRowUrl(function($row) {
                return route('periodoLectivo.edit', $row);
            });
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
            Column::make("Fecha inicio", "fecha_inicio_activo")
                ->format(
                    fn($value, $row, Column $column) => $row->fecha_inicio_activo->format('d/m/Y')
                )
                ->sortable(),
            Column::make("Fecha cierre", "fecha_fin_activo")
                ->format(
                    fn($value, $row, Column $column) => $row->fecha_fin_activo->format('d/m/Y')
                )
                ->sortable(),
        ];
    }
}
