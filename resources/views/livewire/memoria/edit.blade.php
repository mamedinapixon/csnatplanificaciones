<div class="space-y-4 ">

    <x-pixonui.show.labeltext caption="Apellido y Nombre">{{ $memoria->user->name }}</x-pixonui.show.labeltext>
    <x-pixonui.show.labeltext caption="E-mail">{{ $memoria->user->email }}</x-pixonui.show.labeltext>
    <x-pixonui.show.labeltext caption="Año academico">{{ $memoria->anio_academico }}</x-pixonui.show.labeltext>

    <div class="w-full form-control">
        <x-pixonui.form.label>Cargo</x-pixonui.form.label>
        <div class="flex items-center space-x-2">
            <x-pixonui.form.select  wire:model="form.cargo_id" :items="$cargos" value="id" caption="nombre"></x-pixonui.form.select>
            <x-pixonui.wire.loading.spinner wire:target="form.cargo_id"></x-pixonui.wire.loading.spinner>
        </div>
    </div>

    <div class="w-full form-control">
        <x-pixonui.form.label>Dedicación docente</x-pixonui.form.label>
        <div class="flex items-center space-x-2">
            <x-pixonui.form.select  wire:model="form.dedicacion_id" :items="$dedicaciones" value="id" caption="nombre"></x-pixonui.form.select>
            <x-pixonui.wire.loading.spinner wire:target="form.dedicacion_id"></x-pixonui.wire.loading.spinner>
        </div>
    </div>

    <div class="w-full form-control">
        <x-pixonui.form.label>Situación en el cargo</x-pixonui.form.label>
        <div class="flex items-center space-x-2">
            <x-pixonui.form.select  wire:model="form.situacion_cargo_id" :items="$situacioncargo" value="id" caption="nombre"></x-pixonui.form.select>
            <x-pixonui.wire.loading.spinner wire:target="form.situacion_cargo_id"></x-pixonui.wire.loading.spinner>
        </div>
    </div>

    <livewire:memoria.tbl-asignatura :memoria_id='' :tipo_docente='' :memoria_id="$memoria_id" tipo_docente="Estable" />
    <livewire:memoria.tbl-asignatura :memoria_id='' :tipo_docente='' :memoria_id="$memoria_id" tipo_docente="Invitado" label="Asignaturas en la que partición como Docente invitado" />

    <div class=" form-control">
        <x-pixonui.form.label>Dictó Cursos y/o Cursillos de grado</x-pixonui.form.label>
        <div class="flex items-center space-x-2">
            <x-pixonui.form.checkbox id="toggle-dicto_cursos_grado" wire:model="form.dicto_cursos_grado"></x-pixonui.form.checkbox>
            <x-pixonui.wire.loading.spinner wire:target="form.dicto_cursos_grado"></x-pixonui.wire.loading.spinner>
        </div>
    </div>
    @if ($form['dicto_cursos_grado'])
        <div class="w-full form-control">
            <x-pixonui.form.label>Detalle el/los mismos</x-pixonui.form.label>
            <x-pixonui.wire.quill wire:model="form.dicto_cursos_grado_detalle" ref="dicto_cursos_grado_detalle"></x-pixonui.wire.quill>
            <x-pixonui.wire.loading.spinner wire:target="form.dicto_cursos_grado_detalle"></x-pixonui.wire.loading.spinner>
            <x-pixonui.form.error for="form.dicto_cursos_grado_detalle"></x-pixonui.form.error>
        </div>
    @endif

    <div class=" form-control">
        <x-pixonui.form.label>¿Participó como jurado Titular en Tesinas, Seminarios y/o PPS?</x-pixonui.form.label>
        <div class="flex items-center space-x-2">
            <x-pixonui.form.checkbox id="toggle-participo_jurado_titular" wire:model="form.participo_jurado_titular"></x-pixonui.form.checkbox>
            <x-pixonui.wire.loading.spinner wire:target="form.participo_jurado_titular"></x-pixonui.wire.loading.spinner>
        </div>
    </div>
    @if ($form['participo_jurado_titular'])
        <div class="w-full form-control">
            <x-pixonui.form.label>Especifique los datos: Cantidad, tesistas, fechas etc.</x-pixonui.form.label>
            <x-pixonui.wire.quill wire:model="form.participo_jurado_titular_detalle" ref="participo_jurado_titular_detalle"></x-pixonui.wire.quill>
            <x-pixonui.wire.loading.spinner wire:target="form.participo_jurado_titular_detalle"></x-pixonui.wire.loading.spinner>
            <x-pixonui.form.error for="form.participo_jurado_titular_detalle"></x-pixonui.form.error>
        </div>
    @endif

    <div class=" form-control">
        <x-pixonui.form.label>¿Fue designado jurado Suplente en Tesinas, Seminarios y/o PPS?</x-pixonui.form.label>
        <div class="flex items-center space-x-2">
            <x-pixonui.form.checkbox id="toggle-designado_jurado_suplente" wire:model="form.designado_jurado_suplente"></x-pixonui.form.checkbox>
            <x-pixonui.wire.loading.spinner wire:target="form.designado_jurado_suplente"></x-pixonui.wire.loading.spinner>
        </div>
    </div>
    @if ($form['designado_jurado_suplente'])
        <div class="w-full form-control">
            <x-pixonui.form.label>Especifique: Cantidad, tesistas, fechas etc.</x-pixonui.form.label>
            <x-pixonui.wire.quill wire:model="form.designado_jurado_suplente_detalle" ref="designado_jurado_suplente_detalle"></x-pixonui.wire.quill>
            <x-pixonui.wire.loading.spinner wire:target="form.designado_jurado_suplente_detalle"></x-pixonui.wire.loading.spinner>
            <x-pixonui.form.error for="form.designado_jurado_suplente_detalle"></x-pixonui.form.error>
        </div>
    @endif

    <div class=" form-control">
        <x-pixonui.form.label>¿Participó como Jurado Titular en Concursos Docentes y/o Evaluaciones Académicas?</x-pixonui.form.label>
        <div class="flex items-center space-x-2">
            <x-pixonui.form.checkbox id="toggle-jurado_titular_concursos" wire:model="form.jurado_titular_concursos"></x-pixonui.form.checkbox>
            <x-pixonui.wire.loading.spinner wire:target="form.jurado_titular_concursos"></x-pixonui.wire.loading.spinner>
        </div>
    </div>
    @if ($form['jurado_titular_concursos'])
        <div class="w-full form-control">
            <x-pixonui.form.label>Indique en cuales:</x-pixonui.form.label>
            <x-pixonui.wire.quill wire:model="form.jurado_titular_concursos_detalle" ref="jurado_titular_concursos_detalle"></x-pixonui.wire.quill>
            <x-pixonui.wire.loading.spinner wire:target="form.jurado_titular_concursos_detalle"></x-pixonui.wire.loading.spinner>
            <x-pixonui.form.error for="form.jurado_titular_concursos_detalle"></x-pixonui.form.error>
        </div>
    @endif

    <div class=" form-control">
        <x-pixonui.form.label>¿Fue designado como Jurado Suplente en Concursos Docentes y/o Evaluaciones Académicas?</x-pixonui.form.label>
        <div class="flex items-center space-x-2">
            <x-pixonui.form.checkbox id="toggle-designado_jurado_suplente_concursos" wire:model="form.designado_jurado_suplente_concursos"></x-pixonui.form.checkbox>
            <x-pixonui.wire.loading.spinner wire:target="form.designado_jurado_suplente_concursos"></x-pixonui.wire.loading.spinner>
        </div>
    </div>
    @if ($form['designado_jurado_suplente_concursos'])
        <div class="w-full form-control">
            <x-pixonui.form.label>Indique en cuáles</x-pixonui.form.label>
            <x-pixonui.wire.quill wire:model="form.designado_jurado_suplente_concursos_detalle" ref="designado_jurado_suplente_concursos_detalle"></x-pixonui.wire.quill>
            <x-pixonui.wire.loading.spinner wire:target="form.designado_jurado_suplente_concursos_detalle"></x-pixonui.wire.loading.spinner>
            <x-pixonui.form.error for="form.designado_jurado_suplente_concursos_detalle"></x-pixonui.form.error>
        </div>
    @endif

    <div class=" form-control">
        <x-pixonui.form.label>¿Participó en el armado y/o actualización del aula virtual de su/s asignatura/s?</x-pixonui.form.label>
        <div class="flex items-center space-x-2">
            <x-pixonui.form.checkbox id="toggle-participo_armado_aula_virtual" wire:model="form.participo_armado_aula_virtual"></x-pixonui.form.checkbox>
            <x-pixonui.wire.loading.spinner wire:target="form.participo_armado_aula_virtual"></x-pixonui.wire.loading.spinner>
        </div>
    </div>

    <div class=" form-control">
        <x-pixonui.form.label>¿Participó en la elaboración de alguna propuesta innovadora en su actividad docente?</x-pixonui.form.label>
        <div class="flex items-center space-x-2">
            <x-pixonui.form.checkbox id="toggle-participo_elaboracion_propuesta_innovadora" wire:model="form.participo_elaboracion_propuesta_innovadora"></x-pixonui.form.checkbox>
            <x-pixonui.wire.loading.spinner wire:target="form.participo_elaboracion_propuesta_innovadora"></x-pixonui.wire.loading.spinner>
        </div>
    </div>
    @if ($form['participo_elaboracion_propuesta_innovadora'])
        <div class="w-full form-control">
            <x-pixonui.form.label>Indique en cual:</x-pixonui.form.label>
            <x-pixonui.wire.quill wire:model="form.participo_elaboracion_propuesta_innovadora_detalle" ref="participo_elaboracion_propuesta_innovadora_detalle"></x-pixonui.wire.quill>
            <x-pixonui.wire.loading.spinner wire:target="form.participo_elaboracion_propuesta_innovadora_detalle"></x-pixonui.wire.loading.spinner>
            <x-pixonui.form.error for="form.participo_elaboracion_propuesta_innovadora_detalle"></x-pixonui.form.error>
        </div>
    @endif

    <div class=" form-control">
        <x-pixonui.form.label>Elaboró o actualizó material Didáctico o Publicaciones docentes para su/s asignatura/s?</x-pixonui.form.label>
        <div class="flex items-center space-x-2">
            <x-pixonui.form.checkbox id="toggle-elaboro_material_didactico" wire:model="form.elaboro_material_didactico"></x-pixonui.form.checkbox>
            <x-pixonui.wire.loading.spinner wire:target="form.elaboro_material_didactico"></x-pixonui.wire.loading.spinner>
        </div>
    </div>
    @if ($form['elaboro_material_didactico'])
        <div class="w-full form-control">
            <x-pixonui.form.label>Indique en cual/es</x-pixonui.form.label>
            <x-pixonui.wire.quill wire:model="form.elaboro_material_didactico_detalle" ref="elaboro_material_didactico_detalle"></x-pixonui.wire.quill>
            <x-pixonui.wire.loading.spinner wire:target="form.elaboro_material_didactico_detalle"></x-pixonui.wire.loading.spinner>
            <x-pixonui.form.error for="form.elaboro_material_didactico_detalle"></x-pixonui.form.error>
        </div>
    @endif

    <div class=" form-control">
        <x-pixonui.form.label>¿Participó en el dictado de Cursos de Posgrado?</x-pixonui.form.label>
        <div class="flex items-center space-x-2">
            <x-pixonui.form.checkbox id="toggle-participo_dictado_cursos" wire:model="form.participo_dictado_cursos"></x-pixonui.form.checkbox>
            <x-pixonui.wire.loading.spinner wire:target="form.participo_dictado_cursos"></x-pixonui.wire.loading.spinner>
        </div>
    </div>
    @if ($form['participo_dictado_cursos'])
        <div class="w-full form-control">
            <x-pixonui.form.label>Indique en cual/es:</x-pixonui.form.label>
            <x-pixonui.wire.quill wire:model="form.participo_dictado_cursos_detalle" ref="participo_dictado_cursos_detalle"></x-pixonui.wire.quill>
            <x-pixonui.wire.loading.spinner wire:target="form.participo_dictado_cursos_detalle"></x-pixonui.wire.loading.spinner>
            <x-pixonui.form.error for="form.participo_dictado_cursos_detalle"></x-pixonui.form.error>
        </div>
    @endif

    <div class=" form-control">
        <x-pixonui.form.label>¿Formó parte de la Dirección y/o Comité Académico de alguna/s Carrera/s de Posgrado?</x-pixonui.form.label>
        <div class="flex items-center space-x-2">
            <x-pixonui.form.checkbox id="toggle-formo_parte_comite_carrera_posgrado" wire:model="form.formo_parte_comite_carrera_posgrado"></x-pixonui.form.checkbox>
            <x-pixonui.wire.loading.spinner wire:target="form.formo_parte_comite_carrera_posgrado"></x-pixonui.wire.loading.spinner>
        </div>
    </div>
    @if ($form['formo_parte_comite_carrera_posgrado'])
        <div class="w-full form-control">
            <x-pixonui.form.label>Indique en cual/es y su función</x-pixonui.form.label>
            <x-pixonui.wire.quill wire:model="form.formo_parte_comite_carrera_posgrado_detalle" ref="formo_parte_comite_carrera_posgrado_detalle"></x-pixonui.wire.quill>
            <x-pixonui.wire.loading.spinner wire:target="form.formo_parte_comite_carrera_posgrado_detalle"></x-pixonui.wire.loading.spinner>
            <x-pixonui.form.error for="form.formo_parte_comite_carrera_posgrado_detalle"></x-pixonui.form.error>
        </div>
    @endif

    <div class=" form-control">
        <x-pixonui.form.label>¿Es Docente Estable de alguna/s Carrera/s de Posgrado?</x-pixonui.form.label>
        <div class="flex items-center space-x-2">
            <x-pixonui.form.checkbox id="toggle-docente_estable_carrera_posgrado" wire:model="form.docente_estable_carrera_posgrado"></x-pixonui.form.checkbox>
            <x-pixonui.wire.loading.spinner wire:target="form.docente_estable_carrera_posgrado"></x-pixonui.wire.loading.spinner>
        </div>
    </div>
    @if ($form['docente_estable_carrera_posgrado'])
        <div class="w-full form-control">
            <x-pixonui.form.label>Indique en cual/es</x-pixonui.form.label>
            <x-pixonui.wire.quill wire:model="form.docente_estable_carrera_posgrado_detalle" ref="docente_estable_carrera_posgrado_detalle"></x-pixonui.wire.quill>
            <x-pixonui.wire.loading.spinner wire:target="form.docente_estable_carrera_posgrado_detalle"></x-pixonui.wire.loading.spinner>
            <x-pixonui.form.error for="form.docente_estable_carrera_posgrado_detalle"></x-pixonui.form.error>
        </div>
    @endif

    <div class=" form-control">
        <x-pixonui.form.label>¿Participó de Alguna/s Comisión/es de Supervisión de Tesis de Posgrado?</x-pixonui.form.label>
        <div class="flex items-center space-x-2">
            <x-pixonui.form.checkbox id="toggle-participo_supervision_tesis_posgrado" wire:model="form.participo_supervision_tesis_posgrado"></x-pixonui.form.checkbox>
            <x-pixonui.wire.loading.spinner wire:target="form.participo_supervision_tesis_posgrado"></x-pixonui.wire.loading.spinner>
        </div>
    </div>
    @if ($form['participo_supervision_tesis_posgrado'])
        <div class="w-full form-control">
            <x-pixonui.form.label>Indique en cual/es</x-pixonui.form.label>
            <x-pixonui.wire.quill wire:model="form.participo_supervision_tesis_posgrado_detalle" ref="participo_supervision_tesis_posgrado_detalle"></x-pixonui.wire.quill>
            <x-pixonui.wire.loading.spinner wire:target="form.participo_supervision_tesis_posgrado_detalle"></x-pixonui.wire.loading.spinner>
            <x-pixonui.form.error for="form.participo_supervision_tesis_posgrado_detalle"></x-pixonui.form.error>
        </div>
    @endif

    <div class=" form-control">
        <x-pixonui.form.label>¿Fue Jurado Titular y/o Suplente de alguna/s tesis de Posgrado?</x-pixonui.form.label>
        <div class="flex items-center space-x-2">
            <x-pixonui.form.checkbox id="toggle-jurado_tesis_grado" wire:model="form.jurado_tesis_grado"></x-pixonui.form.checkbox>
            <x-pixonui.wire.loading.spinner wire:target="form.jurado_tesis_grado"></x-pixonui.wire.loading.spinner>
        </div>
    </div>
    @if ($form['jurado_tesis_grado'])
        <div class="w-full form-control">
            <x-pixonui.form.label>Indique en cual/es</x-pixonui.form.label>
            <x-pixonui.wire.quill wire:model="form.jurado_tesis_grado_detalle" ref="jurado_tesis_grado_detalle"></x-pixonui.wire.quill>
            <x-pixonui.wire.loading.spinner wire:target="form.jurado_tesis_grado_detalle"></x-pixonui.wire.loading.spinner>
            <x-pixonui.form.error for="form.jurado_tesis_grado_detalle"></x-pixonui.form.error>
        </div>
    @endif

    <div class=" form-control">
        <x-pixonui.form.label>¿Coordinó algún/s Curso/s de Posgrado?</x-pixonui.form.label>
        <div class="flex items-center space-x-2">
            <x-pixonui.form.checkbox id="toggle-coordino_curso_posgrado" wire:model="form.coordino_curso_posgrado"></x-pixonui.form.checkbox>
            <x-pixonui.wire.loading.spinner wire:target="form.coordino_curso_posgrado"></x-pixonui.wire.loading.spinner>
        </div>
    </div>
    @if ($form['coordino_curso_posgrado'])
        <div class="w-full form-control">
            <x-pixonui.form.label>Indique cuantos y en cual/es</x-pixonui.form.label>
            <x-pixonui.wire.quill wire:model="form.coordino_curso_posgrado_detalle" ref="coordino_curso_posgrado_detalle"></x-pixonui.wire.quill>
            <x-pixonui.wire.loading.spinner wire:target="form.coordino_curso_posgrado_detalle"></x-pixonui.wire.loading.spinner>
            <x-pixonui.form.error for="form.coordino_curso_posgrado_detalle"></x-pixonui.form.error>
        </div>
    @endif

    <div class=" form-control">
        <x-pixonui.form.label>¿Dictó Cursos de Extensión y/o Capacitación Profesional?</x-pixonui.form.label>
        <div class="flex items-center space-x-2">
            <x-pixonui.form.checkbox id="toggle-dicto_cursos_profesional" wire:model="form.dicto_cursos_profesional"></x-pixonui.form.checkbox>
            <x-pixonui.wire.loading.spinner wire:target="form.dicto_cursos_profesional"></x-pixonui.wire.loading.spinner>
        </div>
    </div>
    @if ($form['dicto_cursos_profesional'])
        <div class="w-full form-control">
            <x-pixonui.form.label>Indique en cual/es:</x-pixonui.form.label>
            <x-pixonui.wire.quill wire:model="form.dicto_cursos_profesional_detalle" ref="dicto_cursos_profesional_detalle"></x-pixonui.wire.quill>
            <x-pixonui.wire.loading.spinner wire:target="form.dicto_cursos_profesional_detalle"></x-pixonui.wire.loading.spinner>
            <x-pixonui.form.error for="form.dicto_cursos_profesional_detalle"></x-pixonui.form.error>
        </div>
    @endif

    <div class="w-full form-control">
        <x-pixonui.form.label>¿Otras actividades de posgrado llevadas a cabo en el año? Completar</x-pixonui.form.label>
        <x-pixonui.wire.quill wire:model="form.otras_actividades_posgrado" ref="otras_actividades_posgrado"></x-pixonui.wire.quill>
        <x-pixonui.wire.loading.spinner wire:target="form.otras_actividades_posgrado"></x-pixonui.wire.loading.spinner>
        <x-pixonui.form.error for="form.otras_actividades_posgrado"></x-pixonui.form.error>
    </div>


    <div class=" form-control">
        <x-pixonui.form.label>¿Dirigió Tesinas de Grado?</x-pixonui.form.label>
        <div class="flex items-center space-x-2">
            <x-pixonui.form.checkbox id="toggle-dirigio_tesinas_grado" wire:model="form.dirigio_tesinas_grado"></x-pixonui.form.checkbox>
            <x-pixonui.wire.loading.spinner wire:target="form.dirigio_tesinas_grado"></x-pixonui.wire.loading.spinner>
        </div>
    </div>
    @if ($form['dirigio_tesinas_grado'])
        <div class="w-full form-control">
            <x-pixonui.form.label>Indique cantidad, tesistas, temas, etc.</x-pixonui.form.label>
            <x-pixonui.wire.quill wire:model="form.dirigio_tesinas_grado_detalle" ref="dirigio_tesinas_grado_detalle"></x-pixonui.wire.quill>
            <x-pixonui.wire.loading.spinner wire:target="form.dirigio_tesinas_grado_detalle"></x-pixonui.wire.loading.spinner>
            <x-pixonui.form.error for="form.dirigio_tesinas_grado_detalle"></x-pixonui.form.error>
        </div>
    @endif

    <div class=" form-control">
        <x-pixonui.form.label>¿Dirigió Prácticas Profesionales Supervisadas (PPS)?</x-pixonui.form.label>
        <div class="flex items-center space-x-2">
            <x-pixonui.form.checkbox id="toggle-dirigio_pps" wire:model="form.dirigio_pps"></x-pixonui.form.checkbox>
            <x-pixonui.wire.loading.spinner wire:target="form.dirigio_pps"></x-pixonui.wire.loading.spinner>
        </div>
    </div>
    @if ($form['dirigio_pps'])
        <div class="w-full form-control">
            <x-pixonui.form.label>Indique alumnos, temas, etc.</x-pixonui.form.label>
            <x-pixonui.wire.quill wire:model="form.dirigio_pps_detalle" ref="dirigio_pps_detalle"></x-pixonui.wire.quill>
            <x-pixonui.wire.loading.spinner wire:target="form.dirigio_pps_detalle"></x-pixonui.wire.loading.spinner>
            <x-pixonui.form.error for="form.dirigio_pps_detalle"></x-pixonui.form.error>
        </div>
    @endif

    <div class=" form-control">
        <x-pixonui.form.label>¿Dirigió FRH estudiantiles?</x-pixonui.form.label>
        <div class="flex items-center space-x-2">
            <x-pixonui.form.checkbox id="toggle-dirigio_frh_estudiantiles" wire:model="form.dirigio_frh_estudiantiles"></x-pixonui.form.checkbox>
            <x-pixonui.wire.loading.spinner wire:target="form.dirigio_frh_estudiantiles"></x-pixonui.wire.loading.spinner>
        </div>
    </div>
    @if ($form['dirigio_frh_estudiantiles'])
        <div class="w-full form-control">
            <x-pixonui.form.label>Indique alumno/s, período, etc.</x-pixonui.form.label>
            <x-pixonui.wire.quill wire:model="form.dirigio_frh_estudiantiles_detalle" ref="dirigio_frh_estudiantiles_detalle"></x-pixonui.wire.quill>
            <x-pixonui.wire.loading.spinner wire:target="form.dirigio_frh_estudiantiles_detalle"></x-pixonui.wire.loading.spinner>
            <x-pixonui.form.error for="form.dirigio_frh_estudiantiles_detalle"></x-pixonui.form.error>
        </div>
    @endif

    <div class=" form-control">
        <x-pixonui.form.label>¿Dirigió FRH Profesionales?</x-pixonui.form.label>
        <div class="flex items-center space-x-2">
            <x-pixonui.form.checkbox id="toggle-dirigio_frh_profesionales" wire:model="form.dirigio_frh_profesionales"></x-pixonui.form.checkbox>
            <x-pixonui.wire.loading.spinner wire:target="form.dirigio_frh_profesionales"></x-pixonui.wire.loading.spinner>
        </div>
    </div>
    @if ($form['dirigio_frh_profesionales'])
        <div class="w-full form-control">
            <x-pixonui.form.label>Indique profesional/es, temas, etc.</x-pixonui.form.label>
            <x-pixonui.wire.quill wire:model="form.dirigio_frh_profesionales_detalle" ref="dirigio_frh_profesionales_detalle"></x-pixonui.wire.quill>
            <x-pixonui.wire.loading.spinner wire:target="form.dirigio_frh_profesionales_detalle"></x-pixonui.wire.loading.spinner>
            <x-pixonui.form.error for="form.dirigio_frh_profesionales_detalle"></x-pixonui.form.error>
        </div>
    @endif

    <div class=" form-control">
        <x-pixonui.form.label>¿Dirigió pasantías de estudiantes de grado?</x-pixonui.form.label>
        <div class="flex items-center space-x-2">
            <x-pixonui.form.checkbox id="toggle-dirigio_pasantias_estudiantes" wire:model="form.dirigio_pasantias_estudiantes"></x-pixonui.form.checkbox>
            <x-pixonui.wire.loading.spinner wire:target="form.dirigio_pasantias_estudiantes"></x-pixonui.wire.loading.spinner>
        </div>
    </div>
    @if ($form['dirigio_pasantias_estudiantes'])
        <div class="w-full form-control">
            <x-pixonui.form.label>Indique alumno/s, tema/s, duración, etc.</x-pixonui.form.label>
            <x-pixonui.wire.quill wire:model="form.dirigio_pasantias_estudiantes_detalle" ref="dirigio_pasantias_estudiantes_detalle"></x-pixonui.wire.quill>
            <x-pixonui.wire.loading.spinner wire:target="form.dirigio_pasantias_estudiantes_detalle"></x-pixonui.wire.loading.spinner>
            <x-pixonui.form.error for="form.dirigio_pasantias_estudiantes_detalle"></x-pixonui.form.error>
        </div>
    @endif

    <div class=" form-control">
        <x-pixonui.form.label>¿Dirigió pasantías de investigación de estudiantes de Posgrado?</x-pixonui.form.label>
        <div class="flex items-center space-x-2">
            <x-pixonui.form.checkbox id="toggle-dirigio_pasantias_investigacion" wire:model="form.dirigio_pasantias_investigacion"></x-pixonui.form.checkbox>
            <x-pixonui.wire.loading.spinner wire:target="form.dirigio_pasantias_investigacion"></x-pixonui.wire.loading.spinner>
        </div>
    </div>
    @if ($form['dirigio_pasantias_investigacion'])
        <div class="w-full form-control">
            <x-pixonui.form.label>Indique: estudiante, tema, duración, etc.</x-pixonui.form.label>
            <x-pixonui.wire.quill wire:model="form.dirigio_pasantias_investigacion_detalle" ref="dirigio_pasantias_investigacion_detalle"></x-pixonui.wire.quill>
            <x-pixonui.wire.loading.spinner wire:target="form.dirigio_pasantias_investigacion_detalle"></x-pixonui.wire.loading.spinner>
            <x-pixonui.form.error for="form.dirigio_pasantias_investigacion_detalle"></x-pixonui.form.error>
        </div>
    @endif

    <div class=" form-control">
        <x-pixonui.form.label>¿Dirigió Becas de Investigación de estudiantes de grado y/o posgrado?</x-pixonui.form.label>
        <div class="flex items-center space-x-2">
            <x-pixonui.form.checkbox id="toggle-dirigio_becas" wire:model="form.dirigio_becas"></x-pixonui.form.checkbox>
            <x-pixonui.wire.loading.spinner wire:target="form.dirigio_becas"></x-pixonui.wire.loading.spinner>
        </div>
    </div>
    @if ($form['dirigio_becas'])
        <div class="w-full form-control">
            <x-pixonui.form.label>Indique: estudiante, tema, duración, entidad otorgante de la beca, etc.</x-pixonui.form.label>
            <x-pixonui.wire.quill wire:model="form.dirigio_becas_detalle" ref="dirigio_becas_detalle"></x-pixonui.wire.quill>
            <x-pixonui.wire.loading.spinner wire:target="form.dirigio_becas_detalle"></x-pixonui.wire.loading.spinner>
            <x-pixonui.form.error for="form.dirigio_becas_detalle"></x-pixonui.form.error>
        </div>
    @endif

    <div class=" form-control">
        <x-pixonui.form.label>¿Participó en alguna otra actividad relacionada con la FRH?.</x-pixonui.form.label>
        <div class="flex items-center space-x-2">
            <x-pixonui.form.checkbox id="toggle-participo_otra_actividad_frh" wire:model="form.participo_otra_actividad_frh"></x-pixonui.form.checkbox>
            <x-pixonui.wire.loading.spinner wire:target="form.participo_otra_actividad_frh"></x-pixonui.wire.loading.spinner>
        </div>
    </div>
    @if ($form['participo_otra_actividad_frh'])
        <div class="w-full form-control">
            <x-pixonui.form.label>Explique</x-pixonui.form.label>
            <x-pixonui.wire.quill wire:model="form.participo_otra_actividad_frh_detalle" ref="participo_otra_actividad_frh_detalle"></x-pixonui.wire.quill>
            <x-pixonui.wire.loading.spinner wire:target="form.participo_otra_actividad_frh_detalle"></x-pixonui.wire.loading.spinner>
            <x-pixonui.form.error for="form.participo_otra_actividad_frh_detalle"></x-pixonui.form.error>
        </div>
    @endif

    <div class=" form-control">
        <x-pixonui.form.label>Dirige y/o Co Dirige Proyectos o Programas de Investigación?</x-pixonui.form.label>
        <div class="flex items-center space-x-2">
            <x-pixonui.form.checkbox id="toggle-dirige_proyectos_investigacion" wire:model="form.dirige_proyectos_investigacion"></x-pixonui.form.checkbox>
            <x-pixonui.wire.loading.spinner wire:target="form.dirige_proyectos_investigacion"></x-pixonui.wire.loading.spinner>
        </div>
    </div>
    @if ($form['dirige_proyectos_investigacion'])
        <div class="w-full form-control">
            <x-pixonui.form.label>Indique cuál/es, cargo, nombre del proyecto y/o programa, Entidad Financiadora del mismo, integrantes, etc.</x-pixonui.form.label>
            <x-pixonui.wire.quill wire:model="form.dirige_proyectos_investigacion_detalle" ref="dirige_proyectos_investigacion_detalle"></x-pixonui.wire.quill>
            <x-pixonui.wire.loading.spinner wire:target="form.dirige_proyectos_investigacion_detalle"></x-pixonui.wire.loading.spinner>
            <x-pixonui.form.error for="form.dirige_proyectos_investigacion_detalle"></x-pixonui.form.error>
        </div>
    @endif

    <div class=" form-control">
        <x-pixonui.form.label>Participa como investigador en algún/os Proyectos o Programas de Investigación?</x-pixonui.form.label>
        <div class="flex items-center space-x-2">
            <x-pixonui.form.checkbox id="toggle-participa_investigador" wire:model="form.participa_investigador"></x-pixonui.form.checkbox>
            <x-pixonui.wire.loading.spinner wire:target="form.participa_investigador"></x-pixonui.wire.loading.spinner>
        </div>
    </div>
    @if ($form['participa_investigador'])
        <div class="w-full form-control">
            <x-pixonui.form.label>Indique cuál/es, nombre del proyecto y/o programa, Director, Co Director, Entidad Financiadora del mismo, etc.</x-pixonui.form.label>
            <x-pixonui.wire.quill wire:model="form.participa_investigador_detalle" ref="participa_investigador_detalle"></x-pixonui.wire.quill>
            <x-pixonui.wire.loading.spinner wire:target="form.participa_investigador_detalle"></x-pixonui.wire.loading.spinner>
            <x-pixonui.form.error for="form.participa_investigador_detalle"></x-pixonui.form.error>
        </div>
    @endif

    <div class="w-full form-control">
        <x-pixonui.form.label>¿Cuál es su Categoría de Incentivo? I, II, III, IV, V</x-pixonui.form.label>
        <x-pixonui.wire.quill wire:model="form.categoria_incentivo" ref="categoria_incentivo"></x-pixonui.wire.quill>
        <x-pixonui.wire.loading.spinner wire:target="form.categoria_incentivo"></x-pixonui.wire.loading.spinner>
        <x-pixonui.form.error for="form.categoria_incentivo"></x-pixonui.form.error>
    </div>

    <div class=" form-control">
        <x-pixonui.form.label>¿Es Miembro del CONICET?</x-pixonui.form.label>
        <div class="flex items-center space-x-2">
            <x-pixonui.form.checkbox id="toggle-miembro_conicet" wire:model="form.miembro_conicet"></x-pixonui.form.checkbox>
            <x-pixonui.wire.loading.spinner wire:target="form.miembro_conicet"></x-pixonui.wire.loading.spinner>
        </div>
    </div>
    @if ($form['miembro_conicet'])
        <div class="w-full form-control">
            <x-pixonui.form.label>Indique su Categoría</x-pixonui.form.label>
            <x-pixonui.wire.quill wire:model="form.miembro_conicet_detalle" ref="miembro_conicet_detalle"></x-pixonui.wire.quill>
            <x-pixonui.wire.loading.spinner wire:target="form.miembro_conicet_detalle"></x-pixonui.wire.loading.spinner>
            <x-pixonui.form.error for="form.miembro_conicet_detalle"></x-pixonui.form.error>
        </div>
    @endif

    <div class=" form-control">
        <x-pixonui.form.label>¿Forma parte de Algún Instituto o Grupo de Investigación?</x-pixonui.form.label>
        <div class="flex items-center space-x-2">
            <x-pixonui.form.checkbox id="toggle-parte_instituto_investigacion" wire:model="form.parte_instituto_investigacion"></x-pixonui.form.checkbox>
            <x-pixonui.wire.loading.spinner wire:target="form.parte_instituto_investigacion"></x-pixonui.wire.loading.spinner>
        </div>
    </div>
    @if ($form['parte_instituto_investigacion'])
        <div class="w-full form-control">
            <x-pixonui.form.label>Indique cual y su función en el mismo</x-pixonui.form.label>
            <x-pixonui.wire.quill wire:model="form.parte_instituto_investigacion_detalle" ref="parte_instituto_investigacion_detalle"></x-pixonui.wire.quill>
            <x-pixonui.wire.loading.spinner wire:target="form.parte_instituto_investigacion_detalle"></x-pixonui.wire.loading.spinner>
            <x-pixonui.form.error for="form.parte_instituto_investigacion_detalle"></x-pixonui.form.error>
        </div>
    @endif

    <div class=" form-control">
        <x-pixonui.form.label>¿Recibió algún premio y/o mención en Investigación?</x-pixonui.form.label>
        <div class="flex items-center space-x-2">
            <x-pixonui.form.checkbox id="toggle-recibio_premio_investigacion" wire:model="form.recibio_premio_investigacion"></x-pixonui.form.checkbox>
            <x-pixonui.wire.loading.spinner wire:target="form.recibio_premio_investigacion"></x-pixonui.wire.loading.spinner>
        </div>
    </div>
    @if ($form['recibio_premio_investigacion'])
        <div class="w-full form-control">
            <x-pixonui.form.label>Indique cual/es</x-pixonui.form.label>
            <x-pixonui.wire.quill wire:model="form.recibio_premio_investigacion_detalle" ref="recibio_premio_investigacion_detalle"></x-pixonui.wire.quill>
            <x-pixonui.wire.loading.spinner wire:target="form.recibio_premio_investigacion_detalle"></x-pixonui.wire.loading.spinner>
            <x-pixonui.form.error for="form.recibio_premio_investigacion_detalle"></x-pixonui.form.error>
        </div>
    @endif

    <div class=" form-control">
        <x-pixonui.form.label>¿Ha realizado viajes de Investigación?</x-pixonui.form.label>
        <div class="flex items-center space-x-2">
            <x-pixonui.form.checkbox id="toggle-realiazo_viajes_investigacion" wire:model="form.realiazo_viajes_investigacion"></x-pixonui.form.checkbox>
            <x-pixonui.wire.loading.spinner wire:target="form.realiazo_viajes_investigacion"></x-pixonui.wire.loading.spinner>
        </div>
    </div>
    @if ($form['realiazo_viajes_investigacion'])
        <div class="w-full form-control">
            <x-pixonui.form.label>Detalle, lugares, fechas, participación de alumnos de grado y/o posgrado, etc.</x-pixonui.form.label>
            <x-pixonui.wire.quill wire:model="form.realiazo_viajes_investigacion_detalle" ref="realiazo_viajes_investigacion_detalle"></x-pixonui.wire.quill>
            <x-pixonui.wire.loading.spinner wire:target="form.realiazo_viajes_investigacion_detalle"></x-pixonui.wire.loading.spinner>
            <x-pixonui.form.error for="form.realiazo_viajes_investigacion_detalle"></x-pixonui.form.error>
        </div>
    @endif

    <div class=" form-control">
        <x-pixonui.form.label>¿Participó en Congresos, jornadas, talleres, seminarios u otra reunión científica?</x-pixonui.form.label>
        <div class="flex items-center space-x-2">
            <x-pixonui.form.checkbox id="toggle-participo_congresos_cientifica" wire:model="form.participo_congresos_cientifica"></x-pixonui.form.checkbox>
            <x-pixonui.wire.loading.spinner wire:target="form.participo_congresos_cientifica"></x-pixonui.wire.loading.spinner>
        </div>
    </div>
    @if ($form['participo_congresos_cientifica'])
        <div class="w-full form-control">
            <x-pixonui.form.label>En Caso Positivo, detalle en cual/es, lugares, tipo de participación etc.</x-pixonui.form.label>
            <x-pixonui.wire.quill wire:model="form.participo_congresos_cientifica_detalle" ref="participo_congresos_cientifica_detalle"></x-pixonui.wire.quill>
            <x-pixonui.wire.loading.spinner wire:target="form.participo_congresos_cientifica_detalle"></x-pixonui.wire.loading.spinner>
            <x-pixonui.form.error for="form.participo_congresos_cientifica_detalle"></x-pixonui.form.error>
        </div>
    @endif

    <div class="w-full form-control">
        <x-pixonui.form.label>Mencione su producción Científica del presente año (publicaciones, trabajos presentados, informes, otros)…..Espacio para completar</x-pixonui.form.label>
        <x-pixonui.wire.quill wire:model="form.mensione_produccion_cientifica" ref="mensione_produccion_cientifica"></x-pixonui.wire.quill>
        <x-pixonui.wire.loading.spinner wire:target="form.mensione_produccion_cientifica"></x-pixonui.wire.loading.spinner>
        <x-pixonui.form.error for="form.mensione_produccion_cientifica"></x-pixonui.form.error>
    </div>

    <div class="w-full form-control">
        <x-pixonui.form.label>Describa otras Actividades de Investigación que considere relevante</x-pixonui.form.label>
        <x-pixonui.wire.quill wire:model="form.actividades_investigacion_relevante" ref="actividades_investigacion_relevante"></x-pixonui.wire.quill>
        <x-pixonui.wire.loading.spinner wire:target="form.actividades_investigacion_relevante"></x-pixonui.wire.loading.spinner>
        <x-pixonui.form.error for="form.actividades_investigacion_relevante"></x-pixonui.form.error>
    </div>

    <div class=" form-control">
        <x-pixonui.form.label>¿Es Miembro del Consejo Directivo de la Facultad?</x-pixonui.form.label>
        <div class="flex items-center space-x-2">
            <x-pixonui.form.checkbox id="toggle-miembro_consejo_directivo" wire:model="form.miembro_consejo_directivo"></x-pixonui.form.checkbox>
            <x-pixonui.wire.loading.spinner wire:target="form.miembro_consejo_directivo"></x-pixonui.wire.loading.spinner>
        </div>
    </div>
    @if ($form['miembro_consejo_directivo'])
        <div class="w-full form-control">
            <x-pixonui.form.label>En caso Positivo ¿a qué estamento representa? Titulares, Asociados y Adjuntos, JTP y Aux</x-pixonui.form.label>
            <div class="flex items-center space-x-2">
                <x-pixonui.form.select  wire:model="form.estamento_consejo_directivo_id" :items="$cargos" value="id" caption="nombre"></x-pixonui.form.select>
                <x-pixonui.wire.loading.spinner wire:target="form.estamento_consejo_directivo_id"></x-pixonui.wire.loading.spinner>
            </div>
        </div>
    @endif

    <div class=" form-control">
        <x-pixonui.form.label>¿Es miembro del Consejo de Posgrado de la Facultad?</x-pixonui.form.label>
        <div class="flex items-center space-x-2">
            <x-pixonui.form.checkbox id="toggle-miembro_consejo_posgrado" wire:model="form.miembro_consejo_posgrado"></x-pixonui.form.checkbox>
            <x-pixonui.wire.loading.spinner wire:target="form.miembro_consejo_posgrado"></x-pixonui.wire.loading.spinner>
        </div>
    </div>

    <div class=" form-control">
        <x-pixonui.form.label>¿Es miembro del Consejo de Departamento de su carrera?</x-pixonui.form.label>
        <div class="flex items-center space-x-2">
            <x-pixonui.form.checkbox id="toggle-miembro_consejo_departamento" wire:model="form.miembro_consejo_departamento"></x-pixonui.form.checkbox>
            <x-pixonui.wire.loading.spinner wire:target="form.miembro_consejo_departamento"></x-pixonui.wire.loading.spinner>
        </div>
    </div>
    @if ($form['miembro_consejo_departamento'])
        <div class="w-full form-control">
            <x-pixonui.form.label>Indique en cuál y ¿Cuál es su función?</x-pixonui.form.label>
            <x-pixonui.wire.quill wire:model="form.miembro_consejo_departamento_detalle" ref="miembro_consejo_departamento_detalle"></x-pixonui.wire.quill>
            <x-pixonui.wire.loading.spinner wire:target="form.miembro_consejo_departamento_detalle"></x-pixonui.wire.loading.spinner>
            <x-pixonui.form.error for="form.miembro_consejo_departamento_detalle"></x-pixonui.form.error>
        </div>
    @endif

    <div class=" form-control">
        <x-pixonui.form.label>Representó a la Facultad en otro organismo Universitario, organismo provincial y/ o nacional?</x-pixonui.form.label>
        <div class="flex items-center space-x-2">
            <x-pixonui.form.checkbox id="toggle-represento_facultad" wire:model="form.represento_facultad"></x-pixonui.form.checkbox>
            <x-pixonui.wire.loading.spinner wire:target="form.represento_facultad"></x-pixonui.wire.loading.spinner>
        </div>
    </div>
    @if ($form['represento_facultad'])
        <div class="w-full form-control">
            <x-pixonui.form.label>Indique cual/es</x-pixonui.form.label>
            <x-pixonui.wire.quill wire:model="form.represento_facultad_detalle" ref="represento_facultad_detalle"></x-pixonui.wire.quill>
            <x-pixonui.wire.loading.spinner wire:target="form.represento_facultad_detalle"></x-pixonui.wire.loading.spinner>
            <x-pixonui.form.error for="form.represento_facultad_detalle"></x-pixonui.form.error>
        </div>
    @endif

    <div class=" form-control">
        <x-pixonui.form.label>¿Es miembro de Comisiones Institucionales? </x-pixonui.form.label>
        <div class="flex items-center space-x-2">
            <x-pixonui.form.checkbox id="toggle-miembro_comisiones_institucionales" wire:model="form.miembro_comisiones_institucionales"></x-pixonui.form.checkbox>
            <x-pixonui.wire.loading.spinner wire:target="form.miembro_comisiones_institucionales"></x-pixonui.wire.loading.spinner>
        </div>
    </div>
    @if ($form['miembro_comisiones_institucionales'])
        <div class="w-full form-control">
            <x-pixonui.form.label>Indique cual/es</x-pixonui.form.label>
            <x-pixonui.wire.quill wire:model="form.miembro_comisiones_institucionales_detalle" ref="miembro_comisiones_institucionales_detalle"></x-pixonui.wire.quill>
            <x-pixonui.wire.loading.spinner wire:target="form.miembro_comisiones_institucionales_detalle"></x-pixonui.wire.loading.spinner>
            <x-pixonui.form.error for="form.miembro_comisiones_institucionales_detalle"></x-pixonui.form.error>
        </div>
    @endif

    <div class=" form-control">
        <x-pixonui.form.label>¿Participó en la organización de eventos científicos?</x-pixonui.form.label>
        <div class="flex items-center space-x-2">
            <x-pixonui.form.checkbox id="toggle-participo_organizacion_eventos_cientificos" wire:model="form.participo_organizacion_eventos_cientificos"></x-pixonui.form.checkbox>
            <x-pixonui.wire.loading.spinner wire:target="form.participo_organizacion_eventos_cientificos"></x-pixonui.wire.loading.spinner>
        </div>
    </div>
    @if ($form['participo_organizacion_eventos_cientificos'])
        <div class="w-full form-control">
            <x-pixonui.form.label>Indique cual/es</x-pixonui.form.label>
            <x-pixonui.wire.quill wire:model="form.participo_organizacion_eventos_cientificos_detalle" ref="participo_organizacion_eventos_cientificos_detalle"></x-pixonui.wire.quill>
            <x-pixonui.wire.loading.spinner wire:target="form.participo_organizacion_eventos_cientificos_detalle"></x-pixonui.wire.loading.spinner>
            <x-pixonui.form.error for="form.participo_organizacion_eventos_cientificos_detalle"></x-pixonui.form.error>
        </div>
    @endif

    <div class=" form-control">
        <x-pixonui.form.label>Participó en otros cargos directivos (Cooperadora, Colegios profesionales, etc.)</x-pixonui.form.label>
        <div class="flex items-center space-x-2">
            <x-pixonui.form.checkbox id="toggle-participo_cargos_directivos" wire:model="form.participo_cargos_directivos"></x-pixonui.form.checkbox>
            <x-pixonui.wire.loading.spinner wire:target="form.participo_cargos_directivos"></x-pixonui.wire.loading.spinner>
        </div>
    </div>
    @if ($form['participo_cargos_directivos'])
        <div class="w-full form-control">
            <x-pixonui.form.label>Indique cual/es</x-pixonui.form.label>
            <x-pixonui.wire.quill wire:model="form.participo_cargos_directivos_detalle" ref="participo_cargos_directivos_detalle"></x-pixonui.wire.quill>
            <x-pixonui.wire.loading.spinner wire:target="form.participo_cargos_directivos_detalle"></x-pixonui.wire.loading.spinner>
            <x-pixonui.form.error for="form.participo_cargos_directivos_detalle"></x-pixonui.form.error>
        </div>
    @endif

    <div class=" form-control">
        <x-pixonui.form.label>¿Dictó charlas, conferencias, disertaciones, etc.?</x-pixonui.form.label>
        <div class="flex items-center space-x-2">
            <x-pixonui.form.checkbox id="toggle-dicto_charlas_conferencias" wire:model="form.dicto_charlas_conferencias"></x-pixonui.form.checkbox>
            <x-pixonui.wire.loading.spinner wire:target="form.dicto_charlas_conferencias"></x-pixonui.wire.loading.spinner>
        </div>
    </div>
    @if ($form['dicto_charlas_conferencias'])
        <div class="w-full form-control">
            <x-pixonui.form.label>Indique cual/es</x-pixonui.form.label>
            <x-pixonui.wire.quill wire:model="form.dicto_charlas_conferencias_detalle" ref="dicto_charlas_conferencias_detalle"></x-pixonui.wire.quill>
            <x-pixonui.wire.loading.spinner wire:target="form.dicto_charlas_conferencias_detalle"></x-pixonui.wire.loading.spinner>
            <x-pixonui.form.error for="form.dicto_charlas_conferencias_detalle"></x-pixonui.form.error>
        </div>
    @endif

    <div class=" form-control">
        <x-pixonui.form.label>Participó en Actividades de Asesoramiento Científico y/o tecnológicos en diferentes organismos?</x-pixonui.form.label>
        <div class="flex items-center space-x-2">
            <x-pixonui.form.checkbox id="toggle-participo_asesoramiento_cientifico" wire:model="form.participo_asesoramiento_cientifico"></x-pixonui.form.checkbox>
            <x-pixonui.wire.loading.spinner wire:target="form.participo_asesoramiento_cientifico"></x-pixonui.wire.loading.spinner>
        </div>
    </div>
    @if ($form['participo_asesoramiento_cientifico'])
        <div class="w-full form-control">
            <x-pixonui.form.label>Indique cual/es</x-pixonui.form.label>
            <x-pixonui.wire.quill wire:model="form.participo_asesoramiento_cientifico_detalle" ref="participo_asesoramiento_cientifico_detalle"></x-pixonui.wire.quill>
            <x-pixonui.wire.loading.spinner wire:target="form.participo_asesoramiento_cientifico_detalle"></x-pixonui.wire.loading.spinner>
            <x-pixonui.form.error for="form.participo_asesoramiento_cientifico_detalle"></x-pixonui.form.error>
        </div>
    @endif

    <div class=" form-control">
        <x-pixonui.form.label>¿Elaboró y/o publicó materiales de extensión?</x-pixonui.form.label>
        <div class="flex items-center space-x-2">
            <x-pixonui.form.checkbox id="toggle-elaboro_materiales_extension" wire:model="form.elaboro_materiales_extension"></x-pixonui.form.checkbox>
            <x-pixonui.wire.loading.spinner wire:target="form.elaboro_materiales_extension"></x-pixonui.wire.loading.spinner>
        </div>
    </div>
    @if ($form['elaboro_materiales_extension'])
        <div class="w-full form-control">
            <x-pixonui.form.label>Indique cual/es</x-pixonui.form.label>
            <x-pixonui.wire.quill wire:model="form.elaboro_materiales_extension_detalle" ref="elaboro_materiales_extension_detalle"></x-pixonui.wire.quill>
            <x-pixonui.wire.loading.spinner wire:target="form.elaboro_materiales_extension_detalle"></x-pixonui.wire.loading.spinner>
            <x-pixonui.form.error for="form.elaboro_materiales_extension_detalle"></x-pixonui.form.error>
        </div>
    @endif

    <div class=" form-control">
        <x-pixonui.form.label>¿Participó en actividades de Difusión de las carreras que se dictan en la Facultad, dando charlas en escuelas, asesoramientos, etc.?</x-pixonui.form.label>
        <div class="flex items-center space-x-2">
            <x-pixonui.form.checkbox id="toggle-participo_difusion_carreras" wire:model="form.participo_difusion_carreras"></x-pixonui.form.checkbox>
            <x-pixonui.wire.loading.spinner wire:target="form.participo_difusion_carreras"></x-pixonui.wire.loading.spinner>
        </div>
    </div>
    @if ($form['participo_difusion_carreras'])
        <div class="w-full form-control">
            <x-pixonui.form.label>Indique cual/es, donde, fechas. etc.</x-pixonui.form.label>
            <x-pixonui.wire.quill wire:model="form.participo_difusion_carreras_detalle" ref="participo_difusion_carreras_detalle"></x-pixonui.wire.quill>
            <x-pixonui.wire.loading.spinner wire:target="form.participo_difusion_carreras_detalle"></x-pixonui.wire.loading.spinner>
            <x-pixonui.form.error for="form.participo_difusion_carreras_detalle"></x-pixonui.form.error>
        </div>
    @endif

    <div class=" form-control">
        <x-pixonui.form.label>Participación en alguna otra tarea de Extensión?</x-pixonui.form.label>
        <div class="flex items-center space-x-2">
            <x-pixonui.form.checkbox id="toggle-participo_tarea_extension" wire:model="form.participo_tarea_extension"></x-pixonui.form.checkbox>
            <x-pixonui.wire.loading.spinner wire:target="form.participo_tarea_extension"></x-pixonui.wire.loading.spinner>
        </div>
    </div>
    @if ($form['participo_tarea_extension'])
        <div class="w-full form-control">
            <x-pixonui.form.label>En caso positivo qué tipo de actividad?</x-pixonui.form.label>
            <x-pixonui.wire.quill wire:model="form.participo_tarea_extension_detalle" ref="participo_tarea_extension_detalle"></x-pixonui.wire.quill>
            <x-pixonui.wire.loading.spinner wire:target="form.participo_tarea_extension_detalle"></x-pixonui.wire.loading.spinner>
            <x-pixonui.form.error for="form.participo_tarea_extension_detalle"></x-pixonui.form.error>
        </div>
    @endif

    <div class=" form-control">
        <x-pixonui.form.label>¿Realizó formalmente vía Facultad, Universidad, empresa etc., alguna prestación de Servicios?</x-pixonui.form.label>
        <div class="flex items-center space-x-2">
            <x-pixonui.form.checkbox id="toggle-realizo_prestacion_servicios" wire:model="form.realizo_prestacion_servicios"></x-pixonui.form.checkbox>
            <x-pixonui.wire.loading.spinner wire:target="form.realizo_prestacion_servicios"></x-pixonui.wire.loading.spinner>
        </div>
    </div>
    @if ($form['realizo_prestacion_servicios'])
        <div class="w-full form-control">
            <x-pixonui.form.label>Indique a quien, el tipo de prestación, fechas. etc.</x-pixonui.form.label>
            <x-pixonui.wire.quill wire:model="form.realizo_prestacion_servicios_detalle" ref="realizo_prestacion_servicios_detalle"></x-pixonui.wire.quill>
            <x-pixonui.wire.loading.spinner wire:target="form.realizo_prestacion_servicios_detalle"></x-pixonui.wire.loading.spinner>
            <x-pixonui.form.error for="form.realizo_prestacion_servicios_detalle"></x-pixonui.form.error>
        </div>
    @endif

    <div class=" form-control">
        <x-pixonui.form.label>¿Realizó Informes técnicos y/o de asesoramiento a empresas u otros organismos privados o estatales?</x-pixonui.form.label>
        <div class="flex items-center space-x-2">
            <x-pixonui.form.checkbox id="toggle-realizo_infromes_tecnicos_empresas" wire:model="form.realizo_infromes_tecnicos_empresas"></x-pixonui.form.checkbox>
            <x-pixonui.wire.loading.spinner wire:target="form.realizo_infromes_tecnicos_empresas"></x-pixonui.wire.loading.spinner>
        </div>
    </div>
    @if ($form['realizo_infromes_tecnicos_empresas'])
        <div class="w-full form-control">
            <x-pixonui.form.label>Indique cual/es y a quien</x-pixonui.form.label>
            <x-pixonui.wire.quill wire:model="form.realizo_infromes_tecnicos_empresas_detalle" ref="realizo_infromes_tecnicos_empresas_detalle"></x-pixonui.wire.quill>
            <x-pixonui.wire.loading.spinner wire:target="form.realizo_infromes_tecnicos_empresas_detalle"></x-pixonui.wire.loading.spinner>
            <x-pixonui.form.error for="form.realizo_infromes_tecnicos_empresas_detalle"></x-pixonui.form.error>
        </div>
    @endif

    <div class=" form-control">
        <x-pixonui.form.label>¿Tomó cursos de Posgrado y/o Capacitación Profesional?</x-pixonui.form.label>
        <div class="flex items-center space-x-2">
            <x-pixonui.form.checkbox id="toggle-tomo_cursos_posgrado" wire:model="form.tomo_cursos_posgrado"></x-pixonui.form.checkbox>
            <x-pixonui.wire.loading.spinner wire:target="form.tomo_cursos_posgrado"></x-pixonui.wire.loading.spinner>
        </div>
    </div>
    @if ($form['tomo_cursos_posgrado'])
        <div class="w-full form-control">
            <x-pixonui.form.label>Indique tipo de curso, nombre, carga horaria, institución que los dictó, fechas, etc.</x-pixonui.form.label>
            <x-pixonui.wire.quill wire:model="form.tomo_cursos_posgrado_detalle" ref="tomo_cursos_posgrado_detalle"></x-pixonui.wire.quill>
            <x-pixonui.wire.loading.spinner wire:target="form.tomo_cursos_posgrado_detalle"></x-pixonui.wire.loading.spinner>
            <x-pixonui.form.error for="form.tomo_cursos_posgrado_detalle"></x-pixonui.form.error>
        </div>
    @endif

    <div class=" form-control">
        <x-pixonui.form.label>Cursó o está cursando alguna carrera de posgrado:</x-pixonui.form.label>
        <div class="flex items-center space-x-2">
            <x-pixonui.form.checkbox id="toggle-curso_carrera_posgrado" wire:model="form.curso_carrera_posgrado"></x-pixonui.form.checkbox>
            <x-pixonui.wire.loading.spinner wire:target="form.curso_carrera_posgrado"></x-pixonui.wire.loading.spinner>
        </div>
    </div>
    @if ($form['curso_carrera_posgrado'])
        <div class="w-full form-control">
            <x-pixonui.form.label>Indique cual/es, título a otorgar, institución que la dicta, etc.</x-pixonui.form.label>
            <x-pixonui.wire.quill wire:model="form.curso_carrera_posgrado_detalle" ref="curso_carrera_posgrado_detalle"></x-pixonui.wire.quill>
            <x-pixonui.wire.loading.spinner wire:target="form.curso_carrera_posgrado_detalle"></x-pixonui.wire.loading.spinner>
            <x-pixonui.form.error for="form.curso_carrera_posgrado_detalle"></x-pixonui.form.error>
        </div>
    @endif

    <div class=" form-control">
        <x-pixonui.form.label>¿Realizó o está realizando al algún trayecto académico (diplomatura) o intercambio Académico?</x-pixonui.form.label>
        <div class="flex items-center space-x-2">
            <x-pixonui.form.checkbox id="toggle-realizo_trayecto_academico" wire:model="form.realizo_trayecto_academico"></x-pixonui.form.checkbox>
            <x-pixonui.wire.loading.spinner wire:target="form.realizo_trayecto_academico"></x-pixonui.wire.loading.spinner>
        </div>
    </div>
    @if ($form['realizo_trayecto_academico'])
        <div class="w-full form-control">
            <x-pixonui.form.label>Indique tipo de trayecto, nombre, carga horaria, institución que lo dicta, fechas, etc.</x-pixonui.form.label>
            <x-pixonui.wire.quill wire:model="form.realizo_trayecto_academico_detalle" ref="realizo_trayecto_academico_detalle"></x-pixonui.wire.quill>
            <x-pixonui.wire.loading.spinner wire:target="form.realizo_trayecto_academico_detalle"></x-pixonui.wire.loading.spinner>
            <x-pixonui.form.error for="form.realizo_trayecto_academico_detalle"></x-pixonui.form.error>
        </div>
    @endif

    <div class=" form-control">
        <x-pixonui.form.label>¿Obtuvo alguna beca o ayuda económica para actividades de formación profesional?</x-pixonui.form.label>
        <div class="flex items-center space-x-2">
            <x-pixonui.form.checkbox id="toggle-obtuvo_beca_formacion_profesional" wire:model="form.obtuvo_beca_formacion_profesional"></x-pixonui.form.checkbox>
            <x-pixonui.wire.loading.spinner wire:target="form.obtuvo_beca_formacion_profesional"></x-pixonui.wire.loading.spinner>
        </div>
    </div>
    @if ($form['obtuvo_beca_formacion_profesional'])
        <div class="w-full form-control">
            <x-pixonui.form.label>Indique tipo de ayuda, destino, institución que la otorgó, fechas, etc.</x-pixonui.form.label>
            <x-pixonui.wire.quill wire:model="form.obtuvo_beca_formacion_profesional_detalle" ref="obtuvo_beca_formacion_profesional_detalle"></x-pixonui.wire.quill>
            <x-pixonui.wire.loading.spinner wire:target="form.obtuvo_beca_formacion_profesional_detalle"></x-pixonui.wire.loading.spinner>
            <x-pixonui.form.error for="form.obtuvo_beca_formacion_profesional_detalle"></x-pixonui.form.error>
        </div>
    @endif

    <div class="w-full form-control">
        <x-pixonui.form.label>Observaciones: En este apartado puede dejarnos sus comentarios, observaciones o sugerencias o bien agregar alguna información importante que no haya sido incluida en los ítems anteriores</x-pixonui.form.label>
        <x-pixonui.wire.quill wire:model="form.observaciones" ref="obtuvo_beca_formacion_profesional_detalle"></x-pixonui.wire.quill>
        <x-pixonui.wire.loading.spinner wire:target="form.observaciones"></x-pixonui.wire.loading.spinner>
        <x-pixonui.form.error for="form.observaciones"></x-pixonui.form.error>
    </div>

    <!-- Botones -->
    <div class="flex justify-end py-4 space-x-4" x-data="{}">
        <a class="max-w-md btn" href="{{ route('memoria.index') }}"  >
            Volver
        </a>
        <a class="btn btn-wide btn-primary" x-on:click="
                aletWarning('¿Desea presentar la memoria?', 'Una vez presentada <b>no podra editarla</b>.', 'Si, continuar', 'Cancelar', function() {
                    $wire.OnPresentar();
                });
            "
            wire:loading.class="loading" wire:target="OnPresentar"
            >
            Presentar
        </a>
    </div>

    @push('scripts')

    @endpush
</div>
