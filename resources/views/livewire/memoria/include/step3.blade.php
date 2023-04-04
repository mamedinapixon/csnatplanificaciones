<div class="space-y-4 ">
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

    @include('livewire.memoria.include.btnmover')
</div>
