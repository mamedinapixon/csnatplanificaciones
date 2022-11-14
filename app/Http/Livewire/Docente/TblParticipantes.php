<?php

namespace App\Http\Livewire\Docente;

use Livewire\Component;
use App\Models\DocentePlanificacion;
use App\Models\Docente;
use App\Models\Cargo;
use App\Models\Dedicacion;

class TblParticipantes extends Component
{
    public $docentesPartipan = [];
    public $docentes = [];
    public $cargos = [];
    public $dedicaciones = [];

    public  $docente_id = null,
            $cargo_id = null,
            $planificacion_id = null,
            $dedicacion_id = null;

    protected $rules = [
        'docente_id' => 'required',
        'cargo_id' => 'required',
        'dedicacion_id' => 'required'
    ];
    protected $messages = [
        'docente_id.required' => 'Debe seleccionar un docente.',
        'cargo_id.required' => 'Debe seleccionar el cargo del docente.',
    ];

    public function mount($planificacion_id)
    {
        //dd($planificacion_id);
        $this->planificacion_id = $planificacion_id;
        $this->load();
        //dd($this->docentesPartipan);
        $this->docentes = Docente::Get();
        $this->cargos = Cargo::Get();
        $this->dedicaciones = Dedicacion::Get();
    }

    public function render()
    {
        return view('livewire.docente.tbl-participantes');
    }

    public function load()
    {
        $this->docentesPartipan = DocentePlanificacion::with("docente", "cargo", "dedicacion")->where("planificacion_id",$this->planificacion_id)->get();
    }

    public function store()
    {
        //dd("store");
        $this->validate();
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
                "dedicacion_id" => $this->dedicacion_id
            ]);
        }

        $this->load();
        $this->docente_id = null;
        $this->cargo_id = null;
        $this->dedicacion_id = null;
    }

    public function destroy($docente_id)
    {
        DocentePlanificacion::destroy($docente_id);
        $this->load();
    }

}
