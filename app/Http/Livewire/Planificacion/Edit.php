<?php

namespace App\Http\Livewire\Planificacion;

use App\Mail\MailNotificarPresentado;
use Livewire\Component;
use Carbon\Carbon;

use App\Models\Docente;
use App\Models\Planificacion;
use App\Models\TipoAsignatura;
use App\Models\Modalidad;
use App\Models\User;
use Livewire\WithFileUploads;
use Mail;

class Edit extends Component
{
    use WithFileUploads;

    public $file;
    public $planificacion;
    public $docentes = [];
    public $docetnesDictado = [];
    public $tipoAsignatura = [];
    public $modalidad = [];

    public $planificacion_id = null;
    public $cargaHorariaSemanal = 0;

    protected $rules = [
        'form.carga_horaria' => 'required|numeric|min:1',
    ];

    public function mount($planificacion)
    {
        //$this->planificacion = $planificacion;
        $this->planificacion_id = $planificacion->id;
        $this->planificacion = $planificacion;
        $this->form = [
            'user_id'=> $planificacion->user_id,
            'periodo_lectivo_id'=> $planificacion->periodo_lectivo_id,
            'docente_id'=> $planificacion->docente_id,
            'materia_plan_estudio_id'=> $planificacion->materia_plan_estudio_id,
            'electiva_nombre'=> $planificacion->electiva_nombre,
            'doc_invitados'=> $planificacion->doc_invitados,
            'tipo_asignatura_id'=> $planificacion->tipo_asignatura_id,
            'carga_horaria'=> $planificacion->carga_horaria,
            'modalidad_dictado_teoriacas_id'=> $planificacion->modalidad_dictado_teoriacas_id,
            'modalidad_dictado_practicas_id'=> $planificacion->modalidad_dictado_practicas_id,
            'carga_horaria_semanal_practica'=> $planificacion->carga_horaria_semanal_practica,
            'carga_horaria_semanal_practica_teorica'=> $planificacion->carga_horaria_semanal_practica_teorica,
            'carga_horaria_semanal_teorica'=> $planificacion->carga_horaria_semanal_teorica,
            'cantidad_parciales'=> $planificacion->cantidad_parciales,
            'modalidad_parciales_id'=> $planificacion->modalidad_parciales_id,
            'salida_campo'=> $planificacion->salida_campo,
            'salida_campo_cantidad'=> $planificacion->salida_campo_cantidad,
            'salida_campo_conjuntas'=> $planificacion->salida_campo_conjuntassalida_campo_conjuntas,
            'salida_campo_catedras'=> $planificacion->salida_campo_catedras,
            'actividades_conjuntas'=> $planificacion->actividades_conjuntas,
            'actividades_conjuntas_catedras'=> $planificacion->actividades_conjuntas_catedras,
            'actividades_conjuntas_tipo'=> $planificacion->actividades_conjuntas_tipo,
            'actividades_complementarias'=> $planificacion->actividades_complementarias,
            'actividades_complementarias_tipo'=> $planificacion->actividades_complementarias_tipo,
            'aula_virtual'=> $planificacion->aula_virtual,
            'aula_virtual_complemento_dictado'=> $planificacion->aula_virtual_complemento_dictado,
            'herramientas_virtuales'=> $planificacion->herramientas_virtuales,
            'herramientas_virtuales_previstas'=> $planificacion->herramientas_virtuales_previstas,
            'necesidades'=> $planificacion->necesidades,
            'observacioens_sugerencias'=> $planificacion->observacioens_sugerencias,
            'urlprograma' => $planificacion->urlprograma
        ];
        //dd($this->planificacion);

        $this->docentes = Docente::get();
        $this->tipoAsignatura = TipoAsignatura::get();
        $this->modalidades = Modalidad::get();

        $this->CalcularCargaHorariaSemanal();

    }

    public function render()
    {
        return view('livewire.planificacion.edit');
    }

    public function updated($propertyName, $value)
    {
        $this->validateOnly($propertyName);
        $this->planificacion->update([str_replace("form.","",$propertyName) => $value]);
        $this->form[$propertyName] = $value;

        if($propertyName == "form.carga_horaria_semanal_practica" || $propertyName == "form.carga_horaria_semanal_practica_teorica" || $propertyName == "form.carga_horaria_semanal_teorica")
        {
            $this->CalcularCargaHorariaSemanal();
        }
    }

    public function CalcularCargaHorariaSemanal()
    {
        $this->cargaHorariaSemanal = $this->planificacion->carga_horaria_semanal_practica + $this->planificacion->carga_horaria_semanal_practica_teorica + $this->planificacion->carga_horaria_semanal_teorica;
    }

    public function OnPresentar()
    {
        //dd($this->file);

        if($this->form['urlprograma'] == null || $this->file !=null)
        {
            $this->validate([
                'file' => 'required|mimes:pdf|max:10240', // 1MB Max
            ]);

            $urlFile = $this->file->storePubliclyAs('programas','planificacion_'.$this->planificacion_id.'.pdf');

            $this->planificacion->update([
                "urlprograma" => $urlFile
            ]);
        }




        $this->planificacion->update([
            "estado_id" => 2,
            "presentado_at" => Carbon::now()->timestamp
        ]);
        $this->form["estado_id"] = 2;



        //Notificar por mail
        $gestores = User::role('gestor')->get();

        Mail::to($gestores)
            ->queue(new MailNotificarPresentado($this->planificacion));



        session()->flash('message', 'Planificación presentada!');

        redirect()->to('planificacion/'.$this->planificacion->id);
    }
}