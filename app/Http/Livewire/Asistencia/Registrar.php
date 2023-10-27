<?php

namespace App\Http\Livewire\Asistencia;

use Livewire\Component;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Ubicacion;
use App\Models\Asistencia;

class Registrar extends Component
{
    public $regIngreso = true;
    public $ubicaciones = [];
    public $ubicacion = null;

    public $asistencia = null;
    public $ubicacion_id = 0;
    public $ingreso_at;
    public $salida_at;
    public $otra_ubicacion = "";
    public $motivo = "";

    public function mount()
    {
        $this->ubicaciones = Ubicacion::get();
        $this->buscarAsistenciaHoy();
    }

    public function render()
    {
        return view('livewire.asistencia.registrar');
    }

    public function buscarAsistenciaHoy()
    {
        $this->asistencia = Asistencia::where('user_id',Auth::id())
                                        ->where('fecha_at',Carbon::now()->startOfDay())
                                        ->whereNull('salida_at')
                                        ->first();
    }

    public function updatedubicacionid()
    {
        $this->ubicacion = Ubicacion::where('id',$this->ubicacion_id)->first();
    }

    protected $messages = [
        'ubicacion_id.required' => 'Debe indicar una ubicación.',
        'ubicacion_id.exists' => 'Debe indicar una ubicación.',
        'otra_ubicacion.required_if' => 'Debe indicar un nombre de la ubicación.',
        'motivo.required_if' => 'Debe indicar el motivo de otra ubicación.',
    ];

    public function registrarIngreso()
    {
        $validatedData = $this->validate([
            'ubicacion_id' => 'required|exists:ubicaciones,id',
            'otra_ubicacion' => 'required_if:ubicacion_id,8',
            'motivo' => 'required_if:ubicacion_id,8'
        ]);

        $fecha_at = Carbon::now()->startOfDay();
        $ingreso_at = Carbon::now();

        $this->asistencia = Asistencia::create([
            'fecha_at'=>$fecha_at,
            'ingreso_at'=>$ingreso_at,
            'ubicacion_id'=>$this->ubicacion_id,
            'otra_ubicacion'=>$this->otra_ubicacion,
            'observacion'=>$this->motivo,
            'user_id'=>Auth::id()
        ]);

        $this->reset('otra_ubicacion','motivo');
    }

    public function registrarSalida()
    {
        $salida_at = Carbon::now();

        $this->asistencia->update([
            'salida_at'=>$salida_at,
        ]);

        $this->buscarAsistenciaHoy();
    }
}
