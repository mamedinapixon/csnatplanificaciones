<?php

namespace App\Filament\Resources\CatedraResource\Pages;

use App\Filament\Resources\CatedraResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCatedras extends ListRecords
{
    protected static string $resource = CatedraResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
