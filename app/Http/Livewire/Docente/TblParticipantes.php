<?php

namespace App\Http\Livewire\Docente;

use Livewire\Component;
use App\Models\DocentePlanificacion;
use App\Models\Planificacion;
use App\Models\Docente;
use App\Models\Cargo;
use App\Models\Dedicacion;
use App\Models\SituacionCargo;

class TblParticipantes extends Component
{
    public $docentesPartipan = [];
    public $docentes = [];
    public $cargos = [];
    public $dedicaciones = [];
    public $situaciones;

    public  $docente_id = null,
            $cargo_id = null,
            $planificacion_id = null,
            $dedicacion_id = null,
            $situacion_id;


    protected $rules = [
        'docente_id' => 'required',
        'cargo_id' => 'required',
        'dedicacion_id' => 'required',
        'situacion_id' => 'required'
    ];
    protected $messages = [
        'docente_id.required' => 'Debe seleccionar un docente.',
        'cargo_id.required' => 'Debe seleccionar el cargo del docente.',
        'situacion_id.required' => 'Debe seleccionar la situación del cargo del docente.',
    ];

    public function mount($planificacion_id)
    {
        //dd($planificacion_id);
        $this->planificacion_id = $planificacion_id;
        $this->load();
        //dd($this->docentesPartipan);
        $this->docentes = Docente::orderBy("apellido")->orderBy('nombre')->Get();
        $this->cargos = Cargo::Get();
        $this->dedicaciones = Dedicacion::Get();
        $this->situaciones = SituacionCargo::Get();
    }

    public function render()
    {
        return view('livewire.docente.tbl-participantes');
    }

    public function load()
    {
        $this->docentesPartipan = DocentePlanificacion::with("docente", "cargo", "dedicacion", "situacion")->where("planificacion_id",$this->planificacion_id)->get();
        //dd($this->docentesPartipan);
    }

    public function store()
    {
        //dd("store");
        $this->validate();

        $docenteACargo = Planificacion::where("id", $this->planificacion_id)
                                        ->where('docente_id',$this->docente_id)
                                        ->first();

        if($docenteACargo != null)
        {
            $this->addError('docente_id', 'El docente ya existe, esta a cargo de la asignatura.');
            return;
        }

        $docente = DocentePlanificacion::where("planificacion_id", $this->planificacion_id)
                                       ->where("docente_id", $this->docente_id)
                                       ->first();
        if($docente != null)
        {
            $docente->cargo_id = $this->cargo_id;
            $docente->save();
        } else {
            $docente = DocentePlanificacion::Create([
                "planificacion_id" => $this->planificacion_id,
                "docente_id" => $this->docente_id,
                "cargo_id" => $this->cargo_id,
                "dedicacion_id" => $this->dedicacion_id,
                "situacion_cargos_id" => $this->situacion_id,
            ]);
        }

        $this->load();
        $this->docente_id = null;
        $this->cargo_id = null;
        $this->dedicacion_id = null;
        $this->situacion_id = null;
    }

    public function destroy($docente_id)
    {
        DocentePlanificacion::destroy($docente_id);
        $this->load();
    }

}
