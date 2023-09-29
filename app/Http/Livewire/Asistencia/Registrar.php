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
        'ingreso_at.required' => 'Debe indicar la hora de ingreso.',
        'salida_at.required' => 'Debe indicar la hora de salida.',
        'otra_ubicacion.required_if' => 'Debe indicar un nombre de la ubicación.',
    ];

    public function registrarIngreso()
    {
        $validatedData = $this->validate([
            'ubicacion_id' => 'required|exists:ubicaciones,id',
            'ingreso_at' => 'required',
            'otra_ubicacion' => 'required_if:ubicacion_id,8'
        ]);

        $fecha_at = Carbon::now()->startOfDay();
        $ingreso_at = Carbon::now()->startOfDay();
        $ingreso_at->setTimeFromTimeString($validatedData['ingreso_at'].':00');

        $this->asistencia = Asistencia::create([
            'fecha_at'=>$fecha_at,
            'ingreso_at'=>$ingreso_at,
            'ubicacion_id'=>$this->ubicacion_id,
            'otra_ubicacion'=>$this->otra_ubicacion,
            'user_id'=>Auth::id()
        ]);

        $this->reset('otra_ubicacion');
    }

    public function registrarSalida()
    {
        $validatedData = $this->validate([
            'salida_at' => 'required',
        ]);

        $fecha_at = Carbon::now()->startOfDay();
        $salida_at = Carbon::now()->startOfDay();
        $salida_at->setTimeFromTimeString($validatedData['salida_at'].':00');

        $this->asistencia->update([
            'salida_at'=>$salida_at,
        ]);

        $this->buscarAsistenciaHoy();
    }
}
