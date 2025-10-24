<div class="space-y-4">
    <x-pixonui.heading.h2 class="pt-8">Docentes</x-pixonui.heading.h2>
    <div class="form-control w-full">

        <div class="flex flex-wrap items-end justify-start space-x-4 space-y-4">
            <div>
                <x-pixonui.form.label>Docente a cargo</x-pixonui.form.label>
                <div class="flex items-center space-x-2">
                    <x-pixonui.form.select wire:model="form.docente_id" :items="$docentes" value="id"
                        caption="full_name"></x-pixonui.form.select>
                    <x-pixonui.wire.loading.spinner wire:target="form.docente_id"></x-pixonui.wire.loading.spinner>
                </div>
                <x-pixonui.form.error for="form.docente_id"></x-pixonui.form.error>
            </div>

            <div>
                <x-pixonui.form.label>Cargo</x-pixonui.form.label>
                <div class="flex items-center space-x-2">
                    <x-pixonui.form.select wire:model="form.cargo_id" :items="$cargos" value="id"
                        caption="nombre"></x-pixonui.form.select>
                    <x-pixonui.wire.loading.spinner wire:target="form.cargo_id"></x-pixonui.wire.loading.spinner>
                </div>
                <x-pixonui.form.error for="form.cargo_id"></x-pixonui.form.error>
            </div>

            <div>
                <x-pixonui.form.label>Dedicación</x-pixonui.form.label>
                <div class="flex items-center space-x-2">
                    <x-pixonui.form.select wire:model="form.dedicacion_id" :items="$dedicaciones" value="id"
                        caption="nombre"></x-pixonui.form.select>
                    <x-pixonui.wire.loading.spinner wire:target="form.dedicacion_id"></x-pixonui.wire.loading.spinner>
                </div>
                <x-pixonui.form.error for="form.dedicacion_id"></x-pixonui.form.error>
            </div>

            <div>
                <x-pixonui.form.label>Situación</x-pixonui.form.label>
                <div class="flex items-center space-x-2">
                    <x-pixonui.form.select wire:model="form.situacion_cargo_id" :items="$situaciones" value="id"
                        caption="nombre"></x-pixonui.form.select>
                    <x-pixonui.wire.loading.spinner
                        wire:target="form.situacion_cargo_id"></x-pixonui.wire.loading.spinner>
                </div>
                <x-pixonui.form.error for="form.situacion_cargo_id"></x-pixonui.form.error>
            </div>
        </div>
    </div>
    <!-- DOCENTES QUE PARTICIPAN DEL DICTADO -->
    @if (isset($form['docente_id']))
        <livewire:docente.tbl-participantes :planificacion_id="$planificacion_id" />
        <!----------------------------------------->
    @endif

    <!----------------------------------------->
    <div class="form-control">
        <x-pixonui.form.label>¿Tiene auxiliar docente estudiantil?</x-pixonui.form.label>
        <div class="flex items-center space-x-2">
            <x-pixonui.form.checkbox id="toggle-auxiliar-docente-estudiantil"
                wire:model="form.auxiliar_docente_estudiantil"></x-pixonui.form.checkbox>
            <x-pixonui.wire.loading.spinner
                wire:target="form.auxiliar_docente_estudiantil"></x-pixonui.wire.loading.spinner>
        </div>
    </div>

    @if ($form['auxiliar_docente_estudiantil'])
        <div class="form-control w-full">
            <x-pixonui.form.label>Indique apellido y nombre de cada auxiliar:</x-pixonui.form.label>
            <x-pixonui.wire.quill wire:model="form.auxiliar_docente_estudiantil_detalle"
                ref="auxiliar_docente_estudiantil_detalle"></x-pixonui.wire.quill>
            <x-pixonui.wire.loading.spinner
                wire:target="form.auxiliar_docente_estudiantil_detalle"></x-pixonui.wire.loading.spinner>
            <x-pixonui.form.error for="form.auxiliar_docente_estudiantil_detalle"></x-pixonui.form.error>
        </div>
    @endif

    <!----------------------------------------->
    <div class="form-control">
        <x-pixonui.form.label>¿La cátedra cuenta con formación de recursos humanos (Estudiantil y/o
            graduado)?</x-pixonui.form.label>
        <div class="flex items-center space-x-2">
            <x-pixonui.form.checkbox id="toggle-formacion-recurso-humano"
                wire:model="form.formacion_recurso_humano"></x-pixonui.form.checkbox>
            <x-pixonui.wire.loading.spinner
                wire:target="form.formacion_recurso_humano"></x-pixonui.wire.loading.spinner>
        </div>
    </div>

    @if ($form['formacion_recurso_humano'])
        <div class="form-control w-full">
            <x-pixonui.form.label>Indique apellido y nombre:</x-pixonui.form.label>
            <x-pixonui.wire.quill wire:model="form.formacion_recurso_humano_detalle"
                ref="formacion_recurso_humano_detalle"></x-pixonui.wire.quill>
            <x-pixonui.wire.loading.spinner
                wire:target="form.formacion_recurso_humano_detalle"></x-pixonui.wire.loading.spinner>
            <x-pixonui.form.error for="form.formacion_recurso_humano_detalle"></x-pixonui.form.error>
        </div>
    @endif

    <!----------------------------------------->
    <div class="form-control">
        <x-pixonui.form.label>¿Prevé docentes invitados?</x-pixonui.form.label>
        <div class="flex items-center space-x-2">
            <x-pixonui.form.checkbox id="toggle-docentes-invitados"
                wire:model="form.doc_invitados"></x-pixonui.form.checkbox>
            <x-pixonui.wire.loading.spinner wire:target="form.doc_invitados"></x-pixonui.wire.loading.spinner>
        </div>
    </div>

    @if ($form['doc_invitados'])
        <div class="form-control w-full">
            <x-pixonui.form.label>Indique los nombre de los docentes invitados</x-pixonui.form.label>
            <x-pixonui.wire.quill wire:model="form.doc_invitados_detalles"
                ref="doc_invitados_detalles"></x-pixonui.wire.quill>
            <x-pixonui.wire.loading.spinner wire:target="form.doc_invitados_detalles"></x-pixonui.wire.loading.spinner>
            <x-pixonui.form.error for="form.doc_invitados_detalles"></x-pixonui.form.error>
        </div>
    @endif

    <!-- Asignatura -->
    <x-pixonui.heading.h2 class="pt-8">Asignatura</x-pixonui.heading.h2>
    <p>
        Estimado Docente tenga presente que al tratarse de carreras presenciales, sólo está permitido realizar menos del
        30% de actividades virtuales. Si ud. hará uso de esa opción deberá indicarlo, especificando en qué actividades
        hará uso de la misma (clases teóricas, prácticas, evaluaciones, consultas, etc.) y con qué herramientas (Zoom o
        Meet con clases sincrónicas, aulas híbridas, aulas virtuales, etc.)
    </p>

    @if ($planificacion->materiaPlanEstudio->materia->tipo_materia == 'G')
        <div class="form-control w-full">
            <x-pixonui.form.label>Nombre de la materia electiva</x-pixonui.form.label>
            <div class="flex w-48 min-w-full items-center space-x-2">
                <x-pixonui.form.input type="text" maxlength="255" for="form.electiva_nombre"
                    wire:model.lazy="form.electiva_nombre"></x-pixonui.form.input>
                <x-pixonui.wire.loading.spinner wire:target="form.electiva_nombre"></x-pixonui.wire.loading.spinner>
            </div>
            <x-pixonui.form.error for="form.electiva_nombre"></x-pixonui.form.error>
        </div>
    @endif

    <div class="form-control w-full">
        <x-pixonui.form.label>Tipo de asignatura</x-pixonui.form.label>
        <div class="flex items-center space-x-2">
            <x-pixonui.form.select wire:model="form.tipo_asignatura_id" :items="$tipoAsignatura" value="id"
                caption="nombre"></x-pixonui.form.select>
            <x-pixonui.wire.loading.spinner wire:target="form.tipo_asignatura_id"></x-pixonui.wire.loading.spinner>
        </div>
    </div>
    <div class="form-control w-full">
        <x-pixonui.form.label>Modalidad de dictado teoricas</x-pixonui.form.label>
        <div class="flex items-center space-x-2">
            <x-pixonui.form.select wire:model="form.modalidad_dictado_teoriacas_id" :items="$modalidades" value="id"
                caption="nombre"></x-pixonui.form.select>
            <x-pixonui.wire.loading.spinner
                wire:target="form.modalidad_dictado_teoriacas_id"></x-pixonui.wire.loading.spinner>
        </div>
    </div>
    <div class="form-control w-full">
        <x-pixonui.form.label>Modalidad de dictado practicas</x-pixonui.form.label>
        <div class="flex items-center space-x-2">
            <x-pixonui.form.select wire:model="form.modalidad_dictado_practicas_id" :items="$modalidades" value="id"
                caption="nombre"></x-pixonui.form.select>
            <x-pixonui.wire.loading.spinner
                wire:target="form.modalidad_dictado_practicas_id"></x-pixonui.wire.loading.spinner>
        </div>
    </div>

    <!-- Carga horaria -->
    <x-pixonui.heading.h2 class="pt-8">Carga Horaria</x-pixonui.heading.h2>
    <div class="form-control w-full">
        <x-pixonui.form.label>Total de horas teórica</x-pixonui.form.label>
        <div class="flex w-20 min-w-full items-center space-x-2">
            <x-pixonui.form.input type="number" for="form.carga_horaria_semanal_teorica"
                wire:model.lazy="form.carga_horaria_semanal_teorica"></x-pixonui.form.input>
            <x-pixonui.wire.loading.spinner
                wire:target="form.carga_horaria_semanal_teorica"></x-pixonui.wire.loading.spinner>
        </div>
        <x-pixonui.form.error for="form.carga_horaria_semanal_teorica"></x-pixonui.form.error>
    </div>
    <div class="form-control w-full">
        <x-pixonui.form.label>Total de horas teórica-práctica</x-pixonui.form.label>
        <div class="flex w-20 min-w-full items-center space-x-2">
            <x-pixonui.form.input type="number" for="form.carga_horaria_semanal_practica_teorica"
                wire:model.lazy="form.carga_horaria_semanal_practica_teorica"></x-pixonui.form.input>
            <x-pixonui.wire.loading.spinner
                wire:target="form.carga_horaria_semanal_practica_teorica"></x-pixonui.wire.loading.spinner>
        </div>
        <x-pixonui.form.error for="form.carga_horaria_semanal_practica_teorica"></x-pixonui.form.error>
    </div>
    <div class="form-control w-full">
        <x-pixonui.form.label>Total de horas práctica</x-pixonui.form.label>
        <div class="flex w-20 min-w-full items-center space-x-2">
            <x-pixonui.form.input type="number" for="form.carga_horaria_semanal_practica"
                wire:model.lazy="form.carga_horaria_semanal_practica"></x-pixonui.form.input>
            <x-pixonui.wire.loading.spinner
                wire:target="form.carga_horaria_semanal_practica"></x-pixonui.wire.loading.spinner>
        </div>
        <x-pixonui.form.error for="form.carga_horaria_semanal_practica"></x-pixonui.form.error>
    </div>
    <div class="form-control w-full">
        <x-pixonui.form.label>Suma de carga horaria (teóricas + teórico-prácticas + prácticas):
            {{ $cargaHorariaSemanal }}</x-pixonui.form.label>
    </div>
    <div class="alert alert-info text-white">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
            class="h-6 w-6 shrink-0 stroke-current">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
        <span>Recuerde que la suma debe coincidir con el toal de horas de la asignatura, aprobada en el plan de estudio
            vigente</span>
    </div>

    <!-- Prácticos -->
    <x-pixonui.heading.h2 class="pt-8">Prácticos</x-pixonui.heading.h2>
    <div class="form-control">
        <x-pixonui.form.label>¿Tiene prácticos de aprobación obligatoria?</x-pixonui.form.label>
        <div class="flex items-center space-x-2">
            <x-pixonui.form.checkbox id="toggle-practicos_aprobacion_abligatoria"
                wire:model="form.practicos_aprobacion_abligatoria"></x-pixonui.form.checkbox>
            <x-pixonui.wire.loading.spinner
                wire:target="form.practicos_aprobacion_abligatoria"></x-pixonui.wire.loading.spinner>
        </div>
    </div>

    @if ($form['practicos_aprobacion_abligatoria'])
        <div class="form-control w-full">
            <x-pixonui.form.label>Indique cuales son</x-pixonui.form.label>
            <x-pixonui.wire.quill wire:model="form.practicos_aprobacion_abligatoria_detalle"
                ref="practicos_aprobacion_abligatoria_detalle"></x-pixonui.wire.quill>
            <x-pixonui.wire.loading.spinner
                wire:target="form.practicos_aprobacion_abligatoria_detalle"></x-pixonui.wire.loading.spinner>
            <x-pixonui.form.error for="form.practicos_aprobacion_abligatoria_detalle"></x-pixonui.form.error>
        </div>
    @endif
    <div class="alert alert-info">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
            class="h-6 w-6 shrink-0 stroke-current">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
        <span>Recuerde que, de acuerdo al reglamente de cursada, se puede tener hasta un 30% de prácticos de aprobación
            obligatoria, siempre que estén especificados en la planificaciones.</span>
    </div>

    <!-- Parciales -->
    <x-pixonui.heading.h2 class="pt-8">Parciales</x-pixonui.heading.h2>
    <div class="form-control w-full">
        <x-pixonui.form.label>Cantidad de parciales previstos</x-pixonui.form.label>
        <div class="flex w-20 min-w-full items-center space-x-2">
            <x-pixonui.form.input type="number" for="form.cantidad_parciales"
                wire:model.lazy="form.cantidad_parciales"></x-pixonui.form.input>
            <x-pixonui.wire.loading.spinner wire:target="form.cantidad_parciales"></x-pixonui.wire.loading.spinner>
        </div>
        <x-pixonui.form.error for="form.cantidad_parciales"></x-pixonui.form.error>
    </div>
    <div class="form-control w-full">
        <x-pixonui.form.label>Modalidad prevista para los parciales</x-pixonui.form.label>
        <div class="flex items-center space-x-2">
            <x-pixonui.form.select wire:model="form.modalidad_parciales_id" :items="$modalidades" value="id"
                caption="nombre"></x-pixonui.form.select>
            <x-pixonui.wire.loading.spinner wire:target="form.modalidad_parciales_id"></x-pixonui.wire.loading.spinner>
        </div>
    </div>

    <!-- Salidas -->
    <x-pixonui.heading.h2 class="pt-8">Salidas</x-pixonui.heading.h2>
    <div class="form-control w-full">
        <x-pixonui.form.label>¿El dictado incluirá salidas al campo (incluye visitas a laboratorios, museos, empresas,
            etc.)?</x-pixonui.form.label>
        <div class="flex items-center space-x-2">
            <x-pixonui.form.checkbox id="toggle-salida-campo"
                wire:model="form.salida_campo"></x-pixonui.form.checkbox>
            <x-pixonui.wire.loading.spinner wire:target="form.salida_campo"></x-pixonui.wire.loading.spinner>
        </div>
    </div>
    @if ($form['salida_campo'])
        <!-- SALIDAS DE CAMPO -->
        <div class="form-control w-full">
            <x-pixonui.form.label>Correo de contacto del responsable de viaje</x-pixonui.form.label>
            <div class="flex w-48 min-w-full items-center space-x-2">
                <x-pixonui.form.input type="email" maxlength="255" for="form.correo_responsable_viaje"
                    wire:model.lazy="form.correo_responsable_viaje"></x-pixonui.form.input>
                <x-pixonui.wire.loading.spinner
                    wire:target="form.correo_responsable_viaje"></x-pixonui.wire.loading.spinner>
            </div>
            <x-pixonui.form.error for="form.correo_responsable_viaje"></x-pixonui.form.error>
        </div>
        <div class="alert alert-info">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                class="h-6 w-6 shrink-0 stroke-current">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <span>El coordinador de viaje se comunicará oportunamente para coordinar los mismos.</span>
        </div>
        <!----------------------------------------->
    @endif
    <div class="form-control w-full">
        <x-pixonui.form.label>¿Prevé salidas en conjunto con otra/s cátedras?</x-pixonui.form.label>
        <div class="flex items-center space-x-2">
            <x-pixonui.form.checkbox id="toggle-salida-campo-conjuntas"
                wire:model="form.salida_campo_conjuntas"></x-pixonui.form.checkbox>
            <x-pixonui.wire.loading.spinner wire:target="form.salida_campo_conjuntas"></x-pixonui.wire.loading.spinner>
        </div>
    </div>
    @if ($form['salida_campo_conjuntas'])
        <div class="form-control w-full">
            <x-pixonui.form.label>Indique con cuál o cuáles cátedras prevé salidas conjuntas</x-pixonui.form.label>
            <x-pixonui.wire.quill wire:model="form.salida_campo_catedras"
                ref="quillsalidascampocatedras"></x-pixonui.wire.quill>
            <x-pixonui.wire.loading.spinner wire:target="form.salida_campo_catedras"></x-pixonui.wire.loading.spinner>
            <x-pixonui.form.error for="form.salida_campo_catedras"></x-pixonui.form.error>
        </div>
    @endif

    <!-- Actividades conjuntas -->
    <x-pixonui.heading.h2 class="pt-8">Actividades</x-pixonui.heading.h2>
    <div class="form-control w-full">
        <x-pixonui.form.label>¿Prevé actividades conjuntas con otras cátedras?</x-pixonui.form.label>
        <div class="flex items-center space-x-2">
            <x-pixonui.form.checkbox id="toggle-actividades-conjuntas"
                wire:model="form.actividades_conjuntas"></x-pixonui.form.checkbox>
            <x-pixonui.wire.loading.spinner wire:target="form.actividades_conjuntas"></x-pixonui.wire.loading.spinner>
        </div>
    </div>
    @if ($form['actividades_conjuntas'])
        <div class="form-control w-full">
            <x-pixonui.form.label>Indique con cuál o cuáles cátedras prevé actividades conjuntas</x-pixonui.form.label>
            <x-pixonui.wire.quill wire:model="form.actividades_conjuntas_catedras"
                ref="quillactividadesconjuntas"></x-pixonui.wire.quill>
            <x-pixonui.wire.loading.spinner
                wire:target="form.actividades_conjuntas_catedras"></x-pixonui.wire.loading.spinner>
            <x-pixonui.form.error for="form.actividades_conjuntas_catedras"></x-pixonui.form.error>
        </div>
        <div class="form-control w-full">
            <x-pixonui.form.label>Indique las actividades previstas</x-pixonui.form.label>
            <x-pixonui.wire.quill wire:model="form.actividades_conjuntas_tipo"
                ref="quillactividadestipo"></x-pixonui.wire.quill>
            <x-pixonui.wire.loading.spinner
                wire:target="form.actividades_conjuntas_tipo"></x-pixonui.wire.loading.spinner>
            <x-pixonui.form.error for="form.actividades_conjuntas_tipo"></x-pixonui.form.error>
        </div>
    @endif
    <div class="form-control w-full">
        <x-pixonui.form.label>¿Prevé actividades académicas complementarias como charlas, seminarios, talleres,
            etc.?</x-pixonui.form.label>
        <div class="flex items-center space-x-2">
            <x-pixonui.form.checkbox id="toggle-actividades-complementarias"
                wire:model="form.actividades_complementarias"></x-pixonui.form.checkbox>
            <x-pixonui.wire.loading.spinner
                wire:target="form.actividades_complementarias"></x-pixonui.wire.loading.spinner>
        </div>
    </div>
    @if ($form['actividades_complementarias'])
        <div class="form-control w-full">
            <x-pixonui.form.label>Indique el tipo de actividades complmentarias</x-pixonui.form.label>
            <x-pixonui.wire.quill wire:model="form.actividades_complementarias_tipo"
                ref="quillactividadescomplementariastipo"></x-pixonui.wire.quill>
            <x-pixonui.wire.loading.spinner
                wire:target="form.actividades_complementarias_tipo"></x-pixonui.wire.loading.spinner>
            <x-pixonui.form.error for="form.actividades_complementarias_tipo"></x-pixonui.form.error>
        </div>
    @endif

    <!-- Herramientas virtuales -->
    <x-pixonui.heading.h2 class="pt-8">Herramientas virtuales</x-pixonui.heading.h2>
    <div class="form-control w-full">
        <x-pixonui.form.label>¿La asignatura cuenta con aula virtual?</x-pixonui.form.label>
        <div class="flex items-center space-x-2">
            <x-pixonui.form.checkbox id="toggle-aula-virtual"
                wire:model="form.aula_virtual"></x-pixonui.form.checkbox>
            <x-pixonui.wire.loading.spinner wire:target="form.aula_virtual"></x-pixonui.wire.loading.spinner>
        </div>
    </div>
    @if ($form['aula_virtual'])
        <div class="form-control w-full">
            <x-pixonui.form.label>¿Hará uso del aula virtual como complemento al dictado?</x-pixonui.form.label>
            <div class="flex items-center space-x-2">
                <x-pixonui.form.checkbox id="toggle-aula-virtual-complemento-dictado"
                    wire:model="form.aula_virtual_complemento_dictado"></x-pixonui.form.checkbox>
                <x-pixonui.wire.loading.spinner
                    wire:target="form.aula_virtual_complemento_dictado"></x-pixonui.wire.loading.spinner>
            </div>
        </div>
    @endif
    <div class="form-control w-full">
        <x-pixonui.form.label>¿Se prevé en el dictado el uso de otras herramientas virtuales como laboratorios
            virtuales, aulas invertidas, softwares específicos, aulas híbridas, etc.?</x-pixonui.form.label>
        <div class="flex items-center space-x-2">
            <x-pixonui.form.checkbox id="toggle-herramientas-virtuales"
                wire:model="form.herramientas_virtuales"></x-pixonui.form.checkbox>
            <x-pixonui.wire.loading.spinner wire:target="form.herramientas_virtuales"></x-pixonui.wire.loading.spinner>
        </div>
    </div>
    @if ($form['herramientas_virtuales'])
        <div class="form-control w-full">
            <x-pixonui.form.label>Indique las herramientas virtuales a utilizar</x-pixonui.form.label>
            <x-pixonui.wire.quill wire:model="form.herramientas_virtuales_previstas"
                ref="quillherramientasvirtuales"></x-pixonui.wire.quill>
            <x-pixonui.wire.loading.spinner
                wire:target="form.herramientas_virtuales_previstas"></x-pixonui.wire.loading.spinner>
            <x-pixonui.form.error for="form.herramientas_virtuales_previstas"></x-pixonui.form.error>
        </div>
    @endif

    <!-- Unidades y Temas -->
    <x-pixonui.heading.h2 class="pt-8">Unidades y Temas</x-pixonui.heading.h2>
    <div class="space-y-4">
        @if(session('message'))
            <div class="alert alert-success">
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ session('message') }}</span>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-error">
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ session('error') }}</span>
            </div>
        @endif

        @foreach($unidadesTemas as $unidadIndex => $unidad)
            <div class="card bg-base-100 shadow-lg">
                <div class="card-body">
                    @if(isset($unidad['guardada']) && $unidad['guardada'] && (!isset($unidad['editando']) || !$unidad['editando']))
                        <!-- Vista compacta para unidades guardadas -->
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="card-title">Unidad {{ $unidad['numero'] }}: {{ $unidad['titulo'] }}</h3>
                            <div class="flex space-x-2">
                                <button type="button" wire:click="editarUnidad({{ $unidadIndex }})"
                                        class="btn btn-sm btn-primary">Editar</button>
                                <button type="button" wire:click="quitarUnidad({{ $unidadIndex }})"
                                        class="btn btn-sm btn-error">Quitar Unidad</button>
                            </div>
                        </div>

                        <!-- Mostrar temas en vista compacta -->
                        @if(count($unidad['temas']) > 0)
                            <div class="mb-4">
                                <h4 class="font-semibold mb-2">Temas:</h4>
                                <ul class="list-disc list-inside space-y-1">
                                    @foreach($unidad['temas'] as $tema)
                                        <li class="text-sm">
                                            <strong>{{ $tema['nombre'] }}</strong>
                                            @if(!empty($tema['detalle']))
                                                : {{ $tema['detalle'] }}
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    @else
                        <!-- Vista completa para edición -->
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="card-title">Unidad {{ $unidad['numero'] }}</h3>
                            <div class="flex space-x-2">
                                <button type="button" wire:click="quitarUnidad({{ $unidadIndex }})"
                                        class="btn btn-sm btn-error">Quitar Unidad</button>
                            </div>
                        </div>

                        <div class="form-control w-full mb-4">
                            <label class="label">
                                <span class="label-text">Título de la Unidad</span>
                            </label>
                            <input type="text" class="input input-bordered w-full"
                                wire:model.lazy="unidadesTemas.{{ $unidadIndex }}.titulo"
                                placeholder="Ingrese el título de la unidad">
                        </div>

                        <div class="space-y-2">
                            <div class="flex justify-between items-center">
                                <h4 class="font-semibold">Temas</h4>
                                <button type="button" wire:click="agregarTema({{ $unidadIndex }})"
                                        @if(empty($unidad['titulo'])) disabled @endif
                                        class="btn btn-sm btn-primary">Agregar Tema</button>
                            </div>

                            @foreach($unidad['temas'] as $temaIndex => $tema)
                                <div class="border border-gray-200 rounded-lg p-4 mb-2">
                                    <div class="form-control w-full mb-2">
                                        <label class="label">
                                            <span class="label-text">Nombre del Tema</span>
                                        </label>
                                        <input type="text" class="input input-bordered w-full"
                                            wire:model.lazy="unidadesTemas.{{ $unidadIndex }}.temas.{{ $temaIndex }}.nombre"
                                            placeholder="Ingrese el nombre del tema">
                                    </div>

                                    <div class="form-control w-full mb-2">
                                        <label class="label">
                                            <span class="label-text">Detalle del Tema</span>
                                        </label>
                                        <textarea class="textarea textarea-bordered w-full"
                                            wire:model.lazy="unidadesTemas.{{ $unidadIndex }}.temas.{{ $temaIndex }}.detalle"
                                            placeholder="Ingrese los conceptos que se verán en este tema"
                                            rows="3"></textarea>
                                    </div>

                                    @if(count($unidad['temas']) > 1)
                                        <div class="text-right">
                                            <button class="btn btn-ghost" wire:click="quitarTema({{ $unidadIndex }}, {{ $temaIndex }})" wire:loading.attr="disabled">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>

                        <div class="text-right mt-4">
                            @php
                                $tieneTemasValidos = false;
                                foreach($unidad['temas'] as $tema) {
                                    if (!empty($tema['nombre'])) {
                                        $tieneTemasValidos = true;
                                        break;
                                    }
                                }
                            @endphp
                            <div class="flex justify-end space-x-2">
                                <button type="button"
                                        wire:click="guardarUnidad({{ $unidadIndex }})"
                                        @if(empty($unidad['titulo']) || !$tieneTemasValidos) disabled @endif
                                        class="btn btn-success">
                                    Guardar Unidad
                                </button>
                                @if(isset($unidad['guardada']) && $unidad['guardada'])
                                    <button type="button" wire:click="cancelarEdicion({{ $unidadIndex }})"
                                            class="btn btn-warning">
                                        Cancelar
                                    </button>
                                @endif
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        @endforeach

        @if(session('unidad_guardada'))
            <div class="alert alert-success">
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>Unidad guardada correctamente</span>
            </div>
        @endif
        @if(session('unidad_eliminada'))
            <div class="alert alert-error">
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>Unidad eliminada correctamente</span>
            </div>
        @endif

        <div class="text-center mb-6">
            <button type="button" wire:click="agregarUnidad"
                    class="btn btn-primary btn-lg">Agregar Unidad</button>
        </div>

    </div>

    <!-- Observaciones -->
    <x-pixonui.heading.h2 class="pt-8">Observaciones</x-pixonui.heading.h2>
    <div class="form-control w-full">
        <x-pixonui.wire.quill wire:model="form.observacioens_sugerencias"
            ref="quillobservaciones"></x-pixonui.wire.quill>
        <x-pixonui.wire.loading.spinner wire:target="form.observacioens_sugerencias"></x-pixonui.wire.loading.spinner>
        <x-pixonui.form.error for="form.observacioens_sugerencias"></x-pixonui.form.error>
    </div>


    @if ($es_electiva)
        <div class="alert alert-warning flex-col text-white">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                class="h-6 w-6 shrink-0 stroke-current" style="color: #fff;">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <div class="flex-col text-start text-white">
                <p><b>IMPORTANTE PARA MATERIA DE ESPECIALIDAD</b></p>
                <p>
                    Estimado Docente si su Materia de Especialidad la <b>presenta por primera vez o tiene
                        modificaciones</b>
                    de
                    algún
                    tipo (docentes, programa etc.), si <b>debe presentar por mesa de entradas</b> nota de solicitud, más
                    el
                    formulario
                    completado bajado del sistema.
                </p>
            </div>
        </div>
    @endif


    <!-- Botones -->
    <div class="flex justify-end space-x-4 py-4" x-data="{}">
        <a class="btn max-w-md" href="{{ route('planificacion.index') }}">
            Volver
        </a>
        <a class="btn btn-primary btn-wide" wire:loading.attr="disabled"
            x-on:click="
                aletWarning('¿Desea presentar la planificación?', 'Una vez presentada <b>no podra editarla</b>.', 'Si, continuar', 'Cancelar', function() {
                    $wire.OnPresentar();
                });
            ">
            <span wire:loading class="loading-spinner loading"></span>
            Presentar
        </a>
    </div>

    @push('scripts')
    @endpush


</div>
