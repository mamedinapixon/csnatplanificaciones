<?php

namespace App\Http\Livewire\Salidas;

use Livewire\Component;

use App\Models\Salida;

class TblSalidas extends Component
{
    public $planificacion_id, $nombre, $dias_tentativos, $fecha_tentativa = null;
    public $salidas = [];

    protected $rules = [
        'planificacion_id' => 'required',
        'nombre' => 'required',
        'dias_tentativos' => 'required',
        'fecha_tentativa' => 'required'
    ];

    protected $messages = [
        'nombre.required' => 'Debe indicar un lugar tentativo para la salida.',
        'dias_tentativos.required' => 'Debe indicar la cantidad de días.',
        'fecha_tentativa.required' => 'Debe indicar la fecha tentativa.'
    ];

    public function mount($planificacion_id)
    {
        $this->planificacion_id = $planificacion_id;
        $this->load();
    }

    public function load()
    {
        $this->salidas = Salida::where("planificacion_id", $this->planificacion_id)->get();
    }

    public function render()
    {
        return view('livewire.salidas.tbl-salidas');
    }
    
    public function store()
    {
        //dd("store");
        $this->validate();
        Salida::create([
            "planificacion_id" => $this->planificacion_id,
            "nombre" => $this->nombre,
            "dias_tentativos" => $this->dias_tentativos,
            "fecha_tentativa" => $this->fecha_tentativa,
        ]);
        $this->load();
        $this->nombre = null;
        $this->dias_tentativos = null;
        $this->fecha_tentativa = null;
    }

    public function destroy($id)
    {
        Salida::destroy($id);
        $this->load();
    }
}