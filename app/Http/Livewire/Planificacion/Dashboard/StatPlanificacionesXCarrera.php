<?php

namespace App\Http\Livewire\Planificacion\Dashboard;

use Livewire\Component;
use App\Models\Planificacion;
use Illuminate\Support\Facades\DB;

class StatPlanificacionesXCarrera extends Component
{
    public $carreras;

    public function mount()
    {
        $this->carreras = Planificacion::total_por_carrera()->get();
        //dd($carreras);
    }
    public function render()
    {
        return view('livewire.planificacion.dashboard.stat-planificaciones-x-carrera');
    }
}
