<?php

namespace App\Http\Livewire\Planificacion;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

use App\Models\Planificacion;

class PlanificacionTable extends DataTableComponent
{
    //protected $model = Planificacion::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setTableRowUrl(function($row) {
                return route('planificacion.edit', $row);
            });
    }

    public function builder(): Builder
    {
        $planificacion = Planificacion::query()
        ->with("materiaPlanEstudio.materia","materiaPlanEstudio.carrera","docenteCargo","periodoLectivo","periodoLectivo.periodoAcademico");
        //dd($planificacion->get());
        return $planificacion;
        /*
        return User::query()
        ->with() // Eager load anything
        ->join() // Join some tables
        ->select(); // Select some things
        */
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")->sortable(),
            Column::make("Anio Academico", "periodoLectivo.anio_academico")->sortable(),
            Column::make("Periodo", "periodoLectivo.periodoAcademico.nombre")->sortable(),
            Column::make("Carrera", "materiaPlanEstudio.carrera.nombre_reducido")->sortable(),
            Column::make("Asignatura", "materiaPlanEstudio.materia.nombre")->sortable(),

        ];
        /*
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("User id", "user_id")
                ->sortable(),
            Column::make("Periodo lectivo id", "periodo_lectivo_id")
                ->sortable(),
            Column::make("Docente id", "docente_id")
                ->sortable(),
            Column::make("Materia plan estudio id", "materia_plan_estudio_id")
                ->sortable(),
            Column::make("Electiva nombre", "electiva_nombre")
                ->sortable(),
            Column::make("Doc invitados", "doc_invitados")
                ->sortable(),
            Column::make("Tipo asignatura id", "tipo_asignatura_id")
                ->sortable(),
            Column::make("Carga horaria", "carga_horaria")
                ->sortable(),
            Column::make("Modalidad dictado teoriacas id", "modalidad_dictado_teoriacas_id")
                ->sortable(),
            Column::make("Modalidad dictado practicas id", "modalidad_dictado_practicas_id")
                ->sortable(),
            Column::make("Carga horaria semanal practica", "carga_horaria_semanal_practica")
                ->sortable(),
            Column::make("Carga horaria semanal practica teorica", "carga_horaria_semanal_practica_teorica")
                ->sortable(),
            Column::make("Carga horaria semanal teorica", "carga_horaria_semanal_teorica")
                ->sortable(),
            Column::make("Cantidad parciales", "cantidad_parciales")
                ->sortable(),
            Column::make("Modalidad parciales id", "modalidad_parciales_id")
                ->sortable(),
            Column::make("Salida campo", "salida_campo")
                ->sortable(),
            Column::make("Salida campo cantidad", "salida_campo_cantidad")
                ->sortable(),
            Column::make("Salida campo conjuntas", "salida_campo_conjuntas")
                ->sortable(),
            Column::make("Salida campo catedras", "salida_campo_catedras")
                ->sortable(),
            Column::make("Actividades conjuntas", "actividades_conjuntas")
                ->sortable(),
            Column::make("Actividades conjuntas catedras", "actividades_conjuntas_catedras")
                ->sortable(),
            Column::make("Actividades conjuntas tipo", "actividades_conjuntas_tipo")
                ->sortable(),
            Column::make("Actividades complementarias", "actividades_complementarias")
                ->sortable(),
            Column::make("Actividades complementarias tipo", "actividades_complementarias_tipo")
                ->sortable(),
            Column::make("Aula virtual", "aula_virtual")
                ->sortable(),
            Column::make("Aula virtual complemento dictado", "aula_virtual_complemento_dictado")
                ->sortable(),
            Column::make("Herramientas virtuales", "herramientas_virtuales")
                ->sortable(),
            Column::make("Herramientas virtuales previstas", "herramientas_virtuales_previstas")
                ->sortable(),
            Column::make("Necesidades", "necesidades")
                ->sortable(),
            Column::make("Observacioens sugerencias", "observacioens_sugerencias")
                ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),
        ];
        */
    }

}
