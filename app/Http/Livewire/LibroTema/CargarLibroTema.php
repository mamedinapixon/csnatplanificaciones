<?php

namespace App\Http\Livewire\LibroTema;

use Livewire\Component;
use App\Models\PeriodoLectivo;
use App\Models\Planificacion;
use Filament\Forms;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;



class CargarLibroTema extends Component implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    public $periodo_lectivo_id;
    public $planificacion_id;
    public $fecha;

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
                ->reactive()
                ->label('Periodo Lectivo')
                ->required(),
            Select::make('planificacion_id')
                ->options(function (callable $get) {
                    $periodo_lectivo_id = $get('periodo_lectivo_id');
                    if ($periodo_lectivo_id) {
                        return Planificacion::where('periodo_lectivo_id', $periodo_lectivo_id)
                            ->get()
                            ->mapWithKeys(function ($planificacion) {
                                $label = $planificacion->materiaPlanEstudio->carrera->codigo_siu . ' - ' . $planificacion->materiaPlanEstudio->materia->nombre;
                                return [$planificacion->id => $label];
                            });
                    }
                    return [];
                })
                ->reactive()
                ->label('Materia')
                ->required(),
            DatePicker::make('fecha')
                ->displayFormat('d/m/Y')
                ->required(),
            /*
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
