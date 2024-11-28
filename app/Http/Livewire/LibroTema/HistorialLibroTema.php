<?php

namespace App\Http\Livewire\LibroTema;

use Filament\Tables;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Illuminate\Database\Eloquent\Builder;
use App\Models\LibroTema;
use Filament\Forms;
use Filament\Tables\Filters\Filter;
use Illuminate\Support\Facades\DB;

class HistorialLibroTema extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;

    protected function getTableQuery(): Builder
    {
        return LibroTema::query()->with('planificaciones.materiaPlanEstudio', 'caracteres', 'modalidades')->orderBy('id','desc');
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('fecha')
                ->label('Fecha')
                ->date(),
            Tables\Columns\TagsColumn::make('planificaciones')
                ->label('Materia/s')
                ->getStateUsing(function ($record): array {
                    return $record->planificaciones->map(function ($planificacion) {
                        $carreraNombre = $planificacion->materiaPlanEstudio->carrera->codigo_siu ?? '';
                        if(empty($planificacion->electiva_nombre))
                        {
                            $materiaNombre = $planificacion->materiaPlanEstudio->materia->nombre ?? '';
                        } else {
                            $materiaNombre = $planificacion->electiva_nombre ?? '';
                        }
                        return $carreraNombre . ': ' . $materiaNombre;
                    })->toArray();
                })
                ->separator(', '),
                Tables\Columns\TagsColumn::make('docentes')
                    ->label('Docentes')
                    ->getStateUsing(function ($record): array {
                        return $record->docentes->map(function ($docente) {
                            return $docente->apellido . ' ' . $docente->nombre;
                        })->toArray();
                    })
                    ->separator(', '),
            Tables\Columns\TagsColumn::make('caracteres')
                ->label('Caracter de la clase')
                ->getStateUsing(function ($record): array {
                    return $record->caracteres->pluck('nombre')->toArray();
                })
                ->separator(', '),
            Tables\Columns\TagsColumn::make('modalidades')
                ->label('Modalidad de la clase')
                ->getStateUsing(function ($record): array {
                    return $record->modalidades->pluck('nombre')->toArray();
                })
                ->separator(', '),
            Tables\Columns\TextColumn::make('contenido')
                ->html(),
            Tables\Columns\TextColumn::make('cantidad_alumnos')
                ->label('Cantidad de alumnos'),
            Tables\Columns\TextColumn::make('observaciones')
                ->html(),
        ];
    }

    protected function getTableFilters(): array
    {
        return [
            Filter::make('carrera')
                ->form([
                    Forms\Components\Select::make('carrera_id')
                        ->label('Carrera')
                        ->options(function () {
                            return DB::table('planificacion_libro_tema')
                                ->join('planificacions', 'planificacions.id', '=', 'planificacion_libro_tema.planificacion_id')
                                ->join('materia_plan_estudios', 'materia_plan_estudios.id', '=', 'planificacions.materia_plan_estudio_id')
                                ->join('carreras', 'carreras.id', '=', 'materia_plan_estudios.carrera_id')
                                ->select('carreras.nombre', 'carreras.id', 'carreras.plan_anio')
                                ->distinct()
                                ->get()
                                ->mapWithKeys(function ($carrera) {
                                    return [$carrera->id => $carrera->nombre. ' ' . $carrera->plan_anio];
                                });
                        })
                        ->multiple()
                        ->searchable()
                ])
                ->query(function (Builder $query, array $data): Builder {
                    return $query->when(
                        $data['carrera_id'],
                        fn (Builder $query, $carreraId): Builder => $query->whereHas('planificaciones.materiaPlanEstudio.carrera', function ($query) use ($carreraId) {
                            $query->whereIn('id', $carreraId);
                        })
                    );
                }),

            Filter::make('materia')
                ->form([
                    Forms\Components\Select::make('materia_id')
                        ->label('Materia')
                        ->options(function () {
                return DB::table('planificacion_libro_tema')
                                ->join('planificacions', 'planificacions.id', '=', 'planificacion_libro_tema.planificacion_id')
                                ->join('materia_plan_estudios', 'materia_plan_estudios.id', '=', 'planificacions.materia_plan_estudio_id')
                                            ->join('materias', 'materia_plan_estudios.materia_id', '=', 'materias.id')
                                ->select(
                                    'materias.id',
                                    DB::raw('CASE
                                        WHEN materias.tipo_materia = "G" THEN planificacions.electiva_nombre
                                        ELSE materias.nombre
                                    END as nombre')
                                )
                                ->distinct()
                                ->get()
                                ->pluck('nombre', 'id');
                        })
                        ->multiple()
                        ->searchable()
                ])
                ->query(function (Builder $query, array $data): Builder {
                    return $query->when(
                        $data['materia_id'],
                        fn (Builder $query, $materiaId): Builder => $query->whereHas('planificaciones.materiaPlanEstudio.materia', function ($query) use ($materiaId) {
                            $query->whereIn('id', $materiaId);
                        })
                    );
                }),

            Filter::make('fecha')
                ->form([
                    Forms\Components\DatePicker::make('created_from')
                        ->label('Fecha desde'),
                    Forms\Components\DatePicker::make('created_until')
                        ->label('Fecha hasta'),
                ])
                ->query(function (Builder $query, array $data): Builder {
                    return $query
                        ->when(
                            $data['created_from'],
                            fn (Builder $query, $date): Builder => $query->whereDate('fecha', '>=', $date),
                        )
                        ->when(
                            $data['created_until'],
                            fn (Builder $query, $date): Builder => $query->whereDate('fecha', '<=', $date),
                        );
                }),

        Filter::make('docente')
            ->form([
                Forms\Components\Select::make('docente_id')
                    ->label('Docente')
                    ->options(function () {
                        return DB::table('docente_libro_tema')
                            ->join('docentes', 'docentes.id', '=', 'docente_libro_tema.docente_id')
                            ->select('docentes.id', DB::raw("CONCAT(docentes.apellido, ', ', docentes.nombre) as nombre_completo"))
                            ->distinct()
                            ->get()
                            ->pluck('nombre_completo', 'id');
                    })
                    ->multiple()
                    ->searchable()
            ])
            ->query(function (Builder $query, array $data): Builder {
                return $query->when(
                    $data['docente_id'],
                    fn (Builder $query, $docenteId): Builder => $query->whereHas('docentes', function ($query) use ($docenteId) {
                        $query->whereIn('docentes.id', $docenteId);
                    })
                );
            }),

            Filter::make('caracter')
                ->form([
                    Forms\Components\Select::make('caracter_id')
                        ->label('Caracter de la clase')
                        ->options(function () {
                            return DB::table('caracter_libro_tema')
                                ->join('caracter_clases', 'caracter_clases.id', '=', 'caracter_libro_tema.caracter_clase_id')
                                ->select('caracter_clases.id', 'caracter_clases.nombre')
                                ->distinct()
                                ->get()
                                ->pluck('nombre', 'id');
                        })
                        ->multiple()
                        ->searchable()
                ])
                ->query(function (Builder $query, array $data): Builder {
                    return $query->when(
                        $data['caracter_id'],
                        fn (Builder $query, $caracterId): Builder => $query->whereHas('caracteres', function ($query) use ($caracterId) {
                            $query->whereIn('caracter_clases.id', $caracterId);
                        })
                    );
                }),

            Filter::make('modalidad')
                ->form([
                    Forms\Components\Select::make('modalidad_id')
                        ->label('Modalidad de la clase')
                        ->options(function () {
                            return DB::table('modalidad_libro_tema')
                                ->join('modalidad_clases', 'modalidad_clases.id', '=', 'modalidad_libro_tema.modalidad_clase_id')
                                ->select('modalidad_clases.id', 'modalidad_clases.nombre')
                                ->distinct()
                                ->get()
                                ->pluck('nombre', 'id');
                        })
                        ->multiple()
                        ->searchable()
                ])
                ->query(function (Builder $query, array $data): Builder {
                    return $query->when(
                        $data['modalidad_id'],
                        fn (Builder $query, $modalidadId): Builder => $query->whereHas('modalidades', function ($query) use ($modalidadId) {
                            $query->whereIn('modalidad_clases.id', $modalidadId);
                        })
                    );
                }),
    ];
}
    public function render(): view
    {
        return view('livewire.libro-tema.historial-libro-tema');
    }
}
