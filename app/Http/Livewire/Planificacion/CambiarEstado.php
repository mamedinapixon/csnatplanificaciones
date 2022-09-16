<?php

namespace App\Http\Livewire\Planificacion;

use Livewire\Component;
use App\Models\Planificacion;

class CambiarEstado extends Component
{
    public $planificacion_id;
    public $estado_id;

    public function mount($planificacion_id, $estado_id)
    {
        $this->planificacion_id = $planificacion_id;
        $this->estado_id = $estado_id;
    }

    public function render()
    {
        return view('livewire.planificacion.cambiar-estado');
    }

    public function OnQuitarPresentada()
    {
        $planificacion = Planificacion::find($this->planificacion_id);
        $planificacion->update(["estado_id" => 1]);
        $this->estado_id = 1;
        session()->flash('message', 'Planificación habilitada para edición!');
        //redirect()->to('planificacion/'.$this->planificacion->id);
    }

    public function OnRevisado()
    {
        $planificacion = Planificacion::find($this->planificacion_id);
        $planificacion->update(["estado_id" => 3]);
        $this->estado_id = 3;
        session()->flash('message', 'Planificación revisada!');
        //redirect()->to('planificacion/'.$this->planificacion->id);
    }
}
