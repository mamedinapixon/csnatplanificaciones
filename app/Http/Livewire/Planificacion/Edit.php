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
use App\Models\Unidad;
use App\Models\Tema;
use App\Models\Competencia;
use Livewire\WithFileUploads;
use Mail;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

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
    public $competencias = [];

    public $planificacion_id = null;
    public $cargaHorariaSemanal = 0;
    public $unidadesTemas = [];
    public $modoEdicion = []; // Array para controlar qué unidades están en modo edición

    protected $rules = [
        'form.carga_horaria' => 'required|numeric|min:1',
        'form.correo_responsable_viaje' => 'required|email',
    ];

    public function mount($planificacion)
    {
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

        $this->docentes = Docente::orderBy("apellido")->orderBy('nombre')->get();
        $this->tipoAsignatura = TipoAsignatura::get();
        $this->modalidades = Modalidad::get();

        $this->cargos = Cargo::Get();
        $this->dedicaciones = Dedicacion::Get();
        $this->situaciones = SituacionCargo::Get();

        $this->competencias = Competencia::orderBy('nombre')->get();

        $this->es_electiva = $this->planificacion->materiaPlanEstudio->materia->tipo_materia == "G" ? true : false;

        // Cargar unidades y temas existentes desde las tablas relacionadas
        $this->unidadesTemas = [];
        try {
            $unidades = $planificacion->unidades()->with('temas.competencias')->get();

            foreach ($unidades as $unidad) {
                $temasArray = [];
                foreach ($unidad->temas as $tema) {
                    $temasArray[] = [
                        'id' => $tema->id,
                        'nombre' => $tema->nombre,
                        'detalle' => $tema->detalle,
                        'competencias' => !empty($tema->competencias->pluck('id')->toArray()) ? [$tema->competencias->pluck('id')->toArray()[0]] : [null]
                    ];
                }

                $this->unidadesTemas[] = [
                    'id' => $unidad->id,
                    'numero' => $unidad->numero,
                    'titulo' => $unidad->titulo,
                    'temas' => $temasArray,
                    'guardada' => true,
                    'editando' => false // Por defecto, mostrar en vista compacta
                ];
            }
        } catch (\Exception $e) {
            // Si las tablas no existen aún, inicializar vacío
            $this->unidadesTemas = [];
        }

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

    public function agregarUnidad()
    {
        // Calcular el próximo número de unidad basado en las unidades guardadas en BD
        $maxNumero = Unidad::where('planificacion_id', $this->planificacion_id)->max('numero') ?? 0;
        $nuevoNumero = $maxNumero + 1;

        // Agregar al final del array (debajo de las unidades existentes)
        array_push($this->unidadesTemas, [
            'numero' => $nuevoNumero,
            'titulo' => '',
            'temas' => []
        ]);

        // No reordenar los números - mantener la numeración correcta basada en BD
        // El número correcto ya se calculó desde la base de datos
    }

    public function guardarUnidad($unidadIndex)
    {
        // Guardar unidad individualmente en la base de datos
        $unidadData = $this->unidadesTemas[$unidadIndex];

        if (!empty($unidadData['titulo'])) {
            if (isset($unidadData['id']) && $unidadData['id']) {
                // Actualizar unidad existente
                $unidad = Unidad::find($unidadData['id']);
                if ($unidad) {
                    $unidad->update([
                        'numero' => $unidadData['numero'],
                        'titulo' => $unidadData['titulo']
                    ]);
                }
            } else {
                // Crear nueva unidad
                $unidad = Unidad::create([
                    'planificacion_id' => $this->planificacion_id,
                    'numero' => $unidadData['numero'],
                    'titulo' => $unidadData['titulo']
                ]);
                $this->unidadesTemas[$unidadIndex]['id'] = $unidad->id;
            }

            // Guardar temas para esta unidad
            if (isset($unidadData['temas']) && is_array($unidadData['temas'])) {
                foreach ($unidadData['temas'] as $temaIndex => $temaData) {
                    if (!empty($temaData['nombre'])) {
                        if (isset($temaData['id']) && $temaData['id']) {
                            // Actualizar tema existente
                            $tema = Tema::find($temaData['id']);
                            if ($tema) {
                                $tema->update([
                                    'nombre' => $temaData['nombre'],
                                    'detalle' => $temaData['detalle'] ?? null
                                ]);

                                // Actualizar competencias para el tema (solo una competencia)
                                if (isset($temaData['competencias']) && is_array($temaData['competencias']) && !empty($temaData['competencias'][0])) {
                                    $tema->competencias()->sync([$temaData['competencias'][0]]);
                                } else {
                                    $tema->competencias()->detach();
                                }
                            }
                        } else {
                            // Crear nuevo tema
                            $tema = Tema::create([
                                'unidad_id' => $unidad->id,
                                'nombre' => $temaData['nombre'],
                                'detalle' => $temaData['detalle'] ?? null
                            ]);
                            $this->unidadesTemas[$unidadIndex]['temas'][$temaIndex]['id'] = $tema->id;

                            // Guardar competencias para el tema (solo una competencia)
                            if (isset($temaData['competencias']) && is_array($temaData['competencias']) && !empty($temaData['competencias'][0])) {
                                $tema->competencias()->sync([$temaData['competencias'][0]]);
                            }
                        }
                    }
                }
            }

            $this->unidadesTemas[$unidadIndex]['guardada'] = true;
            $this->unidadesTemas[$unidadIndex]['editando'] = false; // Cambiar a vista compacta después de guardar
            session()->flash('unidad_guardada', true);
        }
    }


    public function quitarUnidad($index)
    {
        $unidadData = $this->unidadesTemas[$index];

        // Si la unidad existe en BD, eliminarla
        if (isset($unidadData['id']) && $unidadData['id']) {
            $unidad = Unidad::find($unidadData['id']);
            if ($unidad) {
                $unidad->delete();
            }
        }

        unset($this->unidadesTemas[$index]);
        $this->unidadesTemas = array_values($this->unidadesTemas);

        // Reordenar números
        foreach ($this->unidadesTemas as $i => &$unidad) {
            $unidad['numero'] = $i + 1;
            if (isset($unidad['id']) && $unidad['id']) {
                Unidad::where('id', $unidad['id'])->update(['numero' => $unidad['numero']]);
            }
        }

        session()->flash('unidad_eliminada', true);
    }

    public function agregarTema($unidadIndex)
    {
        // Agregar al final del array de temas
        array_push($this->unidadesTemas[$unidadIndex]['temas'], [
            'nombre' => '',
            'detalle' => '',
            'competencias' => [null]
        ]);
    }

    public function quitarTema($unidadIndex, $temaIndex)
    {
        $temaData = $this->unidadesTemas[$unidadIndex]['temas'][$temaIndex];

        // Si el tema existe en BD, eliminarlo
        if (isset($temaData['id']) && $temaData['id']) {
            $tema = Tema::find($temaData['id']);
            if ($tema) {
                $tema->delete();
            }
        }

        unset($this->unidadesTemas[$unidadIndex]['temas'][$temaIndex]);
        $this->unidadesTemas[$unidadIndex]['temas'] = array_values($this->unidadesTemas[$unidadIndex]['temas']);
    }

    public function editarUnidad($unidadIndex)
    {
        $this->unidadesTemas[$unidadIndex]['editando'] = true;
    }

    public function cancelarEdicion($unidadIndex)
    {
        $this->unidadesTemas[$unidadIndex]['editando'] = false;
        // Limpiar mensaje si existe
        if (isset($this->unidadesTemas[$unidadIndex]['mensaje'])) {
            unset($this->unidadesTemas[$unidadIndex]['mensaje']);
        }
        // Recargar datos desde BD para deshacer cambios no guardados
        if (isset($this->unidadesTemas[$unidadIndex]['id'])) {
            $unidad = Unidad::with('temas.competencias')->find($this->unidadesTemas[$unidadIndex]['id']);
            if ($unidad) {
                $temasArray = [];
                foreach ($unidad->temas as $tema) {
                    $competenciasIds = $tema->competencias->pluck('id')->toArray();
                    $temasArray[] = [
                        'id' => $tema->id,
                        'nombre' => $tema->nombre,
                        'detalle' => $tema->detalle,
                        'competencias' => !empty($competenciasIds) ? [$competenciasIds[0]] : [null]
                    ];
                }
                $this->unidadesTemas[$unidadIndex] = [
                    'id' => $unidad->id,
                    'numero' => $unidad->numero,
                    'titulo' => $unidad->titulo,
                    'temas' => $temasArray,
                    'guardada' => true,
                    'editando' => false
                ];
            }
        }
    }

    private function guardarUnidadesYTemas()
    {
        // Eliminar unidades y temas existentes para esta planificación
        $this->planificacion->unidades()->delete();

        // Guardar nuevas unidades y temas
        foreach ($this->unidadesTemas as $unidadData) {
            if (!empty($unidadData['titulo'])) {
                $unidad = Unidad::create([
                    'planificacion_id' => $this->planificacion_id,
                    'numero' => $unidadData['numero'],
                    'titulo' => $unidadData['titulo']
                ]);

                // Guardar temas para esta unidad
                if (isset($unidadData['temas']) && is_array($unidadData['temas'])) {
                    foreach ($unidadData['temas'] as $temaData) {
                        if (!empty($temaData['nombre'])) {
                            $tema = Tema::create([
                                'unidad_id' => $unidad->id,
                                'nombre' => $temaData['nombre'],
                                'detalle' => $temaData['detalle'] ?? null
                            ]);

                            // Guardar competencias para el tema (solo una competencia)
                            if (isset($temaData['competencias']) && is_array($temaData['competencias']) && !empty($temaData['competencias'][0])) {
                                $tema->competencias()->sync([$temaData['competencias'][0]]);
                            }
                        }
                    }
                }
            }
        }
    }

    public function OnPresentar()
    {
        // Guardar unidades y temas en tablas separadas
        $this->guardarUnidadesYTemas();

        // Generar PDF automáticamente
        $controller = app()->make(\App\Http\Controllers\PlanificacionController::class);
        $pdfResponse = $controller->generarPdf($this->planificacion);

        // Guardar el PDF generado
        $pdfContent = $pdfResponse->getContent();
        $urlFile = 'programas/planificacion_' . $this->planificacion_id . '.pdf';

        // Crear directorio si no existe
        $directory = dirname(storage_path('app/public/' . $urlFile));
        if (!file_exists($directory)) {
            mkdir($directory, 0755, true);
        }

        Storage::disk('public')->put($urlFile, $pdfContent);

        // Verificar que el archivo se guardó correctamente
        if (!Storage::disk('public')->exists($urlFile)) {
            throw new \Exception('Error al guardar el archivo PDF');
        }

        $this->planificacion->update([
            "urlprograma" => $urlFile
        ]);

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
