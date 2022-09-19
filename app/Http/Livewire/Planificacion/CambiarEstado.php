<?php

namespace App\Http\Livewire\Planificacion;

use Livewire\Component;
use Carbon\Carbon;
use App\Models\Planificacion;

class CambiarEstado extends Component
{
    public $planificacion;

    public function mount($planificacion)
    {
        $this->planificacion = $planificacion;
    }

    public function render()
    {
        return view('livewire.planificacion.cambiar-estado');
    }

    public function OnQuitarPresentada()
    {
        $planificacion = Planificacion::find($this->planificacion->id);
        $planificacion->update([
            "estado_id" => 1,
            "presentado_at" => null,
            "revisado_at" => null,
        ]);
        $this->planificacion = $planificacion;
        session()->flash('message', 'Planificación habilitada para edición!');
    }

    public function OnRevisado()
    {
        $planificacion = Planificacion::find($this->planificacion->id);
        $planificacion->update([
            "estado_id" => 3,
            "revisado_at" => Carbon::now()->timestamp
        ]);
        $this->planificacion = $planificacion;
        session()->flash('message', 'Planificación revisada!');
    }

    public function OnPresentar()
    {
        $planificacion = Planificacion::find($this->planificacion->id);
        $planificacion->update([
            "estado_id" => 2,
            "presentado_at" => Carbon::now()->timestamp
        ]);
        $this->planificacion = $planificacion;
        session()->flash('message', 'Planificación presentada!');
    }
}
