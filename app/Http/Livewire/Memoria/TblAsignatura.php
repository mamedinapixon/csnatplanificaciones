<?php

namespace App\Http\Livewire\Memoria;

use Livewire\Component;
use App\Models\MemoriaAsignatura;

class TblAsignatura extends Component
{
    public $memoria_id;
    public $tipo_docente;
    public $asignatura = "";
    public $memoriasAsignaturas = [];
    public $label = "Asignatura en la que participó como docente estable";


    protected $rules = [
        'asignatura' => 'required'
    ];

    protected $messages = [
        'asignatura.required' => 'Debes indicar el nombre de la asignatura'
    ];

    public function mount($memoria_id, $tipo_docente)
    {
        $this->tipo_docente = $tipo_docente;
        $this->memoria_id = $memoria_id;
        $this->load();
    }

    public function render()
    {
        return view('livewire.memoria.tbl-asignatura');
    }

    private function load()
    {
        $this->memoriasAsignaturas = MemoriaAsignatura::where("memoria_id", $this->memoria_id)->where("tipo_docente",$this->tipo_docente)->get();
    }

    public function store()
    {
        $this->validate();
        MemoriaAsignatura::create([
            'memoria_id'=>$this->memoria_id,
            'asignatura'=>$this->asignatura,
            'tipo_docente'=>$this->tipo_docente
        ]);
        $this->load();
        $this->asignatura = "";
    }

    public function destroy($id)
    {
        MemoriaAsignatura::destroy($id);
        $this->load();
    }
}
