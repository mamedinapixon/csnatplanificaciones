<?php

namespace App\Http\Livewire\Planificacion;

use Livewire\Component;
use Livewire\WithFileUploads;

class AdjuntarPrograma extends Component
{
    use WithFileUploads;

    public $file;

    public $planificacion_id = null;

    public function mount($planificacion_id)
    {
        $this->planificacion_id = $planificacion_id;
    }

    public function render()
    {
        return view('livewire.planificacion.adjuntar-programa');
    }

    public function save()
    {
        $this->validate([
            'file' => 'pdf|max:10240', // 1MB Max
        ]);

        $this->file->store('programas');
    }
}
