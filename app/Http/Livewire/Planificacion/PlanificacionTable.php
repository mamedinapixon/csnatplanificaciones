<?php

namespace App\Http\Livewire\Planificacion;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

use Rappasoft\LaravelLivewireTables\Views\Filters\MultiSelectFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;

use App\Models\Planificacion;
use App\Models\PeriodoLectivo;
use App\Models\Carrera;

use Illuminate\Support\Facades\Auth;

class PlanificacionTable extends DataTableComponent
{
    //protected $model = Planificacion::class;
    private $todos = ['' => 'Todos'];
    private $carreras = [];
    protected $listeners = ['cambiarAnioAcademico'];
    protected $queryString = ['anio_academico_id'];
    private $anioAcademicos = null;
    private $anio_academico_id = 0;

    public function mount()
    {
        //dd($this->anio_academico_id);
        //$this->setFilter('anio_academico_id', '2022');
    }

    public function configure(): void
    {

        $this->setQueryStringEnabled();
        $this->setPrimaryKey('id')
            ->setTableRowUrl(function($row) {
                return route('planificacion.show', $row);
            });
    }

    public function cambiarAnioAcademico($anio_academico_id)
    {
        $this->anio_academico_id = $anio_academico_id;
        $this->setFilter('anio_academico_id', $anio_academico_id);
        //$this->emit('setFilter', 'anio_academico_id', $anio_academico_id);

        //$this->emit('refreshDatatable');
        //dd($anio_academico_id);
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

            $this->anioAcademicos = PeriodoLectivo::distinct()->select('anio_academico')->orderBy('anio_academico', 'desc')->get();
            if(!empty($this->anioAcademicos))
            {
                if($this->anio_academico_id == 0) $this->anio_academico_id = $this->anioAcademicos[0]->anio_academico;
            }
            $planificacion = Planificacion::query()
                            /*->whereHas('periodoLectivo', function ($query) {
                                return $query->where('anio_academico', '=', $this->anio_academico_id);
                            })*/
                            ->with("materiaPlanEstudio.materia","materiaPlanEstudio.carrera","docenteCargo","periodoLectivo","periodoLectivo.periodoAcademico","estado");
        } else {
            $planificacion = Planificacion::query()
                            ->where("user_id","=",Auth::user()->id)
                            ->with("materiaPlanEstudio.materia","materiaPlanEstudio.carrera","docenteCargo","periodoLectivo","periodoLectivo.periodoAcademico","estado");
        }

        /*$this->carreras = Carrera::query()
                        ->orderBy('nombre_reducido')
                        ->get()
                        ->keyBy('id')
                        ->map(fn($carrera) => $carrera->nombre_reducido)
                        ->toArray();*/


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
                    fn($value, $row, Column $column) => $row->estado_id == 2 ? '<div class="gap-2 text-white badge badge-info">'.$row->estado->nombre.'</div>' : ($row->estado_id == 3 ? '<div class="gap-2 text-white badge badge-success">'.$row->estado->nombre.'</div>' : ($row->estado_id == 4 ? '<div class="gap-2 text-white badge badge-error">'.$row->estado->nombre.'</div>' :'<div class="gap-2 text-white badge">'.$row->estado->nombre.'</div>'))
                )
                ->html(),
        ];
    }

    public function filters(): array
    {
        return [
            /*
            MultiSelectFilter::make('Periodo Lectivo', 'periodo_lectivo_id')
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
            ->filter(function(Builder $builder, array $values) {
                //if ($value > 0) {
                //    $builder->where('planificacions.periodo_lectivo_id', $value);
                //}
                $builder->whereHas('planificacions', fn($query) => $query->whereIn('planificacions.periodo_lectivo_id', $values));
            }),*/
            SelectFilter::make('Año Academico', 'anio_academico_id')
            //->hiddenFromMenus()
            //->hiddenFromPills()
            ->hiddenFromFilterCount()
            ->notResetByClearButton()
            ->options(
                $this->todos +
                PeriodoLectivo::distinct()
                                ->select('anio_academico')
                                ->orderBy('anio_academico', 'desc')
                                ->get()
                                ->keyBy('anio_academico')
                                ->map(fn($periodoLectivo) => $periodoLectivo->anio_academico)
                                ->toArray(),
                /*PeriodoLectivo::query()
                        ->with('periodoAcademico')
                        ->get()
                        ->keyBy('id')
                        ->map(fn($periodoLectivo) => $periodoLectivo->anio_academico.' '.$periodoLectivo->periodoAcademico->nombre)
                        ->toArray(),*/
            )
            ->filter(function(Builder $builder, string $value) {
                if ($value > 0) {
                    //$builder->whereRelation('materiaPlanEstudio', 'carrera_id', $value);
                    $this->anio_academico_id = $value;
                    $builder->whereHas('periodoLectivo', function ($query) {
                                return $query->where('anio_academico', '=', $this->anio_academico_id);
                            });
                }
            }),
            SelectFilter::make('Periodo Lectivo', 'periodo_lectivo_id')
            ->options(
                $this->todos +
                PeriodoLectivo::query()
                        ->where('anio_academico', '=', $this->anio_academico_id)
                        ->with('periodoAcademico')
                        ->get()
                        ->keyBy('id')
                        ->map(fn($periodoLectivo) => $periodoLectivo->anio_academico.' '.$periodoLectivo->periodoAcademico->nombre)
                        ->toArray(),
            )
            ->filter(function(Builder $builder, string $value) {
                if ($value > 0) {
                    //$builder->whereRelation('materiaPlanEstudio', 'carrera_id', $value);
                    $builder->where('periodo_lectivo_id', $value);
                    //$builder->whereHas('planificacions', fn($query) => $query->whereIn('planificacions.periodo_lectivo_id', $values));
                }
            }),
            SelectFilter::make('Carrera', 'carrera_id')
            ->options(
                $this->todos +
                Carrera::query()
                        ->orderBy('nombre_reducido')
                        ->get()
                        ->keyBy('id')
                        ->map(fn($carrera) => $carrera->nombre_reducido)
                        ->toArray(),
            )
            ->filter(function(Builder $builder, string $value) {
                if ($value > 0) {
                    $builder->whereRelation('materiaPlanEstudio', 'carrera_id', $value);
                }
            }),
            SelectFilter::make('Estado', 'estado')
            ->options([
                '' => 'Todos',
                '1' => 'Editando',
                '2' => 'Presentado',
                '3' => 'Aprobado',
                '4' => 'Observado'
            ])
            ->filter(function(Builder $builder, string $value) {
                if ($value > 0) {
                    $builder->where('planificacions.estado_id', $value);
                }
            }),
        ];
    }

}
