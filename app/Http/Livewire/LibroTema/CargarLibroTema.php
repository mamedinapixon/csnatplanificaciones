<?php

namespace App\Http\Livewire\LibroTema;

use Livewire\Component;
use App\Models\PeriodoLectivo;
use App\Models\Planificacion;
use App\Models\Docente;
use App\Models\CaracterClase;
use App\Models\ModalidadClase;
use App\Models\Aula;
use App\Models\LibroTema;
use Filament\Forms;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\Card;
use Carbon\Carbon;



class CargarLibroTema extends Component implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;

    public LibroTema $libroTema;

    public $anio_academico;
    public $planificacion_id;
    public $fecha;
    public $docentes;

    public function render()
    {
        return view('livewire.librotema.cargarlibrotema');
    }

    public function mount(): void
    {
        /*$this->form->fill([
            'title' => $this->post->title,
            'content' => $this->post->content,
        ]);*/
    }

    protected function getFormSchema(): array
    {
        return [
            Card::make()
            ->schema([
                DatePicker::make('fecha')
                    ->label('Fecha de la clase')
                    ->displayFormat('d/m/Y')
                    ->default(Carbon::now()->toDateString()) // TODO: No esta funcionando, agregar por javascript.
                    ->reactive()
                    ->required(),
                Select::make('planificacion_id')
                    ->label('Materia dictada')
                    ->options(function (callable $get) {
                        $currentDate = $get('fecha');
                        if ($currentDate) {
                            $anio_academico = Carbon::parse($currentDate)->toDateString();
                            if ($anio_academico) {
                                return Planificacion::whereHas('periodoLectivo', function ($query) use ($anio_academico) {
                                    $query->where('anio_academico', $anio_academico);
                                })
                                ->get()
                                ->mapWithKeys(function ($planificacion) {
                                    $label = $planificacion->materiaPlanEstudio->carrera->codigo_siu . ' - ' . $planificacion->materiaPlanEstudio->materia->nombre;
                                    return [$planificacion->id => $label];
                                });
                            }
                            return [];
                        }
                        return [];
                    })
                    ->reactive()
                    ->label('Materia')
                    ->searchable()
                    ->required(),
                Select::make('docentes')
                    ->label('Docente/s que participan de la clase')
                    ->multiple()
                    ->searchable()
                    ->relationship('docentes', 'full_name')
                    ->preload()
                    ->searchable(),
                Select::make('modalidades')
                    ->label('Modalidad')
                    ->multiple()
                    ->searchable()
                    ->relationship('modalidades', 'nombre')
                    ->preload()
                    ->searchable(),
                Select::make('caracteres')
                    ->label('Carácter de la clase')
                    ->multiple()
                    ->searchable()
                    ->relationship('caracteres', 'nombre')
                    ->preload()
                    ->searchable(),
                TextInput::make('cantidad_alumnos')
                    ->numeric()
                    ->minValue(0)
                    ->required(),
                TimePicker::make('duracion_minutos')
                    ->withoutSeconds()
                    ->minutesStep(30),
                RichEditor::make('contenido')
                    ->label('Contenidos a desarrollar o desarrollados en la clase')
                    ->toolbarButtons([
                        'blockquote',
                        'bold',
                        'bulletList',
                        'italic',
                        'link',
                        'orderedList',
                        'redo',
                        'strike',
                        'underline',
                        'undo',
                    ])
                    ->columnSpanFull()
                    ->required(),
            ])
            ->columns(2)
        ];
    }

    protected function getFormModel(): string
    {
        return LibroTema::class;
    }

    public function submit(): void
    {
        // ...
    }
}
