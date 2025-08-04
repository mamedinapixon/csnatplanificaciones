<?php

namespace App\Http\Livewire\Asistencia;

use Livewire\Component;
use App\Models\Asistencia;
use Illuminate\Support\Facades\Auth;

class ControlAsistenciaForm extends Component
{
    public $asistenciaId;
    public $asistencia;
    public $controlRealizado;
    public $controlUserId;
    public $controlResultado;
    public $controlObservacion;

    protected $rules = [
        'controlRealizado' => 'boolean',
        'controlResultado' => 'required|boolean',
        'controlObservacion' => 'nullable|string',
    ];

    public function mount($asistenciaId)
    {
        $this->asistenciaId = $asistenciaId;
        $this->asistencia = Asistencia::findOrFail($asistenciaId);

        $this->controlRealizado = $this->asistencia->control_realizado ?? false;
        $this->controlUserId = $this->asistencia->control_user_id ?? Auth::id();
        $this->controlResultado = $this->asistencia->control_resultado ?? null;
        $this->controlObservacion = $this->asistencia->control_observacion ?? null;
    }

    public function guardarControl()
    {
        $this->validate();

        $this->asistencia->update([
            'control_realizado' => $this->controlRealizado,
            'control_user_id' => Auth::id(), // Siempre se actualiza con el usuario actual
            'control_resultado' => $this->controlResultado,
            'control_observacion' => $this->controlObservacion,
        ]);

        session()->flash('message', 'Control de asistencia guardado exitosamente.');

        return redirect()->route('asistencia.historial');
    }

    public function render()
    {
        return view('livewire.asistencia.control-asistencia-form');
    }
}
