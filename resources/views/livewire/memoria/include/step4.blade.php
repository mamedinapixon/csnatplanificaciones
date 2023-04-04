<div class="space-y-4 ">
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

    @include('livewire.memoria.include.btnmover')
</div>
