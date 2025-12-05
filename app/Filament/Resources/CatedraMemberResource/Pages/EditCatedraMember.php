<?php

namespace App\Filament\Resources\CatedraMemberResource\Pages;

use App\Filament\Resources\CatedraMemberResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCatedraMember extends EditRecord
{
    protected static string $resource = CatedraMemberResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
