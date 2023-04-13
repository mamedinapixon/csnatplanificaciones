<div class="space-y-4 ">
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
        <x-pixonui.form.label>¿Participó en otros cargos directivos (Cooperadora, Colegios profesionales, etc.)?</x-pixonui.form.label>
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
        <x-pixonui.form.label>¿Participó en cargos de gestión (Decano, Vice, Secretarios de Facultad, coordinadores, etc.)?</x-pixonui.form.label>
        <div class="flex items-center space-x-2">
            <x-pixonui.form.checkbox id="toggle-participo_cargos_gestion" wire:model="form.participo_cargos_gestion"></x-pixonui.form.checkbox>
            <x-pixonui.wire.loading.spinner wire:target="form.participo_cargos_gestion"></x-pixonui.wire.loading.spinner>
        </div>
    </div>
    @if ($form['participo_cargos_gestion'])
        <div class="w-full form-control">
            <x-pixonui.form.label>Indique cual/es</x-pixonui.form.label>
            <x-pixonui.wire.quill wire:model="form.participo_cargos_gestion_detalle" ref="participo_cargos_gestion_detalle"></x-pixonui.wire.quill>
            <x-pixonui.wire.loading.spinner wire:target="form.participo_cargos_gestion_detalle"></x-pixonui.wire.loading.spinner>
            <x-pixonui.form.error for="form.participo_cargos_gestion_detalle"></x-pixonui.form.error>
        </div>
    @endif

    <div class=" form-control">
        <x-pixonui.form.label>¿Participó en actividades de gestión?</x-pixonui.form.label>
        <div class="flex items-center space-x-2">
            <x-pixonui.form.checkbox id="toggle-participo_actividades_gestion" wire:model="form.participo_actividades_gestion"></x-pixonui.form.checkbox>
            <x-pixonui.wire.loading.spinner wire:target="form.participo_actividades_gestion"></x-pixonui.wire.loading.spinner>
        </div>
    </div>
    @if ($form['participo_actividades_gestion'])
        <div class="w-full form-control">
            <x-pixonui.form.label>Indique cual/es</x-pixonui.form.label>
            <x-pixonui.wire.quill wire:model="form.participo_actividades_gestion_detalle" ref="participo_actividades_gestion_detalle"></x-pixonui.wire.quill>
            <x-pixonui.wire.loading.spinner wire:target="form.participo_actividades_gestion_detalle"></x-pixonui.wire.loading.spinner>
            <x-pixonui.form.error for="form.participo_actividades_gestion_detalle"></x-pixonui.form.error>
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

    @include('livewire.memoria.include.btnmover')
</div>
