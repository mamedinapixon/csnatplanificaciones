<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PlanificacionResource\Pages;
use App\Models\Planificacion;
use App\Models\PeriodoLectivo;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class PlanificacionResource extends Resource
{
    protected static ?string $model = Planificacion::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationLabel = 'Planificaciones';

    protected static ?string $modelLabel = 'planificación';

    protected static ?string $pluralModelLabel = 'planificaciones';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->label('Usuario')
                    ->relationship('user', 'name')
                    ->searchable()
                    ->required(),
                Forms\Components\Select::make('periodo_lectivo_id')
                    ->label('Período lectivo')
                    ->relationship('periodoLectivo', 'anio_academico')
                    ->getOptionLabelFromRecordUsing(fn ($record) => $record->full_periodo_lectivo ?? (string) $record->anio_academico)
                    ->searchable()
                    ->required(),
                Forms\Components\Select::make('materia_plan_estudio_id')
                    ->label('Materia (plan de estudio)')
                    ->relationship(
                        'materiaPlanEstudio',
                        'id',
                        fn ($query) => $query->with('materia')
                    )
                    ->getOptionLabelFromRecordUsing(fn ($record) => $record->materia?->nombre ?? "ID {$record->id}")
                    ->searchable()
                    ->preload(),
                Forms\Components\TextInput::make('electiva_nombre')
                    ->label('Electiva (nombre)')
                    ->maxLength(255),
                Forms\Components\Select::make('estado_id')
                    ->label('Estado')
                    ->relationship('estado', 'nombre')
                    ->searchable()
                    ->required(),
                Forms\Components\DateTimePicker::make('presentado_at')
                    ->label('Presentado el'),
                Forms\Components\DateTimePicker::make('revisado_at')
                    ->label('Revisado el'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Usuario')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('materiaPlanEstudio.materia.nombre')
                    ->label('Materia')
                    ->searchable(),
                Tables\Columns\TextColumn::make('electiva_nombre')
                    ->label('Electiva (nombre)')
                    ->limit(30)
                    ->tooltip(fn ($record) => $record->electiva_nombre)
                    ->searchable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('periodo_lectivo_id')
                    ->label('Período lectivo')
                    ->formatStateUsing(fn ($state, $record) => $record->periodoLectivo?->full_periodo_lectivo ?? '-')
                    ->sortable(),
                Tables\Columns\TextColumn::make('estado.nombre')
                    ->label('Estado')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('presentado_at')
                    ->label('Presentado')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('revisado_at')
                    ->label('Revisado')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('anio_academico')
                    ->label('Año académico')
                    ->options(fn () => PeriodoLectivo::query()
                        ->orderByDesc('anio_academico')
                        ->pluck('anio_academico', 'anio_academico')
                        ->toArray()
                    )
                    ->default(fn () => now()->year)
                    ->query(function ($query, array $data) {
                        $anio = $data['value'] ?? null;
                        return $query->when($anio, function ($query) use ($anio) {
                            $query->whereHas('periodoLectivo', function ($subQuery) use ($anio) {
                                $subQuery->where('anio_academico', $anio);
                            });
                        });
                    }),
                Tables\Filters\SelectFilter::make('user_id')
                    ->label('Usuario')
                    ->relationship('user', 'name')
                    ->searchable(),
                Tables\Filters\SelectFilter::make('periodo_lectivo_id')
                    ->label('Período lectivo')
                    ->options(fn () => PeriodoLectivo::query()
                        ->with('periodoAcademico')
                        ->get()
                        ->pluck('full_periodo_lectivo', 'id')
                        ->toArray()
                    ),
                Tables\Filters\SelectFilter::make('estado_id')
                    ->label('Estado')
                    ->relationship('estado', 'nombre'),
            ])
            ->actions([
                Tables\Actions\Action::make('ver')
                    ->label('Ver planificación')
                    ->url(fn (Planificacion $record) => url("/planificacion/{$record->id}"))
                    ->icon('heroicon-o-eye')
                    ->openUrlInNewTab(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ])
            ->defaultSort('id', 'desc');
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPlanificaciones::route('/'),
            'create' => Pages\CreatePlanificacion::route('/create'),
            'edit' => Pages\EditPlanificacion::route('/{record}/edit'),
        ];
    }
}
