<?php

namespace App\Http\Livewire\Memoria;

use Livewire\Component;
use Carbon\Carbon;
use App\Models\Memoria;
use App\Models\Cargo;
use App\Models\Dedicacion;
use App\Models\SituacionCargo;

class Edit extends Component
{
    public $memoria = [];
    public $cargos = [];
    public $dedicacion = [];
    public $situacioncargo = [];
    public $memoria_id;

    public $form = [];

    protected $rules = [
        'form.user_id' => 'required',
    ];

    public function mount($memoria)
    {
        /*$memoria = Memoria::find($memoria->id);*/
        $this->memoria = $memoria;

        $this->form = [
            'user_id' => $memoria->user_id,
            'anio_academico' => $memoria->anio_academico,
            'cargo_id' => $memoria->cargo_id,
            'dedicacion_id' => $memoria->dedicacion_id,
            'dicto_cursos_grado' => $memoria->dicto_cursos_grado,
            'dicto_cursos_grado_detalle' => $memoria->dicto_cursos_grado_detalle,
            'participo_jurado_titular' => $memoria->participo_jurado_titular,
            'participo_jurado_titular_detalle' => $memoria->participo_jurado_titular_detalle,
            'designado_jurado_suplente' => $memoria->designado_jurado_suplente,
            'designado_jurado_suplente_detalle' => $memoria->designado_jurado_suplente_detalle,
            'jurado_titular_concursos' => $memoria->jurado_titular_concursos,
            'jurado_titular_concursos_detalle' => $memoria->jurado_titular_concursos_detalle,
            'designado_jurado_suplente_concursos' => $memoria->designado_jurado_suplente_concursos,
            'designado_jurado_suplente_concursos_detalle' => $memoria->designado_jurado_suplente_concursos_detalle,
            'participo_armado_aula_virtual' => $memoria->participo_armado_aula_virtual,
            'participo_elaboracion_propuesta_innovadora' => $memoria->participo_elaboracion_propuesta_innovadora,
            'participo_elaboracion_propuesta_innovadora_detalle' => $memoria->participo_elaboracion_propuesta_innovadora_detalle,
            'elaboro_material_didactico' => $memoria->elaboro_material_didactico,
            'elaboro_material_didactico_detalle' => $memoria->elaboro_material_didactico_detalle,
            'participo_dictado_cursos' => $memoria->participo_dictado_cursos,
            'participo_dictado_cursos_detalle' => $memoria->participo_dictado_cursos_detalle,
            'formo_parte_comite_carrera_posgrado' => $memoria->formo_parte_comite_carrera_posgrado,
            'formo_parte_comite_carrera_posgrado_detalle' => $memoria->formo_parte_comite_carrera_posgrado_detalle,
            'docente_estable_carrera_posgrado' => $memoria->docente_estable_carrera_posgrado,
            'docente_estable_carrera_posgrado_detalle' => $memoria->docente_estable_carrera_posgrado_detalle,
            'participo_supervision_tesis_posgrado' => $memoria->participo_supervision_tesis_posgrado,
            'participo_supervision_tesis_posgrado_detalle' => $memoria->participo_supervision_tesis_posgrado_detalle,
            'jurado_tesis_grado' => $memoria->jurado_tesis_grado,
            'jurado_tesis_grado_detalle' => $memoria->jurado_tesis_grado_detalle,
            'coordino_curso_posgrado' => $memoria->coordino_curso_posgrado,
            'coordino_curso_posgrado_detalle' => $memoria->coordino_curso_posgrado_detalle,
            'dicto_cursos_profesional' => $memoria->dicto_cursos_profesional,
            'dicto_cursos_profesional_detalle' => $memoria->dicto_cursos_profesional_detalle,
            'otras_actividades_posgrado' => $memoria->otras_actividades_posgrado,
            'dirigio_tesinas_grado' => $memoria->dirigio_tesinas_grado,
            'dirigio_tesinas_grado_detalle' => $memoria->dirigio_tesinas_grado_detalle,
            'dirigio_pps' => $memoria->dirigio_pps,
            'dirigio_pps_detalle' => $memoria->dirigio_pps_detalle,
            'dirigio_frh_estudiantiles' => $memoria->dirigio_frh_estudiantiles,
            'dirigio_frh_estudiantiles_detalle' => $memoria->dirigio_frh_estudiantiles_detalle,
            'dirigio_frh_profesionales' => $memoria->dirigio_frh_profesionales,
            'dirigio_frh_profesionales_detalle' => $memoria->dirigio_frh_profesionales_detalle,
            'dirigio_pasantias_estudiantes' => $memoria->dirigio_pasantias_estudiantes,
            'dirigio_pasantias_estudiantes_detalle' => $memoria->dirigio_pasantias_estudiantes_detalle,
            'dirigio_pasantias_investigacion' => $memoria->dirigio_pasantias_investigacion,
            'dirigio_pasantias_investigacion_detalle' => $memoria->dirigio_pasantias_investigacion_detalle,
            'dirigio_becas' => $memoria->dirigio_becas,
            'dirigio_becas_detalle' => $memoria->dirigio_becas_detalle,
            'participo_otra_actividad_frh' => $memoria->participo_otra_actividad_frh,
            'participo_otra_actividad_frh_detalle' => $memoria->participo_otra_actividad_frh_detalle,
            'dirige_proyectos_investigacion' => $memoria->dirige_proyectos_investigacion,
            'dirige_proyectos_investigacion_detalle' => $memoria->dirige_proyectos_investigacion_detalle,
            'participa_investigador' => $memoria->participa_investigador,
            'participa_investigador_detalle' => $memoria->participa_investigador_detalle,
            'categoria_incentivo' => $memoria->categoria_incentivo,
            'miembro_conicet' => $memoria->miembro_conicet,
            'miembro_conicet_detalle' => $memoria->miembro_conicet_detalle,
            'parte_instituto_investigacion' => $memoria->parte_instituto_investigacion,
            'parte_instituto_investigacion_detalle' => $memoria->parte_instituto_investigacion_detalle,
            'recibio_premio_investigacion' => $memoria->recibio_premio_investigacion,
            'recibio_premio_investigacion_detalle' => $memoria->recibio_premio_investigacion_detalle,
            'realiazo_viajes_investigacion' => $memoria->realiazo_viajes_investigacion,
            'realiazo_viajes_investigacion_detalle' => $memoria->realiazo_viajes_investigacion_detalle,
            'participo_congresos_cientifica' => $memoria->participo_congresos_cientifica,
            'participo_congresos_cientifica_detalle' => $memoria->participo_congresos_cientifica_detalle,
            'mensione_produccion_cientifica' => $memoria->mensione_produccion_cientifica,
            'actividades_investigacion_relevante' => $memoria->actividades_investigacion_relevante,
            'miembro_consejo_directivo' => $memoria->miembro_consejo_directivo,
            'miembro_consejo_directivo_detalle' => $memoria->miembro_consejo_directivo,
            'estamento_consejo_directivo_id' => $memoria->estamento_consejo_directivo_id,
            'miembro_consejo_posgrado' => $memoria->miembro_consejo_posgrado,
            'miembro_consejo_departamento' => $memoria->miembro_consejo_departamento,
            'miembro_consejo_departamento_detalle' => $memoria->miembro_consejo_departamento_detalle,
            'represento_facultad' => $memoria->represento_facultad,
            'represento_facultad_detalle' => $memoria->represento_facultad_detalle,
            'miembro_comisiones_institucionales' => $memoria->miembro_comisiones_institucionales,
            'miembro_comisiones_institucionales_detalle' => $memoria->miembro_comisiones_institucionales_detalle,
            'participo_organizacion_eventos_cientificos' => $memoria->participo_organizacion_eventos_cientificos,
            'participo_organizacion_eventos_cientificos_detalle' => $memoria->participo_organizacion_eventos_cientificos_detalle,
            'participo_cargos_directivos' => $memoria->participo_cargos_directivos,
            'participo_cargos_directivos_detalle' => $memoria->participo_cargos_directivos_detalle,
            'dicto_charlas_conferencias' => $memoria->dicto_charlas_conferencias,
            'dicto_charlas_conferencias_detalle' => $memoria->dicto_charlas_conferencias_detalle,
            'participo_asesoramiento_cientifico' => $memoria->participo_asesoramiento_cientifico,
            'participo_asesoramiento_cientifico_detalle' => $memoria->participo_asesoramiento_cientifico_detalle,
            'elaboro_materiales_extension' => $memoria->elaboro_materiales_extension,
            'elaboro_materiales_extension_detalle' => $memoria->elaboro_materiales_extension_detalle,
            'participo_difusion_carreras' => $memoria->participo_difusion_carreras,
            'participo_difusion_carreras_detalle' => $memoria->participo_difusion_carreras_detalle,
            'participo_tarea_extension' => $memoria->participo_tarea_extension,
            'participo_tarea_extension_detalle' => $memoria->participo_tarea_extension_detalle,
            'realizo_prestacion_servicios' => $memoria->realizo_prestacion_servicios,
            'realizo_prestacion_servicios_detalle' => $memoria->realizo_prestacion_servicios_detalle,
            'realizo_infromes_tecnicos_empresas' => $memoria->realizo_infromes_tecnicos_empresas,
            'realizo_infromes_tecnicos_empresas_detalle' => $memoria->realizo_infromes_tecnicos_empresas_detalle,
            'tomo_cursos_posgrado' => $memoria->tomo_cursos_posgrado,
            'tomo_cursos_posgrado_detalle' => $memoria->tomo_cursos_posgrado_detalle,
            'curso_carrera_posgrado' => $memoria->curso_carrera_posgrado,
            'curso_carrera_posgrado_detalle' => $memoria->curso_carrera_posgrado_detalle,
            'realizo_trayecto_academico' => $memoria->realizo_trayecto_academico,
            'realizo_trayecto_academico_detalle' => $memoria->realizo_trayecto_academico_detalle,
            'obtuvo_beca_formacion_profesional' => $memoria->obtuvo_beca_formacion_profesional,
            'obtuvo_beca_formacion_profesional_detalle' => $memoria->obtuvo_beca_formacion_profesional_detalle,
            'observaciones' => $memoria->observaciones
        ];

        $this->memoria_id = $memoria->id;
        //dd($this->form);
        $this->cargos = Cargo::get();
        $this->dedicaciones = Dedicacion::get();
        $this->situacioncargo = SituacionCargo::get();


    }

    public function render()
    {
        return view('livewire.memoria.edit');
    }

    public function updated($propertyName, $value)
    {
        //dd(str_replace("form.","",$propertyName)."-".$value);
        $this->validateOnly($propertyName);
        $this->memoria->update([str_replace("form.","",$propertyName) => $value]);
        $this->form[$propertyName] = $value;
    }

    public function OnPresentar()
    {
        $this->memoria->update([
            "estado_id" => 2,
            "presentado_at" => Carbon::now()->timestamp
        ]);
        $this->form["estado_id"] = 2;

        //Notificar por mail
        //$gestores = User::role('gestor')->get();

        /*
        Mail::to($gestores)
            ->queue(new MailNotificarPresentado($this->memoria));

        Mail::to([env("MAIL_NOTIFICAR")])
            ->queue(new MailNotificarPresentado($this->memoria));

        Mail::to(Auth::user())
            ->queue(new MailNotificarPresentado($this->memoria));
        */

        session()->flash('message', 'Memoria presentada!');

        redirect()->to('memoria/'.$this->memoria->id);
    }
}
