<?php

namespace App\Http\Livewire\Planificacion\Dashboard;

use Livewire\Component;
use App\Models\Planificacion;
use App\Models\PeriodoLectivo;
use Illuminate\Support\Facades\DB;

class StatPlanificacionesXCarrera extends Component
{
    public $carreras = null;
    public $anioAcademicos = null;
    public $anio_academico_id = 0;

    protected $queryString = ['anio_academico_id'];

    public function mount()
    {





        //dd($carreras);
    }
    public function render()
    {
        //DB::table('periodo_lectivos')->distinct()->select('anio_academico')->orderBy('anio_academico', 'desc');
        //$this->anioAcademicos = PeriodoLectivo::onlyYears()->get();
        $this->anioAcademicos = PeriodoLectivo::distinct()->select('anio_academico')->orderBy('anio_academico', 'desc')->get();
        if(!empty($this->anioAcademicos))
        {
            if($this->anio_academico_id == 0) $this->anio_academico_id = $this->anioAcademicos[0]->anio_academico;
        }
        //dd($this->anio_academico_id);
        $planificacion = new Planificacion();
        $this->carreras = $planificacion->total_por_carrera()->whereIn('periodo_lectivos.anio_academico',[$this->anio_academico_id])->get();
        $this->emit('cambiarAnioAcademico',$this->anio_academico_id);
        //$this->emit('setFilter', 'anio_academico_id', $this->anio_academico_id);
        //$this->emit('clearFilters');
        return view('livewire.planificacion.dashboard.stat-planificaciones-x-carrera');
    }
}
