<?php

namespace App\Filament\Resources\CatedraResource\RelationManagers;

use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Validation\Rules\Unique;

class MiembrosRelationManager extends RelationManager
{
    protected static string $relationship = 'miembros';

    protected static ?string $recordTitleAttribute = 'role';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->label('Usuario')
                    ->relationship('user', 'name')
                    ->searchable()
                    ->preload()
                    ->required()
                    ->unique(
                        'catedra_members',
                        'user_id',
                        ignoreRecord: true,
                        callback: fn (Unique $rule, RelationManager $livewire): Unique =>
                            $rule->where('catedra_id', $livewire->getOwnerRecord()->getKey()),
                    ),
                Forms\Components\Select::make('role')
                    ->label('Rol')
                    ->options([
                        'jefe' => 'Jefe de Cátedra',
                        'miembro' => 'Miembro',
                    ])
                    ->default('miembro')
                    ->required(),
                Forms\Components\Toggle::make('activo')
                    ->label('Activo')
                    ->default(true)
                    ->required(),
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
                Tables\Columns\BadgeColumn::make('role')
                    ->label('Rol')
                    ->enum([
                        'jefe' => 'Jefe de Cátedra',
                        'miembro' => 'Miembro',
                    ])
                    ->colors([
                        'success' => 'jefe',
                        'primary' => 'miembro',
                    ]),
                Tables\Columns\IconColumn::make('activo')
                    ->label('Activo')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Creado')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Actualizado')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('role')
                    ->label('Rol')
                    ->options([
                        'jefe' => 'Jefe de Cátedra',
                        'miembro' => 'Miembro',
                    ]),
                Tables\Filters\TernaryFilter::make('activo')
                    ->label('Estado')
                    ->placeholder('Todos')
                    ->trueLabel('Activos')
                    ->falseLabel('Inactivos'),
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ])
            ->defaultSort('created_at', 'desc');
    }
}

