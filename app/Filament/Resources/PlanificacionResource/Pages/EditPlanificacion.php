<?php

namespace App\Filament\Resources\PlanificacionResource\Pages;

use App\Filament\Resources\PlanificacionResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPlanificacion extends EditRecord
{
    protected static string $resource = PlanificacionResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
