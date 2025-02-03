<?php

namespace App\Http\Livewire\Asistencia;

use Livewire\Component;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Ubicacion;
use App\Models\Asistencia;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;

class Registrar extends Component
{
    use LivewireAlert;

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

        // Obtener la dirección IP del cliente
        $ip = request()->ip();

        // Obtener información de geolocalización
        $geoInfo = $this->obtenerInformacionIP($ip);

        $this->asistencia = Asistencia::create([
            'fecha_at' => $fecha_at,
            'ingreso_at' => $ingreso_at,
            'ubicacion_id' => $this->ubicacion_id,
            'otra_ubicacion' => $this->otra_ubicacion,
            'observacion' => $this->motivo,
            'user_id' => Auth::id(),
            'ip_address' => $ip,
            'pais' => $geoInfo['pais'] ?? null,
            'ciudad' => $geoInfo['ciudad'] ?? null,
            'latitud' => $geoInfo['latitud'] ?? null,
            'longitud' => $geoInfo['longitud'] ?? null
        ]);

        $this->reset('otra_ubicacion','motivo');

        $this->flash('success', 'INGRESO REGISTRADO', [
            'text' => 'Hora ingreso: '. $this->asistencia->ingreso_at->toTimeString(),
            'timerProgressBar' => true,
            'timer' => 5000
        ], 'home');

        return redirect()->route('asistencia.historial');
    }

    // Método para obtener información de geolocalización
    protected function obtenerInformacionIP($ip)
    {
        // Definir un tiempo de caché (30 días)
        $cacheDuration = now()->addDays(1);

        // Intentar obtener la información de caché primero
        return Cache::remember("ip_info_{$ip}", $cacheDuration, function () use ($ip) {
            try {
                // Realizar la llamada a la API solo si no está en caché
                $response = Http::timeout(5)->get("http://ip-api.com/json/{$ip}");

                if ($response->successful()) {
                    $data = $response->json();

                    // Verificar si la respuesta es válida
                    if ($data['status'] === 'success') {
                        return [
                            'pais' => $data['country'] ?? null,
                            'ciudad' => $data['city'] ?? null,
                            'region' => $data['regionName'] ?? null,
                            'latitud' => $data['lat'] ?? null,
                            'longitud' => $data['lon'] ?? null,
                            'proveedor_internet' => $data['isp'] ?? null,
                            'zona_horaria' => $data['timezone'] ?? null
                        ];
                    }
                }
            } catch (\Exception $e) {
                // Registrar el error sin interrumpir el flujo
                Log::error('Error al obtener información de IP: ' . $e->getMessage());
            }

            // Retornar un array vacío si falla
            return [];
        });
    }

    public function registrarSalida()
    {
        $salida_at = Carbon::now();

        $this->asistencia->update([
            'salida_at'=>$salida_at,
        ]);

        $this->flash('success', 'SALIDA REGISTRADA', [
            'text' => 'Hora salida: '. $this->asistencia->salida_at->toTimeString(),
            'timerProgressBar' => true,
            'timer' => 5000
        ], 'home');

        $this->reset('otra_ubicacion','motivo');

        return redirect()->route('asistencia.historial');


        //$this->buscarAsistenciaHoy();
    }
}
