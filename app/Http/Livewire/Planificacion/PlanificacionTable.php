<?php

namespace App\Http\Livewire\Planificacion;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;

use App\Models\Planificacion;
use App\Models\PeriodoLectivo;
use App\Models\Carrera;

use Illuminate\Support\Facades\Auth;

class PlanificacionTable extends DataTableComponent
{
    //protected $model = Planificacion::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setTableRowUrl(function($row) {
                return route('planificacion.show', $row);
            });
    }

    public function builder(): Builder
    {

        /*
        if(Auth::user()->hasRole(['gestor','admin']))
        {
            $planificacion = Planificacion::query()
                            ->with("materiaPlanEstudio.materia","materiaPlanEstudio.carrera","docenteCargo","periodoLectivo","periodoLectivo.periodoAcademico","estado");
        } else {
            $planificacion = Planificacion::query()
                            ->where("user_id","=",Auth::user()->id)
                            ->with("materiaPlanEstudio.materia","materiaPlanEstudio.carrera","docenteCargo","periodoLectivo","periodoLectivo.periodoAcademico","estado");
        }
        */

        if(Auth::user()->can('ver planificaciones'))
        {
            $planificacion = Planificacion::query()
                            ->with("materiaPlanEstudio.materia","materiaPlanEstudio.carrera","docenteCargo","periodoLectivo","periodoLectivo.periodoAcademico","estado");
        } else {
            $planificacion = Planificacion::query()
                            ->where("user_id","=",Auth::user()->id)
                            ->with("materiaPlanEstudio.materia","materiaPlanEstudio.carrera","docenteCargo","periodoLectivo","periodoLectivo.periodoAcademico","estado");
        }


        return $planificacion;
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")->sortable(),
            Column::make('Periodo Lectivo', 'periodo_lectivo_id')
                ->eagerLoadRelations()
                ->format(
                    fn($value, $row, Column $column) => $row->periodoLectivo->anio_academico . ' ' . $row->periodoLectivo->periodoAcademico->nombre
                )
                ->sortable(),
            Column::make("Carrera", "materiaPlanEstudio.carrera.nombre_reducido")->sortable(),
            Column::make("Asignatura", "materiaPlanEstudio.materia.nombre")->searchable()->sortable(),
            Column::make("Presentado", "presentado_at")
                ->format(
                    fn($value, $row, Column $column) => $row->presentado_at == null ? '' : \Carbon\Carbon::parse($row->presentado_at)->diffForHumans()
                )
                ->sortable(),
            Column::make('Estado', 'estado_id')
                ->format(
                    fn($value, $row, Column $column) => $row->estado_id == 2 ? '<div class="gap-2 text-white badge badge-info">'.$row->estado->nombre.'</div>' : ($row->estado_id == 3 ? '<div class="gap-2 text-white badge badge-success">'.$row->estado->nombre.'</div>' : '<div class="gap-2 text-white badge">'.$row->estado->nombre.'</div>')
                )
                ->html(),
        ];
    }

    public function filters(): array
    {
        return [

            SelectFilter::make('Periodo Lectivo', 'periodo_lectivo_id')
            ->options(
                array_merge([0 => 'Todos'],
                PeriodoLectivo::query()
                    ->orderBy('anio_academico')
                    ->with('periodoAcademico')
                    ->get()
                    ->keyBy('id')
                    ->map(fn($periodoLectivo) => $periodoLectivo->anio_academico.' '.$periodoLectivo->periodoAcademico->nombre)
                    ->toArray()
                )
            )
            ->filter(function(Builder $builder, string $value) {
                if ($value > 0) {
                    $builder->where('planificacions.periodo_lectivo_id', $value);
                }
            }),
            SelectFilter::make('Carrera', 'carrera_id')
            ->options(
                array_merge([0 => 'Todos'],
                    Carrera::query()
                        ->orderBy('nombre_reducido')
                        ->get()
                        ->keyBy('id')
                        ->map(fn($carrera) => $carrera->nombre_reducido)
                        ->toArray()
                )
            )
            ->filter(function(Builder $builder, string $value) {
                if ($value > 0) {
                    $builder->whereRelation('materiaPlanEstudio', 'carrera_id', $value);
                }
            }),
            SelectFilter::make('Estado', 'estado')
            ->options([
                '' => 'Todos',
                '1' => 'Iniciado',
                '2' => 'Presentado',
                '3' => 'Revisado'
            ])
            ->filter(function(Builder $builder, string $value) {
                if ($value > 0) {
                    $builder->where('planificacions.estado_id', $value);
                }
            }),
        ];
    }

}
