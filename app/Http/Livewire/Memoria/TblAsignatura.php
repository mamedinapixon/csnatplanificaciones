<?php

namespace App\Http\Livewire\Memoria;

use Livewire\Component;
use App\Models\MemoriaAsignatura;
use App\Models\Cargo;
use App\Models\Dedicacion;
use App\Models\SituacionCargo;

class TblAsignatura extends Component
{
    public $memoria_id;
    public $tipo_docente;
    public $memoriasAsignaturas = [];
    public $label = "Asignatura en la que participó como docente estable";
    public $cargos = [];
    public $dedicaciones = [];
    public $situaciones = [];

    public  $asignatura = "",
            $cargo_id = null,
            $dedicacion_id = null,
            $situacion_cargo_id = null;


    protected $rules = [
        'asignatura' => 'required',
        'cargo_id' => 'required',
        'dedicacion_id' => 'required',
        'situacion_cargo_id' => 'required',
    ];

    protected $messages = [
        'asignatura.required' => 'Debes indicar el nombre de la asignatura',
        'cargo_id.required' => 'Debes indicar el cargo de la asignatura',
        'dedicacion_id.required' => 'Debes indicar la dedicación de la asignatura',
        'situacion_cargo_id.required' => 'Debes indicar la situación del cargo de la asignatura',
    ];

    public function mount($memoria_id, $tipo_docente)
    {
        $this->tipo_docente = $tipo_docente;
        $this->memoria_id = $memoria_id;
        $this->cargos = Cargo::Get();
        $this->dedicaciones = Dedicacion::Get();
        $this->situaciones = SituacionCargo::Get();
        $this->load();
    }

    public function render()
    {
        return view('livewire.memoria.tbl-asignatura');
    }

    private function load()
    {
        $this->memoriasAsignaturas = MemoriaAsignatura::with('cargo','dedicacion','situacion_cargo')->where("memoria_id", $this->memoria_id)->where("tipo_docente",$this->tipo_docente)->get();
    }

    public function store()
    {
        $this->validate();
        MemoriaAsignatura::create([
            'memoria_id'=>$this->memoria_id,
            'asignatura'=>$this->asignatura,
            'tipo_docente'=>$this->tipo_docente,
            'cargo_id'=>$this->cargo_id,
            'dedicacion_id'=>$this->dedicacion_id,
            'situacion_cargo_id'=>$this->situacion_cargo_id,
        ]);
        $this->load();
        $this->asignatura = "";
        $this->cargo_id = null;
        $this->dedicacion_id = null;
        $this->situacion_cargo_id = null;
    }

    public function destroy($id)
    {
        MemoriaAsignatura::destroy($id);
        $this->load();
    }
}
