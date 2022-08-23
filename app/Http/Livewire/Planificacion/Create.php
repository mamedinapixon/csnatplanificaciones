<?php

namespace App\Http\Livewire\Planificacion;

use Livewire\Component;
use App\Models\Planificacion;
use App\Models\Carrera;

class Create extends Component
{
    public $carreras;
    public function mount()
    {
        $this->carreras = Carrera::get();
    }

    public function render()
    {
        return view('livewire.planificacion.create');
    }
}
