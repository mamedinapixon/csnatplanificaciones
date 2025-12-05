<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CatedraMemberResource\Pages;
use App\Models\CatedraMember;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class CatedraMemberResource extends Resource
{
    protected static ?string $model = CatedraMember::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';
    
    protected static ?string $navigationLabel = 'Miembros de Cátedra';
    
    protected static ?string $modelLabel = 'miembro de cátedra';
    
    protected static ?string $pluralModelLabel = 'miembros de cátedra';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('catedra_id')
                    ->label('Cátedra')
                    ->relationship('catedra', 'nombre')
                    ->required()
                    ->searchable(),
                Forms\Components\Select::make('user_id')
                    ->label('Usuario')
                    ->relationship('user', 'name')
                    ->required()
                    ->searchable(),
                Forms\Components\Select::make('role')
                    ->label('Rol')
                    ->options([
                        'jefe' => 'Jefe de Cátedra',
                        'miembro' => 'Miembro',
                    ])
                    ->default('miembro')
                    ->required(),
                Forms\Components\DatePicker::make('fecha_inicio')
                    ->label('Fecha de Inicio')
                    ->nullable(),
                Forms\Components\DatePicker::make('fecha_fin')
                    ->label('Fecha de Fin')
                    ->nullable(),
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
                Tables\Columns\TextColumn::make('catedra.nombre')
                    ->label('Cátedra')
                    ->searchable()
                    ->sortable(),
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
                Tables\Columns\TextColumn::make('fecha_inicio')
                    ->label('Inicio')
                    ->date('d/m/Y')
                    ->sortable(),
                Tables\Columns\TextColumn::make('fecha_fin')
                    ->label('Fin')
                    ->date('d/m/Y')
                    ->sortable(),
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
                Tables\Filters\SelectFilter::make('catedra_id')
                    ->label('Cátedra')
                    ->relationship('catedra', 'nombre')
                    ->searchable(),
                Tables\Filters\SelectFilter::make('user_id')
                    ->label('Usuario')
                    ->relationship('user', 'name')
                    ->searchable(),
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
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ])
            ->defaultSort('created_at', 'desc');
    }
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCatedraMembers::route('/'),
            'create' => Pages\CreateCatedraMember::route('/create'),
            'edit' => Pages\EditCatedraMember::route('/{record}/edit'),
        ];
    }
}
