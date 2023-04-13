<div class="space-y-4 ">
    <livewire:memoria.tbl-asignatura :memoria_id='' :tipo_docente='' :memoria_id="$memoria_id" tipo_docente="Estable" label="Asignatura/s en la que participó como docente estable y/o por extensión de funciones"/>
    <livewire:memoria.tbl-asignatura :memoria_id='' :tipo_docente='' :memoria_id="$memoria_id" tipo_docente="Invitado" label="Asignaturas en la que participó como Docente invitado" />

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
        <x-pixonui.form.label>¿Participó como jurados titulares o suplentes de asignaturas de grado?</x-pixonui.form.label>
        <div class="flex items-center space-x-2">
            <x-pixonui.form.checkbox id="toggle-participo_jurado_grado" wire:model="form.participo_jurado_grado"></x-pixonui.form.checkbox>
            <x-pixonui.wire.loading.spinner wire:target="form.participo_jurado_grado"></x-pixonui.wire.loading.spinner>
        </div>
    </div>
    @if ($form['participo_jurado_grado'])
        <div class="w-full form-control">
            <x-pixonui.form.label>Especifique los datos:</x-pixonui.form.label>
            <x-pixonui.wire.quill wire:model="form.participo_jurado_grado_detalle" ref="participo_jurado_grado_detalle"></x-pixonui.wire.quill>
            <x-pixonui.wire.loading.spinner wire:target="form.participo_jurado_grado_detalle"></x-pixonui.wire.loading.spinner>
            <x-pixonui.form.error for="form.participo_jurado_grado_detalle"></x-pixonui.form.error>
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
            <x-pixonui.form.checkbox id="toggle-elaboro_material_didactico" wire:model="form.elaboro_material_didactico"  wire:key="field-elaboro_material_didactico"></x-pixonui.form.checkbox>
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

    @include('livewire.memoria.include.btnmover')
</div>
