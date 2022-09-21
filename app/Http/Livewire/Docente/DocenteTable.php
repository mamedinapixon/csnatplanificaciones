<?php

namespace App\Http\Livewire\Docente;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Docente;

class DocenteTable extends DataTableComponent
{
    protected $model = Docente::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id')
             ->setTableRowUrl(function($row) {
                return route('docente.edit', $row);
             });
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Apellido", "apellido")
                ->sortable()
                ->searchable(),
            Column::make("Nombre", "nombre")
                ->sortable()
                ->searchable(),
            Column::make("Nro documento", "nro_documento")
                ->sortable()
                ->searchable(),
            Column::make("Email", "email")
                ->sortable()
                ->searchable(),
        ];
    }
}
