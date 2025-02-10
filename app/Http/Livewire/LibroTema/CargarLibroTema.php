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
use Filament\Notifications\Notification;



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
        $this->form->fill([
            'fecha' => now(),
        ]);
    }

    protected function getFormSchema(): array
    {
        return [
            Card::make()
            ->schema([
                DatePicker::make('fecha')
                    ->label('Fecha de la clase')
                    ->displayFormat('d/m/Y')
                    ->default(now()) // TODO: No esta funcionando, agregar por javascript.
                    ->reactive()
                    ->required(),
                Select::make('planificaciones')
                    ->label('Materia dictada')
                    ->relationship('planificaciones', 'id', function (Builder $query, callable $get) {
                        $currentDate = $get('fecha');
                        if ($currentDate) {
                            $anio_academico = Carbon::parse($currentDate)->year;
                            return $query->whereHas('periodoLectivo', function ($query) use ($anio_academico) {
                                                    $query->where('anio_academico', $anio_academico);
                                                })
                            ->with(['materiaPlanEstudio.carrera', 'materiaPlanEstudio.materia']);
                        }
                        return $query->whereRaw('1 = 0'); // Return an empty query if no date is selected
                        dd($query);
                    })
                    ->getOptionLabelFromRecordUsing(fn (Model $record): string => "{$record->materiaPlanEstudio->carrera->codigo_siu}: {$record->materiaPlanEstudio->materia->nombre}")
                    ->getSearchResultsUsing(function (string $search, callable $get) {
                        $currentDate = $get('fecha');
                        $query = Planificacion::query();
                        if ($currentDate) {
                            $anio_academico = Carbon::parse($currentDate)->year;
                            $query->whereHas('periodoLectivo', function ($query) use ($anio_academico) {
                                                    $query->where('anio_academico', $anio_academico);
                                                })
                            ->with(['materiaPlanEstudio.carrera', 'materiaPlanEstudio.materia']);
                        }
                        $results = $query
                            ->where(function ($query) use ($search) {
                                $query->whereHas('materiaPlanEstudio.carrera', function ($query) use ($search) {
                                    $query->where('codigo_siu', 'like', "%{$search}%");
                            })
                                ->orWhereHas('materiaPlanEstudio.materia', function ($query) use ($search) {
                                    $query->where('nombre', 'like', "%{$search}%");
                                })
                                ->orWhere('electiva_nombre', 'like', "%{$search}%");
                            })
                            ->get()
                            ->mapWithKeys(function ($record) {
                                $carrera = $record->materiaPlanEstudio->carrera->codigo_siu;
                                $materia = empty($record->electiva_nombre)
                                    ? $record->materiaPlanEstudio->materia->nombre
                                    : $record->electiva_nombre;
                                $label = $carrera . ': ' . $materia;
                                return [$record->id => $label];
                            })
                            ->toArray();
                        return $results;
                    })
                    ->searchable()
                    ->multiple()
                    //->preload()
                    ->columnSpanFull()
                    ->required(),
                Select::make('docentes')
                    ->label('Docente/s que participan de la clase')
                    ->multiple()
                    ->searchable()
                    ->relationship('docentes', 'full_name', fn (Builder $query) => $query->where('activo', 1)->orderBy('full_name'))
                    ->preload(false)
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
                Select::make('aulas')
                    ->label('Aula')
                    ->multiple()
                    ->searchable()
                    ->relationship('aulas', 'nombre')
                    ->preload()
                    ->searchable(),
                TextInput::make('cantidad_alumnos')
                    ->label('Cantidad aproximada de alumnos')
                    ->numeric()
                    ->minValue(0)
                    ->required(),
                RichEditor::make('contenido')
                    ->label('Contenidos dictados')
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
                    ->label('Observaciones')
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



    public function submit()
    {
        $libroTema = LibroTema::create($this->form->getState());
        $libroTema->planificaciones()->sync($this->planificaciones);
        $this->form->model($libroTema)->saveRelationships();

        Notification::make()
            ->title('Libro de tema registrado correctamente')
            ->success()
            ->send();

        return redirect()->route('home');
    }
}
