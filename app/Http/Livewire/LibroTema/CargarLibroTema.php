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
    public $planificaciones;
    public $fecha;
    public $docentes;
    public $contenido;
    public $modalidades;
    public $caracteres;
    public $cantidad_alumnos;
    public $duracion_minutos;
    public $observaciones;

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
                Select::make('planificaciones')
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
                                    if(empty($planificacion->electiva_nombre)) {
                                        $label = $planificacion->materiaPlanEstudio->carrera->codigo_siu . ': ' . $planificacion->materiaPlanEstudio->materia->nombre;
                                    } else {
                                        $label = $planificacion->materiaPlanEstudio->carrera->codigo_siu . ': ' . $planificacion->electiva_nombre;
                                    }
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
                    ->multiple()
                    ->columnSpanFull()
                    ->required(),
                Select::make('docentes')
                    ->label('Docente/s que participan de la clase')
                    ->multiple()
                    ->searchable()
                    ->relationship('docentes', 'full_name')
                    ->preload()
                    ->columnSpanFull()
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
                Select::make('duracion_minutos')
                    ->options(function () {
                        $options = [];
                        for ($minutes = 30; $minutes <= 360; $minutes += 30) {
                            $hours = floor($minutes / 60);
                            $mins = $minutes % 60;
                            $display = sprintf('%02d:%02d', $hours, $mins);
                            $options[$minutes] = $display;
                        }
                        return $options;
                    })
                    ->searchable()
                    ->preload()
                    ->required()
                    ->label('Duración de la clase'),
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
                RichEditor::make('observaciones')
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
                    ->columnSpanFull(),
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
        $libroTema = LibroTema::create($this->form->getState());
        $libroTema->planificaciones()->sync($this->planificaciones);
        $this->form->model($libroTema)->saveRelationships();
    }
}
