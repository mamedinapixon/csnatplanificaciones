<?php

namespace App\Http\Livewire\Memoria;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

use Rappasoft\LaravelLivewireTables\Views\Filters\MultiSelectFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;

use App\Models\Memoria;

use Illuminate\Support\Facades\Auth;

class MemoriaTable extends DataTableComponent
{
    protected $model = Memoria::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setTableRowUrl(function($row) {
                return route('memoria.show', $row);
            });
    }

    public function builder(): Builder
    {

        if(Auth::user()->can('ver todas memorias'))
        {
            $memoria = Memoria::query()
                            ->with("user","estado");
        } else {
            $memoria = Memoria::query()
                            ->where("user_id","=",Auth::user()->id)
                            ->with("user","estado");
        }

        return $memoria;
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Docente", "user.name")->searchable()->sortable(),
            Column::make("Anio academico", "anio_academico")
                ->sortable(),
            Column::make('Estado', 'estado_id')
                ->format(
                    fn($value, $row, Column $column) => $row->estado_id == 2 ? '<div class="gap-2 text-white badge badge-info">'.$row->estado->nombre.'</div>' : ($row->estado_id == 3 ? '<div class="gap-2 text-white badge badge-success">'.$row->estado->nombre.'</div>' : ($row->estado_id == 4 ? '<div class="gap-2 text-white badge badge-error">'.$row->estado->nombre.'</div>' :'<div class="gap-2 text-white badge">'.$row->estado->nombre.'</div>'))
                )
                ->html()
                ->sortable(),
            Column::make("Creado at", "created_at")
                ->sortable(),
            Column::make("Actualizado", "updated_at")
                ->format(
                    fn($value, $row, Column $column) => \Carbon\Carbon::parse($row->updated_at)->diffForHumans()
                )
                ->sortable(),
        ];
    }

    public function filters(): array
    {
        return [
            SelectFilter::make('Estado', 'estado')
            ->options([
                '' => 'Todos',
                '1' => 'Editando',
                '2' => 'Presentado',
                '3' => 'Aprobado',
                '4' => 'Observado'
            ])
            ->filter(function(Builder $builder, string $value) {
                if ($value > 0) {
                    $builder->where('memorias.estado_id', $value);
                }
            }),
        ];
    }

}