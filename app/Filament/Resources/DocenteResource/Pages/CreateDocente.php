<?php

namespace App\Filament\Resources\DocenteResource\Pages;

use App\Filament\Resources\DocenteResource;
use Filament\Resources\Pages\CreateRecord;

class CreateDocente extends CreateRecord
{
    protected static string $resource = DocenteResource::class;

    public function mount(): void
    {
        parent::mount();
        $this->form->fill(['activo' => true]);
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['activo'] = $data['activo'] ?? true;
        return $data;
    }
}
