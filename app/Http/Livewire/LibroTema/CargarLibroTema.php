<?php

namespace App\Http\Livewire\LibroTema;

use Livewire\Component;
use App\Models\PeriodoLectivo;
use Filament\Forms;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;



class CargarLibroTema extends Component implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    public function render()
    {
        return view('livewire.librotema.cargarlibrotema');
    }

    protected function getFormSchema(): array
    {
        return [
            Select::make('periodo_lectivo_id')
                ->options(function () {
                    $currentDate = now()->toDateString();
                    return PeriodoLectivo::where('fecha_inicio_activo', '<=', $currentDate)
                        ->where('fecha_fin_activo', '>=', $currentDate)
                        ->get()
                        ->mapWithKeys(function ($periodoLectivo) {
                            $label = $periodoLectivo->anio_academico . ' - ' . $periodoLectivo->periodoAcademico->nombre;
                            return [$periodoLectivo->id => $label];
                        });
                })
                ->label('Periodo Lectivo')
                ->required(),
            /*Select::make('authorId')
                ->relationship('author', 'name', fn (Builder $query) => $query->withTrashed()),
            TextInput::make('title')->required(),
            RichEditor::make('content'),*/
            // ...
        ];
    }

    public function submit(): void
    {
        // ...
    }
}
