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
        //$this->anioAcademicos = PeriodoLectivo::select('anio_academico')->distinct()->get();





        //dd($carreras);
    }
    public function render()
    {
        $this->anioAcademicos = PeriodoLectivo::onlyYears()->get();
        if(!empty($this->anioAcademicos))
        {
            if($this->anio_academico_id == 0) $this->anio_academico_id = $this->anioAcademicos[0]->anio_academico;
            //dd($this->carreras = Planificacion::total_por_carrera());
            //$this->carreras = Planificacion::total_por_carrera()->whereIn('periodo_lectivos.anio_academico',[$this->anio_academico])->get();
        }
        //dd($this->anio_academico_id);
        $this->carreras = Planificacion::total_por_carrera()->whereIn('periodo_lectivos.anio_academico',[$this->anio_academico_id])->get();
        return view('livewire.planificacion.dashboard.stat-planificaciones-x-carrera');
    }

    /*public function cambiarAnio($anio)
    {
        dd($anio);
        $this->anio_academico_id = $anio;
    }*/
}
