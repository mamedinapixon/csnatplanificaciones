<div class="space-y-4 ">
    <div class="form-control">
        <x-pixonui.form.label>¿Participó en el dictado de Cursos de Posgrado?</x-pixonui.form.label>
        <div class="flex items-center space-x-2">
            <x-pixonui.form.checkbox id="toggle-participo_dictado_cursos" wire:model="form.participo_dictado_cursos">
            </x-pixonui.form.checkbox>
            <x-pixonui.wire.loading.spinner wire:target="form.participo_dictado_cursos"></x-pixonui.wire.loading.spinner>
        </div>
    </div>
    @if ($form['participo_dictado_cursos'])
        <div class="w-full form-control">
            <x-pixonui.form.label>Indique en cual/es:</x-pixonui.form.label>
            <x-pixonui.wire.quill wire:model="form.participo_dictado_cursos_detalle"
                ref="participo_dictado_cursos_detalle"></x-pixonui.wire.quill>
            <x-pixonui.wire.loading.spinner wire:target="form.participo_dictado_cursos_detalle">
            </x-pixonui.wire.loading.spinner>
            <x-pixonui.form.error for="form.participo_dictado_cursos_detalle"></x-pixonui.form.error>
        </div>
    @endif

    <div class="form-control">
        <x-pixonui.form.label>¿Formó parte de la Dirección y/o Comité Académico de alguna/s Carrera/s de Posgrado?
        </x-pixonui.form.label>
        <div class="flex items-center space-x-2">
            <x-pixonui.form.checkbox id="toggle-formo_parte_comite_carrera_posgrado"
                wire:model="form.formo_parte_comite_carrera_posgrado"></x-pixonui.form.checkbox>
            <x-pixonui.wire.loading.spinner wire:target="form.formo_parte_comite_carrera_posgrado">
            </x-pixonui.wire.loading.spinner>
        </div>
    </div>
    @if ($form['formo_parte_comite_carrera_posgrado'])
        <div class="w-full form-control">
            <x-pixonui.form.label>Indique en cual/es y su función</x-pixonui.form.label>
            <x-pixonui.wire.quill wire:model="form.formo_parte_comite_carrera_posgrado_detalle"
                ref="formo_parte_comite_carrera_posgrado_detalle"></x-pixonui.wire.quill>
            <x-pixonui.wire.loading.spinner wire:target="form.formo_parte_comite_carrera_posgrado_detalle">
            </x-pixonui.wire.loading.spinner>
            <x-pixonui.form.error for="form.formo_parte_comite_carrera_posgrado_detalle"></x-pixonui.form.error>
        </div>
    @endif

    <div class="form-control">
        <x-pixonui.form.label>¿Es Docente Estable de alguna/s Carrera/s de Posgrado?</x-pixonui.form.label>
        <div class="flex items-center space-x-2">
            <x-pixonui.form.checkbox id="toggle-docente_estable_carrera_posgrado"
                wire:model="form.docente_estable_carrera_posgrado"></x-pixonui.form.checkbox>
            <x-pixonui.wire.loading.spinner wire:target="form.docente_estable_carrera_posgrado">
            </x-pixonui.wire.loading.spinner>
        </div>
    </div>
    @if ($form['docente_estable_carrera_posgrado'])
        <div class="w-full form-control">
            <x-pixonui.form.label>Indique en cual/es</x-pixonui.form.label>
            <x-pixonui.wire.quill wire:model="form.docente_estable_carrera_posgrado_detalle"
                ref="docente_estable_carrera_posgrado_detalle"></x-pixonui.wire.quill>
            <x-pixonui.wire.loading.spinner wire:target="form.docente_estable_carrera_posgrado_detalle">
            </x-pixonui.wire.loading.spinner>
            <x-pixonui.form.error for="form.docente_estable_carrera_posgrado_detalle"></x-pixonui.form.error>
        </div>
    @endif

    <div class="form-control">
        <x-pixonui.form.label>¿Participó de Alguna/s Comisión/es de Supervisión de Tesis de Posgrado?
        </x-pixonui.form.label>
        <div class="flex items-center space-x-2">
            <x-pixonui.form.checkbox id="toggle-participo_supervision_tesis_posgrado"
                wire:model="form.participo_supervision_tesis_posgrado"></x-pixonui.form.checkbox>
            <x-pixonui.wire.loading.spinner wire:target="form.participo_supervision_tesis_posgrado">
            </x-pixonui.wire.loading.spinner>
        </div>
    </div>
    @if ($form['participo_supervision_tesis_posgrado'])
        <div class="w-full form-control">
            <x-pixonui.form.label>Indique en cual/es</x-pixonui.form.label>
            <x-pixonui.wire.quill wire:model="form.participo_supervision_tesis_posgrado_detalle"
                ref="participo_supervision_tesis_posgrado_detalle"></x-pixonui.wire.quill>
            <x-pixonui.wire.loading.spinner wire:target="form.participo_supervision_tesis_posgrado_detalle">
            </x-pixonui.wire.loading.spinner>
            <x-pixonui.form.error for="form.participo_supervision_tesis_posgrado_detalle"></x-pixonui.form.error>
        </div>
    @endif

    <div class="form-control">
        <x-pixonui.form.label>¿Fue Jurado Titular y/o Suplente de alguna/s tesis de Posgrado?</x-pixonui.form.label>
        <div class="flex items-center space-x-2">
            <x-pixonui.form.checkbox id="toggle-jurado_tesis_grado" wire:model="form.jurado_tesis_grado">
            </x-pixonui.form.checkbox>
            <x-pixonui.wire.loading.spinner wire:target="form.jurado_tesis_grado"></x-pixonui.wire.loading.spinner>
        </div>
    </div>
    @if ($form['jurado_tesis_grado'])
        <div class="w-full form-control">
            <x-pixonui.form.label>Indique en cual/es</x-pixonui.form.label>
            <x-pixonui.wire.quill wire:model="form.jurado_tesis_grado_detalle" ref="jurado_tesis_grado_detalle">
            </x-pixonui.wire.quill>
            <x-pixonui.wire.loading.spinner wire:target="form.jurado_tesis_grado_detalle">
            </x-pixonui.wire.loading.spinner>
            <x-pixonui.form.error for="form.jurado_tesis_grado_detalle"></x-pixonui.form.error>
        </div>
    @endif

    <div class="form-control">
        <x-pixonui.form.label>¿Coordinó algún/s Curso/s de Posgrado?</x-pixonui.form.label>
        <div class="flex items-center space-x-2">
            <x-pixonui.form.checkbox id="toggle-coordino_curso_posgrado" wire:model="form.coordino_curso_posgrado">
            </x-pixonui.form.checkbox>
            <x-pixonui.wire.loading.spinner wire:target="form.coordino_curso_posgrado"></x-pixonui.wire.loading.spinner>
        </div>
    </div>
    @if ($form['coordino_curso_posgrado'])
        <div class="w-full form-control">
            <x-pixonui.form.label>Indique cuantos y en cual/es</x-pixonui.form.label>
            <x-pixonui.wire.quill wire:model="form.coordino_curso_posgrado_detalle"
                ref="coordino_curso_posgrado_detalle"></x-pixonui.wire.quill>
            <x-pixonui.wire.loading.spinner wire:target="form.coordino_curso_posgrado_detalle">
            </x-pixonui.wire.loading.spinner>
            <x-pixonui.form.error for="form.coordino_curso_posgrado_detalle"></x-pixonui.form.error>
        </div>
    @endif

    <div class="form-control">
        <x-pixonui.form.label>¿Dictó Cursos de Extensión y/o Capacitación Profesional?</x-pixonui.form.label>
        <div class="flex items-center space-x-2">
            <x-pixonui.form.checkbox id="toggle-dicto_cursos_profesional" wire:model="form.dicto_cursos_profesional">
            </x-pixonui.form.checkbox>
            <x-pixonui.wire.loading.spinner wire:target="form.dicto_cursos_profesional">
            </x-pixonui.wire.loading.spinner>
        </div>
    </div>
    @if ($form['dicto_cursos_profesional'])
        <div class="w-full form-control">
            <x-pixonui.form.label>Indique en cual/es:</x-pixonui.form.label>
            <x-pixonui.wire.quill wire:model="form.dicto_cursos_profesional_detalle"
                ref="dicto_cursos_profesional_detalle"></x-pixonui.wire.quill>
            <x-pixonui.wire.loading.spinner wire:target="form.dicto_cursos_profesional_detalle">
            </x-pixonui.wire.loading.spinner>
            <x-pixonui.form.error for="form.dicto_cursos_profesional_detalle"></x-pixonui.form.error>
        </div>
    @endif

    <div class="w-full form-control">
        <x-pixonui.form.label>¿Otras actividades de posgrado llevadas a cabo en el año? Completar</x-pixonui.form.label>
        <x-pixonui.wire.quill wire:model="form.otras_actividades_posgrado" ref="otras_actividades_posgrado">
        </x-pixonui.wire.quill>
        <x-pixonui.wire.loading.spinner wire:target="form.otras_actividades_posgrado"></x-pixonui.wire.loading.spinner>
        <x-pixonui.form.error for="form.otras_actividades_posgrado"></x-pixonui.form.error>
    </div>


    <div class="form-control">
        <x-pixonui.form.label>¿Dirigió Tesinas de Grado?</x-pixonui.form.label>
        <div class="flex items-center space-x-2">
            <x-pixonui.form.checkbox id="toggle-dirigio_tesinas_grado" wire:model="form.dirigio_tesinas_grado">
            </x-pixonui.form.checkbox>
            <x-pixonui.wire.loading.spinner wire:target="form.dirigio_tesinas_grado"></x-pixonui.wire.loading.spinner>
        </div>
    </div>
    @if ($form['dirigio_tesinas_grado'])
        <div class="w-full form-control">
            <x-pixonui.form.label>Indique cantidad, tesistas, temas, etc.</x-pixonui.form.label>
            <x-pixonui.wire.quill wire:model="form.dirigio_tesinas_grado_detalle" ref="dirigio_tesinas_grado_detalle">
            </x-pixonui.wire.quill>
            <x-pixonui.wire.loading.spinner wire:target="form.dirigio_tesinas_grado_detalle">
            </x-pixonui.wire.loading.spinner>
            <x-pixonui.form.error for="form.dirigio_tesinas_grado_detalle"></x-pixonui.form.error>
        </div>
    @endif

    <div class="form-control">
        <x-pixonui.form.label>¿Dirigió Prácticas Profesionales Supervisadas (PPS)?</x-pixonui.form.label>
        <div class="flex items-center space-x-2">
            <x-pixonui.form.checkbox id="toggle-dirigio_pps" wire:model="form.dirigio_pps"></x-pixonui.form.checkbox>
            <x-pixonui.wire.loading.spinner wire:target="form.dirigio_pps"></x-pixonui.wire.loading.spinner>
        </div>
    </div>
    @if ($form['dirigio_pps'])
        <div class="w-full form-control">
            <x-pixonui.form.label>Indique alumnos, temas, etc.</x-pixonui.form.label>
            <x-pixonui.wire.quill wire:model="form.dirigio_pps_detalle" ref="dirigio_pps_detalle">
            </x-pixonui.wire.quill>
            <x-pixonui.wire.loading.spinner wire:target="form.dirigio_pps_detalle"></x-pixonui.wire.loading.spinner>
            <x-pixonui.form.error for="form.dirigio_pps_detalle"></x-pixonui.form.error>
        </div>
    @endif

    @include('livewire.memoria.include.btnmover')
</div>
