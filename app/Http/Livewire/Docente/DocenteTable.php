<?php

namespace App\Http\Livewire\Docente;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;
use App\Models\Docente;
use Illuminate\Support\Facades\Auth;

class DocenteTable extends DataTableComponent
{
    protected $model = Docente::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        if(Auth::user()->can('editar docentes'))
        {
            $this->setTableRowUrl(function($row) {
                return route('docente.edit', $row);
             });
        }

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
            /*ButtonGroupColumn::make('Actions')
                ->unclickable()
                ->attributes(function($row) {
                    return [
                        'class' => 'space-x-2',
                    ];
                })
                ->buttons([
                    LinkColumn::make('Acciones')
                        ->title(fn($row) => 'Eliminar')
                        ->location(function($row){

                        })
                        ->attributes(function($row) {
                            return [
                                'target' => '_blank',
                                'class' => 'underline text-blue-500',
                            ];
                        }),
                ]),*/
        ];
    }
}
