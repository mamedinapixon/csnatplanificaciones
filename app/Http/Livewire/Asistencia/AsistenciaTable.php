<?php

namespace App\Http\Livewire\Asistencia;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\DateFilter;
use App\Models\Asistencia;
use App\Models\Ubicacion;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use \Carbon\Carbon;
use \Carbon\CarbonInterface;

class AsistenciaTable extends DataTableComponent
{
    protected $model = Asistencia::class;
    private $todos = ['' => 'Todos'];

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function builder(): Builder
    {

        if(Auth::user()->can('ver historial asistencia'))
        {
            $asistencia = Asistencia::query()
                            ->with("user","ubicacion")->orderBy('id', 'desc');
        } else {
            $asistencia = Asistencia::query()
                            ->where("user_id","=",Auth::user()->id)
                            ->with("user","ubicacion")->orderBy('id', 'desc');
        }

        return $asistencia;
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Docente", "user.name")
                ->searchable()
                ->sortable(),
            Column::make("Ingreso", "ingreso_at")
                ->format(
                    fn($value, $row, Column $column) => $row->ingreso_at->format('d/m/Y h:m:s')
                )
                ->sortable(),
            Column::make("Salida", "salida_at")
                ->format(
                    fn($value, $row, Column $column) => $row->salida_at == null ? "" : Carbon::parse($row->salida_at)->toTimeString()
                )
                ->sortable(),
            Column::make("Tiempo", "salida_at")
                ->format(
                    fn($value, $row, Column $column) => $row->salida_at == null ? "" : Carbon::parse($row->salida_at)->diffForHumans($row->ingreso_at, CarbonInterface::DIFF_ABSOLUTE)
                ),
            Column::make("Ubicación", "ubicacion.descripcion")
                ->sortable(),
            Column::make("Otra ubicacion", "otra_ubicacion")
                ->sortable(),
            Column::make("Motivo", "observacion")
                ->sortable(),
        ];
    }

    public function filters(): array
    {
        return [
            SelectFilter::make('Docentes', 'user_id')
            ->options(
                $this->todos +
                Asistencia::query()
                        ->select('asistencias.user_id','users.name')
                        ->distinct()
                        ->join('users','users.id','asistencias.user_id')
                        ->get()
                        ->keyBy('user_id')
                        ->map(fn($asistencia) => $asistencia->name)
                        ->toArray(),
            )
            ->filter(function(Builder $builder, string $value) {
                if ($value > 0) {
                    //$builder->whereRelation('materiaPlanEstudio', 'carrera_id', $value);
                    $builder->where('user_id', $value);
                }
            }),
            SelectFilter::make('Ubicaciones', 'ubicacion_id')
            ->options(
                $this->todos +
                Ubicacion::query()
                        ->select('id','descripcion')
                        ->get()
                        ->keyBy('id')
                        ->map(fn($ubicacion) => $ubicacion->descripcion)
                        ->toArray(),
            )
            ->filter(function(Builder $builder, string $value) {
                if ($value > 0) {
                    //$builder->whereRelation('materiaPlanEstudio', 'carrera_id', $value);
                    $builder->where('ubicacion_id', $value);
                }
            }),
            DateFilter::make('Fecha')
                ->filter(function(Builder $builder, string $value) {
                    $builder->where('fecha_at', '=', $value);
                }),
        ];
    }
}
