<?php

namespace App\Filament\Resources\CatedraResource\Pages;

use App\Filament\Resources\CatedraResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCatedra extends EditRecord
{
    protected static string $resource = CatedraResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
