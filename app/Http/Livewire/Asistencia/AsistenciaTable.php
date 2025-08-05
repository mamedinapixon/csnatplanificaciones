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
use App\Exports\AsistenciaExport;
use Maatwebsite\Excel\Facades\Excel;


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

        //dd(Asistencia::whereIn('id', [2451,2402,2171,2133])->with("user:id","ubicacion")->orderBy('id', 'desc')->get());

        if(Auth::check() && Auth::user()->can('ver historial asistencia'))
        {
            $asistencia = Asistencia::query()
                            ->with("user","ubicacion")->orderBy('id', 'desc');
        } else {
            $asistencia = Asistencia::query()
                            ->where("user_id","=",Auth::user()->id)
                            ->with("user","ubicacion")->orderBy('id', 'desc');
            $this->setFiltersVisibilityDisabled();
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
            Column::make("Fecha", "ingreso_at")
                ->format(
                    fn($value, $row, Column $column) => $row->ingreso_at->format('d/m/Y')
                )
                ->sortable(),
            Column::make("Ingreso", "ingreso_at")
                ->format(
                    fn($value, $row, Column $column) => $row->ingreso_at->toTimeString()
                )
                ->sortable(),
            Column::make("Salida", "salida_at")
                ->format(
                    fn($value, $row, Column $column) => $row->salida_at == null ? "" : Carbon::parse($row->salida_at)->toTimeString()
                )
                ->sortable(),
            Column::make("Tiempo", "salida_at")
                ->format(
                    fn($value, $row, Column $column) => $row->salida_at == null ? "" : str_replace("después","",Carbon::parse($row->salida_at)
                            ->diffForHumans($row->ingreso_at, [
                                'parts' => 2,
                            ]))
                ),
            Column::make("Ubicación", "ubicacion.descripcion")
                ->sortable(),
            Column::make("Otra ubicacion", "otra_ubicacion")
                ->sortable(),
            Column::make("Motivo", "observacion")
                ->sortable(),
            Column::make("Controlado", "control_realizado")
                ->format(
                    fn($value, $row, Column $column) => $value ? 'Sí' : 'No'
                )
                ->sortable()
                ->hideIf(Auth::check() && !Auth::user()->can('controlar asistencia')),
            Column::make("Acciones")
                ->label(
                    fn($row, Column $column) => Auth::check() && Auth::user()->can('controlar asistencia') ? '<a href="' . route('asistencia.control', $row->id) . '" class="btn btn-sm btn-primary">Controlar Asistencia</a>' : ''
                )
                ->html(),
        ];
    }

    public function filters(): array
    {
        $filters = [
            SelectFilter::make('Docentes', 'user_id')
            ->options(
                $this->todos +
                Asistencia::query()
                        ->select('asistencias.user_id','users.name')
                        ->distinct()
                        ->join('users','users.id','asistencias.user_id')
                        ->orderBy('users.name')
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

        if (Auth::check() && Auth::user()->can('controlar asistencia')) {
            $filters[] = SelectFilter::make('Controlado', 'control_realizado')
                ->options([
                    '' => 'Todos',
                    '1' => 'Sí',
                    '0' => 'No',
                ])
                ->filter(function(Builder $builder, string $value) {
                    if ($value !== '') {
                        $builder->where('control_realizado', (bool)$value);
                    }
                });
        }

        return $filters;
    }

    public function bulkActions(): array
    {
        return [
            'ExportToExcel' => 'Exportar a Excel',
            'ExportToCSV' => 'Exportar a CSV',
            'ExportToPDF' => 'Exportar a PDF',
        ];
    }

    public function ExportToExcel()
    {
        $asistencias = $this->getSelected();

        $this->clearSelected();

        return Excel::download(new AsistenciaExport($asistencias), 'asistencias.xlsx', \Maatwebsite\Excel\Excel::XLSX);
    }

    public function ExportToCSV()
    {
        $asistencias = $this->getSelected();

        $this->clearSelected();

        return Excel::download(new AsistenciaExport($asistencias), 'asistencias.csv', \Maatwebsite\Excel\Excel::CSV);
    }

    public function ExportToPDF()
    {
        $asistencias = $this->getSelected();

        $this->clearSelected();

        return Excel::download(new AsistenciaExport($asistencias), 'asistencias.pdf', \Maatwebsite\Excel\Excel::MPDF);
    }
}
