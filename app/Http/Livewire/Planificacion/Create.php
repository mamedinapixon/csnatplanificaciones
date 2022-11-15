<?php

namespace App\Http\Livewire\Planificacion;

use Livewire\Component;
use App\Models\Planificacion;
use App\Models\Carrera;
use App\Models\PeriodoLectivo;
use App\Models\Materia;
use App\Models\MateriaPlanEstudio;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class Create extends Component
{

    public $carreras = [];
    public $periodosLectivos = [];
    public $docentes = [];
    public $materiasPlanDeEstudio = [];

    public  $carrera_id = null,
            $periodo_lectivo_id = null,
            $periodo_academico_id = null,
            $docente_id = null,
            $materia_plan_estudio_id = null,
            $electiva_nombre = null,
            $msj_error = null;

    public function mount()
    {
        $this->periodosLectivos = PeriodoLectivo::with("periodoAcademico")
                ->whereDate('fecha_inicio_activo','<=', Carbon::now()->toDateTimeString())
                ->whereDate('fecha_fin_activo','>=', Carbon::now()->toDateTimeString())
                ->get();
        //dd(Carbon::now()->toDateTimeString());
        //dd($this->periodosLectivos);
        $this->carreras = Carrera::get();
    }

    public function render()
    {
        if (!empty($this->periodo_lectivo_id) && !empty($this->carrera_id)) {
            $periodoLectivo = PeriodoLectivo::where("id",$this->periodo_lectivo_id)->first();
            //$this->carreras = Carrera::where("periodo_academico_id", $periodoLectivo->periodoAcademico->id)->get();
            $this->periodo_academico_id = $periodoLectivo->periodoAcademico->id;
            $this->materiasPlanDeEstudio = MateriaPlanEstudio::with("materia")
                                                ->where("carrera_id", $this->carrera_id)
                                                ->where("periodo_academico_id", $this->periodo_academico_id)
                                                ->orderBy("anio_curdada")
                                                ->get();
        }

        return view('livewire.planificacion.create');
    }

    public function store()
    {
        if (empty($this->materia_plan_estudio_id)) {
            $this->msj_error = "Primero debe seleccionar una asignatura";
        } else {

            $planificacion =   Planificacion::with(['materiaPlanEstudio.materia','materiaPlanEstudio.carrera','docenteCargo','periodoLectivo','periodoLectivo.periodoAcademico'])
                                            ->where("periodo_lectivo_id", $this->periodo_lectivo_id)
                                            ->where("materia_plan_estudio_id", $this->materia_plan_estudio_id)
                                            ->first();

            if (!empty($planificacion)) {
                if($planificacion->user_id == Auth::id())
                {
                    //Redireccionar al edit de la planificacion con el id de la misma.
                    if($planificacion->estado_id == 1)
                    {
                        $this->RedireccionarAlEdit($planificacion->id);
                    } else {
                        $this->RedireccionarAlVer($planificacion->id);
                    }

                } else {
                    $asigantura = $planificacion->materiaPlanEstudio->materia->nombre;
                    $carrera = $planificacion->materiaPlanEstudio->carrera->nombre;
                    $periodo_lectivo = $planificacion->periodoLectivo->periodoAcademico->nombre." ".$planificacion->periodoLectivo->anio_academico;
                    $docente = $planificacion->docenteCargo->apellido." ".$planificacion->docenteCargo->nombre;
                    $this->msj_error = "Ya hay una planificacion cargada por el docente ".$docente." para la asignatura ".$asigantura." de la carrera ".$carrera." en el periodo lectivo ".$periodo_lectivo;
                }
            } else {
                $planificacion = Planificacion::create([
                    "user_id" => Auth::id(),
                    "periodo_lectivo_id" => $this->periodo_lectivo_id,
                    "materia_plan_estudio_id" => $this->materia_plan_estudio_id,
                    "docente_id" => Auth::id()
                ]);
                $this->RedireccionarAlEdit($planificacion->id);
            }
        }
    }
    public function RedireccionarAlEdit($planificacion_id)
    {
        //session()->flash('message', 'Post successfully updated.');
        return redirect()->to('/planificacion/'.$planificacion_id.'/edit');

    }
    public function RedireccionarAlVer($planificacion_id)
    {
        //session()->flash('message', 'Post successfully updated.');
        return redirect()->to('/planificacion/'.$planificacion_id);

    }
}
