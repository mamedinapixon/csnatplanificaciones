<?php

namespace App\Http\Livewire\LibroTema;

use Filament\Tables;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Illuminate\Database\Eloquent\Builder;
use App\Models\LibroTema;
use Filament\Forms;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\EditAction;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Card;
use Filament\Tables\Filters\Filter;
use Illuminate\Support\Facades\DB;
use Filament\Tables\Filters\Layout;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Models\Planificacion;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Auth; // Import Auth facade

class HistorialLibroTema extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;

    protected function getTableQuery(): Builder
    {
        return LibroTema::query()
            ->with(['planificaciones.materiaPlanEstudio', 'caracteres', 'modalidades', 'user']) // Eager load user
            ->orderBy('fecha','desc');
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('fecha')
                ->label('Fecha')
                ->sortable()
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
                ->label('Caracter')
                ->getStateUsing(function ($record): array {
                    return $record->caracteres->pluck('nombre')->toArray();
                })
                ->separator(', '),
            Tables\Columns\TagsColumn::make('modalidades')
                ->label('Modalidad')
                ->getStateUsing(function ($record): array {
                    return $record->modalidades->pluck('nombre')->toArray();
                })
                ->separator(', '),
            Tables\Columns\TextColumn::make('contenido')
                ->html()
                ->wrap(),
            Tables\Columns\TagsColumn::make('aulas')
                ->label('Aula')
                ->getStateUsing(function ($record): array {
                    return $record->aulas->pluck('nombre')->toArray();
                })
                ->separator(', '),
            Tables\Columns\TextColumn::make('cantidad_alumnos')
                ->label('Cant. alumnos')
                ->sortable(),
            Tables\Columns\TextColumn::make('observaciones')
                ->html()
                ->wrap(),
            Tables\Columns\TextColumn::make('user.name') // Display user's name
                ->label('Creado por')
                ->sortable()
                ->searchable(),
        ];
    }

    protected function getTableActions(): array
    {
        return [
            EditAction::make()
                ->label('Editar')
                ->modalHeading('Editar Libro de Tema')
                // Show if user created it OR if user has the 'gestor' role
                ->visible(fn (LibroTema $record): bool => $record->user_id === Auth::id() || Auth::user()->hasRole('gestor'))
                ->form(function (LibroTema $record) {
                    // Reusing form schema logic similar to CargarLibroTema
                    return [
                        Card::make()
                            ->schema([
                                DatePicker::make('fecha')
                                    ->label('Fecha de la clase')
                                    ->displayFormat('d/m/Y')
                                    ->reactive()
                                    ->required(),
                                Select::make('planificaciones')
                                    ->label('Materia dictada')
                                    ->relationship('planificaciones', 'id', function (Builder $query, callable $get) use ($record) {
                                        $currentDate = $get('fecha') ?? $record->fecha; // Use existing or form date
                                        if ($currentDate) {
                                            $anio_academico = Carbon::parse($currentDate)->year;
                                            return $query->whereHas('periodoLectivo', function ($query) use ($anio_academico) {
                                                                    $query->whereIn('anio_academico', [$anio_academico-1, $anio_academico]);
                                                                })
                                                                ->distinct()
                                                                ->with(['materiaPlanEstudio.carrera', 'materiaPlanEstudio.materia']);
                                        }
                                        return $query->whereRaw('1 = 0'); // Return an empty query if no date is selected
                                    })
                                    ->getOptionLabelFromRecordUsing(function (Model $record): string {
                                        $carrera = $record->materiaPlanEstudio->carrera->codigo_siu ?? '';
                                        if(empty($record->electiva_nombre))
                                        {
                                            $materia = $record->materiaPlanEstudio->materia->nombre ?? '';
                                        } else {
                                            $materia = $record->electiva_nombre ?? '';
                                        }
                                        return $carrera . ': ' . $materia;
                                    })
                                    ->getSearchResultsUsing(function (string $search, callable $get) use ($record) {
                                        $currentDate = $get('fecha') ?? $record->fecha;
                                        $query = Planificacion::query();
                                        if ($currentDate) {
                                            $anio_academico = Carbon::parse($currentDate)->year;
                                            $query->whereHas('periodoLectivo', function ($query) use ($anio_academico) {
                                                    $query->whereIn('anio_academico', [$anio_academico-1, $anio_academico]);
                                                })
                                                ->distinct()
                                                ->with(['materiaPlanEstudio.carrera', 'materiaPlanEstudio.materia']);
                                        }
                                        $results = $query
                                            ->where(function ($query) use ($search) {
                                                $query->whereHas('materiaPlanEstudio.carrera', function ($query) use ($search) {
                                                    $query->where('codigo_siu', 'like', "%{$search}%");
                                            })
                                                ->orWhereHas('materiaPlanEstudio.materia', function ($query) use ($search) {
                                                    $query->where('nombre', 'like', "%{$search}%");
                                                })
                                                ->orWhere('electiva_nombre', 'like', "%{$search}%");
                                            })
                                            ->get()
                                            ->mapWithKeys(function ($record) {
                                                $carrera = $record->materiaPlanEstudio->carrera->codigo_siu ?? '';
                                                if(empty($record->electiva_nombre))
                                                {
                                                    $materia = $record->materiaPlanEstudio->materia->nombre ?? '';
                                                } else {
                                                    $materia = $record->electiva_nombre ?? '';
                                                }
                                                $label = $carrera . ': ' . $materia;
                                                return [$record->id => $label];
                                            })
                                            ->toArray();
                                        return $results;
                                    })
                                    ->searchable()
                                    ->multiple()
                                    ->preload() // Preload for edit might be better
                                    ->columnSpanFull()
                                    ->required(),
                                Select::make('docentes')
                                    ->label('Docente/s que participan de la clase')
                                    ->multiple()
                                    ->searchable()
                                    ->relationship('docentes', 'full_name', fn (Builder $query) => $query->where('activo', 1)->orderBy('full_name'))
                                    ->preload() // Preload for edit
                                    ->columnSpanFull()
                                    ->searchable(),
                                Select::make('modalidades')
                                    ->label('Modalidad')
                                    ->multiple()
                                    ->searchable()
                                    ->relationship('modalidades', 'nombre')
                                    ->preload()
                                    ->searchable(),
                                Select::make('caracteres')
                                    ->label('Carácter de la clase')
                                    ->multiple()
                                    ->searchable()
                                    ->relationship('caracteres', 'nombre')
                                    ->preload()
                                    ->searchable(),
                                Select::make('aulas')
                                    ->label('Aula')
                                    ->multiple()
                                    ->searchable()
                                    ->relationship('aulas', 'nombre')
                                    ->preload()
                                    ->searchable(),
                                TextInput::make('cantidad_alumnos')
                                    ->label('Cantidad aproximada de alumnos')
                                    ->numeric()
                                    ->minValue(0)
                                    ->required(),
                                RichEditor::make('contenido')
                                    ->label('Contenidos dictados')
                                    ->toolbarButtons([
                                        'blockquote', 'bold', 'bulletList', 'italic', 'link',
                                        'orderedList', 'redo', 'strike', 'underline', 'undo',
                                    ])
                                    ->columnSpanFull()
                                    ->required(),
                                RichEditor::make('observaciones')
                                    ->label('Observaciones')
                                    ->toolbarButtons([
                                        'blockquote', 'bold', 'bulletList', 'italic', 'link',
                                        'orderedList', 'redo', 'strike', 'underline', 'undo',
                                    ])
                                    ->columnSpanFull(),
                            ])
                            ->columns(2)
                    ];
                })
                ->using(function (Model $record, array $data): Model {
                    $record->update($data);
                    // Sync relationships - Filament handles this automatically if relationship names match form field names
                    // But we need to ensure the keys are correct ('planificaciones', 'docentes', etc.)
                    // Filament's EditAction should handle relationship syncing if the names match.
                    // If issues arise, manual syncing might be needed here.
                    return $record;
                })
                ->successNotification(
                    Notification::make()
                        ->success()
                        ->title('Libro de tema actualizado')
                        ->body('El libro de tema ha sido actualizado correctamente.'),
                )
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

    protected function getTableFiltersLayout(): ?string
    {
        return Layout::AboveContent;
    }

    protected function shouldPersistTableFiltersInSession(): bool
    {
        return true;
    }

    public function render(): view
    {
        return view('livewire.libro-tema.historial-libro-tema');
    }
}
