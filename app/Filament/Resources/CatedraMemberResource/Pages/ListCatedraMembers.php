<?php

namespace App\Filament\Resources\CatedraMemberResource\Pages;

use App\Filament\Resources\CatedraMemberResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCatedraMembers extends ListRecords
{
    protected static string $resource = CatedraMemberResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
