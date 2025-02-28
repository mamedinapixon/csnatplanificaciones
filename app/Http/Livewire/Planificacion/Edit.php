<?php

namespace App\Http\Livewire\Planificacion;

use App\Mail\MailNotificarPresentado;
use Livewire\Component;
use Carbon\Carbon;

use App\Models\Docente;
use App\Models\Cargo;
use App\Models\Dedicacion;
use App\Models\SituacionCargo;
use App\Models\Planificacion;
use App\Models\TipoAsignatura;
use App\Models\Modalidad;
use App\Models\User;
use App\Models\DocentePlanificacion;
use Livewire\WithFileUploads;
use Mail;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Http;

class Edit extends Component
{
    use WithFileUploads;

    public $file;
    public $planificacion;
    public $docentes = [];
    public $cargos = [];
    public $dedicaciones = [];
    public $situaciones = [];
    public $docetnesDictado = [];
    public $tipoAsignatura = [];
    public $modalidad = [];
    public $es_electiva = false;

    public $planificacion_id = null;
    public $cargaHorariaSemanal = 0;

    protected $rules = [
        'form.carga_horaria' => 'required|numeric|min:1',
        'form.correo_responsable_viaje' => 'required|email',
    ];

    public function mount($planificacion)
    {
        //$this->planificacion = $planificacion;
        $this->planificacion_id = $planificacion->id;
        $this->planificacion = $planificacion;
        $this->form = [
            'user_id' => $planificacion->user_id,
            'periodo_lectivo_id' => $planificacion->periodo_lectivo_id,
            'docente_id' => $planificacion->docente_id,
            'cargo_id' => $planificacion->cargo_id,
            'dedicacion_id' => $planificacion->dedicacion_id,
            'situacion_cargo_id' => $planificacion->situacion_cargo_id,
            'materia_plan_estudio_id' => $planificacion->materia_plan_estudio_id,
            'electiva_nombre' => $planificacion->electiva_nombre,
            'auxiliar_docente_estudiantil' => $planificacion->auxiliar_docente_estudiantil,
            'auxiliar_docente_estudiantil_detalle' => $planificacion->auxiliar_docente_estudiantil_detalle,
            'formacion_recurso_humano' => $planificacion->formacion_recurso_humano,
            'formacion_recurso_humano_detalle' => $planificacion->formacion_recurso_humano_detalle,
            'doc_invitados' => $planificacion->doc_invitados,
            'doc_invitados_detalles' => $planificacion->doc_invitados_detalles,
            'tipo_asignatura_id' => $planificacion->tipo_asignatura_id,
            'carga_horaria' => $planificacion->carga_horaria,
            'modalidad_dictado_teoriacas_id' => $planificacion->modalidad_dictado_teoriacas_id,
            'modalidad_dictado_practicas_id' => $planificacion->modalidad_dictado_practicas_id,
            'carga_horaria_semanal_practica' => $planificacion->carga_horaria_semanal_practica,
            'carga_horaria_semanal_practica_teorica' => $planificacion->carga_horaria_semanal_practica_teorica,
            'carga_horaria_semanal_teorica' => $planificacion->carga_horaria_semanal_teorica,
            'practicos_aprobacion_abligatoria' => $planificacion->practicos_aprobacion_abligatoria,
            'practicos_aprobacion_abligatoria_detalle' => $planificacion->practicos_aprobacion_abligatoria_detalle,
            'cantidad_parciales' => $planificacion->cantidad_parciales,
            'modalidad_parciales_id' => $planificacion->modalidad_parciales_id,
            'salida_campo' => $planificacion->salida_campo,
            'correo_responsable_viaje' => $planificacion->correo_responsable_viaje,
            'salida_campo_cantidad' => $planificacion->salida_campo_cantidad,
            'salida_campo_conjuntas' => $planificacion->salida_campo_conjuntas,
            'salida_campo_catedras' => $planificacion->salida_campo_catedras,
            'actividades_conjuntas' => $planificacion->actividades_conjuntas,
            'actividades_conjuntas_catedras' => $planificacion->actividades_conjuntas_catedras,
            'actividades_conjuntas_tipo' => $planificacion->actividades_conjuntas_tipo,
            'actividades_complementarias' => $planificacion->actividades_complementarias,
            'actividades_complementarias_tipo' => $planificacion->actividades_complementarias_tipo,
            'aula_virtual' => $planificacion->aula_virtual,
            'aula_virtual_complemento_dictado' => $planificacion->aula_virtual_complemento_dictado,
            'herramientas_virtuales' => $planificacion->herramientas_virtuales,
            'herramientas_virtuales_previstas' => $planificacion->herramientas_virtuales_previstas,
            'necesidades' => $planificacion->necesidades,
            'observacioens_sugerencias' => $planificacion->observacioens_sugerencias,
            'urlprograma' => $planificacion->urlprograma
        ];
        //dd($this->planificacion);

        $this->docentes = Docente::orderBy("apellido")->orderBy('nombre')->get();
        $this->tipoAsignatura = TipoAsignatura::get();
        $this->modalidades = Modalidad::get();

        $this->cargos = Cargo::Get();
        $this->dedicaciones = Dedicacion::Get();
        $this->situaciones = SituacionCargo::Get();

        $this->es_electiva = $this->planificacion->materiaPlanEstudio->materia->tipo_materia == "G" ? true : false;

        $this->CalcularCargaHorariaSemanal();
    }

    public function render()
    {
        return view('livewire.planificacion.edit');
    }

    public function updated($propertyName, $value)
    {

        $this->validateOnly($propertyName);


        if ($propertyName == "form.docente_id") {

            $docente = DocentePlanificacion::where("planificacion_id", $this->planificacion_id)
                ->where("docente_id", $value)
                ->first();
            //dd($docente);
            if ($docente != null) {
                $this->addError('form.docente_id', 'El docente ya existe en la tabla "Resto del plantel docente de la Asignatura"');
                //$docente = Planificacion::select('docente_id')->where('id',$this->planificacion_id)->fist();
                $this->form["docente_id"] = $this->planificacion->docente_id;
                return;
            }
        }

        $this->planificacion->update([str_replace("form.", "", $propertyName) => $value]);
        $this->form[$propertyName] = $value;

        if ($propertyName == "form.carga_horaria_semanal_practica" || $propertyName == "form.carga_horaria_semanal_practica_teorica" || $propertyName == "form.carga_horaria_semanal_teorica") {
            $this->CalcularCargaHorariaSemanal();
        }
    }

    public function CalcularCargaHorariaSemanal()
    {
        $this->cargaHorariaSemanal = $this->planificacion->carga_horaria_semanal_practica + $this->planificacion->carga_horaria_semanal_practica_teorica + $this->planificacion->carga_horaria_semanal_teorica;
    }

    public function OnPresentar()
    {
        // Validación y manejo del archivo subido
        if ($this->form['urlprograma'] == null || $this->file != null) {
            $this->validate([
                'file' => 'required|mimes:pdf|max:10240', // 10MB Max
            ]);

            $urlFile = $this->file->storePubliclyAs('programas', 'planificacion_' . $this->planificacion_id . '.pdf');

            $this->planificacion->update([
                "urlprograma" => $urlFile
            ]);
        }

        // Actualizar estado de la planificación
        $this->planificacion->update([
            "estado_id" => 2,
            "presentado_at" => Carbon::now()->timestamp
        ]);
        $this->form["estado_id"] = 2;

        // Generar PDF usando el método del controlador
        $controller = app()->make(\App\Http\Controllers\PlanificacionController::class);
        $pdfResponse = $controller->generarPdf($this->planificacion);

        $pdfPath = null;
        if ($this->es_electiva) {
            // Guardar el PDF temporalmente
            $tempPdfPath = storage_path('app/public/temp/');
            if (!file_exists($tempPdfPath)) {
                mkdir($tempPdfPath, 0755, true);
            }
            $pdfFileName = 'planificacion_' . $this->planificacion_id . '_' . time() . '.pdf';
            $pdfPath = $tempPdfPath . $pdfFileName;

            // Obtener el contenido del PDF desde la respuesta
            $pdfContent = $pdfResponse->getContent();
            file_put_contents($pdfPath, $pdfContent);
        }

        // Notificar por mail
        $gestores = User::role('gestor')->get();

        // Obtener la ruta completa del archivo urlprograma
        $urlProgramaPath = null;
        if ($this->planificacion->urlprograma) {
            $urlProgramaPath = storage_path('app/' . $this->planificacion->urlprograma);
        }

        // Enviar el correo con ambos archivos adjuntos
        if ($this->es_electiva) {
            Mail::to([
                config('notificar.mail_planificaciones'),
                config('notificar.mail_mesa_entrada'),
                Auth::user()->email
            ])
                ->queue(new MailNotificarPresentado($this->planificacion, $pdfPath, $urlProgramaPath));
        } else {
            Mail::to([
                config('notificar.mail_planificaciones'),
                Auth::user()->email
            ])
                ->queue(new MailNotificarPresentado($this->planificacion, $pdfPath, $urlProgramaPath));
        }

        session()->flash('message', 'Planificación presentada!');

        return redirect()->to('planificacion/' . $this->planificacion->id);
    }
}
