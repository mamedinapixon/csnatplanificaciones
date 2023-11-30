<div class="space-y-4 ">
    <x-pixonui.heading.h2 class="pt-8">Docentes</x-pixonui.heading.h2>
    <div class="w-full form-control">

        <div class="flex-wrap flex justify-start space-x-4 space-y-4 items-end" >
            <div>
                <x-pixonui.form.label>Docente a cargo</x-pixonui.form.label>
                <div class="flex items-center space-x-2">
                    <x-pixonui.form.select  wire:model="form.docente_id" :items="$docentes" value="id" caption="FullName"></x-pixonui.form.select>
                    <x-pixonui.wire.loading.spinner wire:target="form.docente_id"></x-pixonui.wire.loading.spinner>
                </div>
                <x-pixonui.form.error for="form.docente_id"></x-pixonui.form.error>
            </div>

            <div>
                <x-pixonui.form.label>Cargo</x-pixonui.form.label>
                <div class="flex items-center space-x-2">
                    <x-pixonui.form.select  wire:model="form.cargo_id" :items="$cargos" value="id" caption="nombre"></x-pixonui.form.select>
                    <x-pixonui.wire.loading.spinner wire:target="form.cargo_id"></x-pixonui.wire.loading.spinner>
                </div>
                <x-pixonui.form.error for="form.cargo_id"></x-pixonui.form.error>
            </div>

            <div>
                <x-pixonui.form.label>Dedicación</x-pixonui.form.label>
                <div class="flex items-center space-x-2">
                    <x-pixonui.form.select  wire:model="form.dedicacion_id" :items="$dedicaciones" value="id" caption="nombre"></x-pixonui.form.select>
                    <x-pixonui.wire.loading.spinner wire:target="form.dedicacion_id"></x-pixonui.wire.loading.spinner>
                </div>
                <x-pixonui.form.error for="form.dedicacion_id"></x-pixonui.form.error>
            </div>

            <div>
                <x-pixonui.form.label>Situación</x-pixonui.form.label>
                <div class="flex items-center space-x-2">
                    <x-pixonui.form.select  wire:model="form.situacion_cargo_id" :items="$situaciones" value="id" caption="nombre"></x-pixonui.form.select>
                    <x-pixonui.wire.loading.spinner wire:target="form.situacion_cargo_id"></x-pixonui.wire.loading.spinner>
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
    <div class=" form-control">
        <x-pixonui.form.label>¿Prevé docentes invitados?</x-pixonui.form.label>
        <div class="flex items-center space-x-2">
            <x-pixonui.form.checkbox id="toggle-docentes-invitados" wire:model="form.doc_invitados"></x-pixonui.form.checkbox>
            <x-pixonui.wire.loading.spinner wire:target="form.doc_invitados"></x-pixonui.wire.loading.spinner>
        </div>
    </div>

    @if ($form['doc_invitados'])
        <div class="w-full form-control">
            <x-pixonui.form.label>Indique los nombre de los docentes invitados</x-pixonui.form.label>
            <x-pixonui.wire.quill wire:model="form.doc_invitados_detalles" ref="doc_invitados_detalles"></x-pixonui.wire.quill>
            <x-pixonui.wire.loading.spinner wire:target="form.doc_invitados_detalles"></x-pixonui.wire.loading.spinner>
            <x-pixonui.form.error for="form.doc_invitados_detalles"></x-pixonui.form.error>
        </div>
    @endif

    <!-- Asignatura -->
    <x-pixonui.heading.h2 class="pt-8">Asignatura</x-pixonui.heading.h2>
    <p>
        Estimado Docente tenga presente que al tratarse de carreras presenciales, sólo está permitido realizar menos del 30% de actividades virtuales. Si ud. hará uso de esa opción deberá indicarlo, especificando en qué actividades hará uso de la misma (clases teóricas, prácticas, evaluaciones, consultas, etc.) y con qué herramientas (Zoom  o Meet con clases sincrónicas, aulas híbridas, aulas virtuales, etc.)
    </p>

    @if ($planificacion->materiaPlanEstudio->materia->tipo_materia == "G")
        <div class="w-full form-control">
            <x-pixonui.form.label>Nombre de la materia electiva</x-pixonui.form.label>
            <div class="flex items-center w-48 min-w-full space-x-2">
                <x-pixonui.form.input type="text" maxlength="255" for="form.electiva_nombre" wire:model.lazy="form.electiva_nombre"></x-pixonui.form.input>
                <x-pixonui.wire.loading.spinner wire:target="form.electiva_nombre"></x-pixonui.wire.loading.spinner>
            </div>
            <x-pixonui.form.error for="form.electiva_nombre"></x-pixonui.form.error>
        </div>
    @endif

    <div class="w-full form-control">
        <x-pixonui.form.label>Tipo de asignatura</x-pixonui.form.label>
        <div class="flex items-center space-x-2">
            <x-pixonui.form.select  wire:model="form.tipo_asignatura_id" :items="$tipoAsignatura" value="id" caption="nombre"></x-pixonui.form.select>
            <x-pixonui.wire.loading.spinner wire:target="form.tipo_asignatura_id"></x-pixonui.wire.loading.spinner>
        </div>
    </div>
    <div class="w-full form-control">
        <x-pixonui.form.label>Modalidad de dictado teoricas</x-pixonui.form.label>
        <div class="flex items-center space-x-2">
            <x-pixonui.form.select  wire:model="form.modalidad_dictado_teoriacas_id" :items="$modalidades" value="id" caption="nombre"></x-pixonui.form.select>
            <x-pixonui.wire.loading.spinner wire:target="form.modalidad_dictado_teoriacas_id"></x-pixonui.wire.loading.spinner>
        </div>
    </div>
    <div class="w-full form-control">
        <x-pixonui.form.label>Modalidad de dictado practicas</x-pixonui.form.label>
        <div class="flex items-center space-x-2">
            <x-pixonui.form.select  wire:model="form.modalidad_dictado_practicas_id" :items="$modalidades" value="id" caption="nombre"></x-pixonui.form.select>
            <x-pixonui.wire.loading.spinner wire:target="form.modalidad_dictado_practicas_id"></x-pixonui.wire.loading.spinner>
        </div>
    </div>

    <!-- Carga horaria -->
    <x-pixonui.heading.h2 class="pt-8">Carga Horaria</x-pixonui.heading.h2>
    <div class="w-full form-control">
        <x-pixonui.form.label>Total de horas teórica</x-pixonui.form.label>
        <div class="flex items-center w-20 min-w-full space-x-2">
            <x-pixonui.form.input type="number" for="form.carga_horaria_semanal_teorica" wire:model.lazy="form.carga_horaria_semanal_teorica"></x-pixonui.form.input>
            <x-pixonui.wire.loading.spinner wire:target="form.carga_horaria_semanal_teorica"></x-pixonui.wire.loading.spinner>
        </div>
        <x-pixonui.form.error for="form.carga_horaria_semanal_teorica"></x-pixonui.form.error>
    </div>
    <div class="w-full form-control">
        <x-pixonui.form.label>Total de horas teórica-práctica</x-pixonui.form.label>
        <div class="flex items-center w-20 min-w-full space-x-2">
            <x-pixonui.form.input type="number" for="form.carga_horaria_semanal_practica_teorica" wire:model.lazy="form.carga_horaria_semanal_practica_teorica"></x-pixonui.form.input>
            <x-pixonui.wire.loading.spinner wire:target="form.carga_horaria_semanal_practica_teorica"></x-pixonui.wire.loading.spinner>
        </div>
        <x-pixonui.form.error for="form.carga_horaria_semanal_practica_teorica"></x-pixonui.form.error>
    </div>
    <div class="w-full form-control">
        <x-pixonui.form.label>Total de horas práctica</x-pixonui.form.label>
        <div class="flex items-center w-20 min-w-full space-x-2">
            <x-pixonui.form.input type="number" for="form.carga_horaria_semanal_practica" wire:model.lazy="form.carga_horaria_semanal_practica"></x-pixonui.form.input>
            <x-pixonui.wire.loading.spinner wire:target="form.carga_horaria_semanal_practica"></x-pixonui.wire.loading.spinner>
        </div>
        <x-pixonui.form.error for="form.carga_horaria_semanal_practica"></x-pixonui.form.error>
    </div>
    <div class="w-full form-control">
        <x-pixonui.form.label>Suma de carga horaria (teóricas + teórico-prácticas + prácticas): {{ $cargaHorariaSemanal }}</x-pixonui.form.label>
    </div>
    <div class="alert alert-info text-white">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-current shrink-0 w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        <span>Recuerde que la suma debe coincidir con el toal de horas de la asignatura, aprobada en el plan de estudio vigente</span>
      </div>

    <!-- Prácticos -->
    <x-pixonui.heading.h2 class="pt-8">Prácticos</x-pixonui.heading.h2>
    <div class=" form-control">
        <x-pixonui.form.label>¿Tiene prácticos de aprobación obligatoria?</x-pixonui.form.label>
        <div class="flex items-center space-x-2">
            <x-pixonui.form.checkbox id="toggle-practicos_aprobacion_abligatoria" wire:model="form.practicos_aprobacion_abligatoria"></x-pixonui.form.checkbox>
            <x-pixonui.wire.loading.spinner wire:target="form.practicos_aprobacion_abligatoria"></x-pixonui.wire.loading.spinner>
        </div>
    </div>

    @if ($form['practicos_aprobacion_abligatoria'])
        <div class="w-full form-control">
            <x-pixonui.form.label>Indique cuales son</x-pixonui.form.label>
            <x-pixonui.wire.quill wire:model="form.practicos_aprobacion_abligatoria_detalle" ref="practicos_aprobacion_abligatoria_detalle"></x-pixonui.wire.quill>
            <x-pixonui.wire.loading.spinner wire:target="form.practicos_aprobacion_abligatoria_detalle"></x-pixonui.wire.loading.spinner>
            <x-pixonui.form.error for="form.practicos_aprobacion_abligatoria_detalle"></x-pixonui.form.error>
        </div>
    @endif
    <div class="alert alert-info">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-current shrink-0 w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        <span>Recuerde que, de acuerdo al reglamente de cursada, se puede tener hasta un 30% de prácticos de aprobación obligatoria, siempre que estén especificados en la planificaciones.</span>
      </div>

    <!-- Parciales -->
    <x-pixonui.heading.h2 class="pt-8">Parciales</x-pixonui.heading.h2>
    <div class="w-full form-control">
        <x-pixonui.form.label>Cantidad de parciales previstos</x-pixonui.form.label>
        <div class="flex items-center w-20 min-w-full space-x-2">
            <x-pixonui.form.input type="number" for="form.cantidad_parciales" wire:model.lazy="form.cantidad_parciales"></x-pixonui.form.input>
            <x-pixonui.wire.loading.spinner wire:target="form.cantidad_parciales"></x-pixonui.wire.loading.spinner>
        </div>
        <x-pixonui.form.error for="form.cantidad_parciales"></x-pixonui.form.error>
    </div>
    <div class="w-full form-control">
        <x-pixonui.form.label>Modalidad prevista para los parciales</x-pixonui.form.label>
        <div class="flex items-center space-x-2">
            <x-pixonui.form.select  wire:model="form.modalidad_parciales_id" :items="$modalidades" value="id" caption="nombre"></x-pixonui.form.select>
            <x-pixonui.wire.loading.spinner wire:target="form.modalidad_parciales_id"></x-pixonui.wire.loading.spinner>
        </div>
    </div>

    <!-- Salidas -->
    <x-pixonui.heading.h2 class="pt-8">Salidas</x-pixonui.heading.h2>
    <div class="w-full form-control">
        <x-pixonui.form.label>¿El dictado incluirá salidas al campo (incluye visitas a laboratorios, museos, empresas, etc.)?</x-pixonui.form.label>
        <div class="flex items-center space-x-2">
            <x-pixonui.form.checkbox id="toggle-salida-campo" wire:model="form.salida_campo"></x-pixonui.form.checkbox>
            <x-pixonui.wire.loading.spinner wire:target="form.salida_campo"></x-pixonui.wire.loading.spinner>
        </div>
    </div>
    @if ($form['salida_campo'])
        <!-- SALIDAS DE CAMPO -->
        <div class="w-full form-control">
            <x-pixonui.form.label>Correo de contacto del responsable de viaje</x-pixonui.form.label>
            <div class="flex items-center w-48 min-w-full space-x-2">
                <x-pixonui.form.input type="email" maxlength="255" for="form.correo_responsable_viaje" wire:model.lazy="form.correo_responsable_viaje"></x-pixonui.form.input>
                <x-pixonui.wire.loading.spinner wire:target="form.correo_responsable_viaje"></x-pixonui.wire.loading.spinner>
            </div>
            <x-pixonui.form.error for="form.correo_responsable_viaje"></x-pixonui.form.error>
        </div>
        <div class="alert alert-info">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-current shrink-0 w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            <span>El coordinador de viaje se comunicará oportunamente para coordinar los mismos.</span>
        </div>
        <!----------------------------------------->
    @endif
    <div class="w-full form-control">
        <x-pixonui.form.label>¿Prevé salidas en conjunto con otra/s cátedras?</x-pixonui.form.label>
        <div class="flex items-center space-x-2">
            <x-pixonui.form.checkbox id="toggle-salida-campo-conjuntas" wire:model="form.salida_campo_conjuntas"></x-pixonui.form.checkbox>
            <x-pixonui.wire.loading.spinner wire:target="form.salida_campo_conjuntas"></x-pixonui.wire.loading.spinner>
        </div>
    </div>
    @if ($form['salida_campo_conjuntas'])
        <div class="w-full form-control">
            <x-pixonui.form.label>Indique con cuál o cuáles cátedras prevé salidas conjuntas</x-pixonui.form.label>
            <x-pixonui.wire.quill wire:model="form.salida_campo_catedras" ref="quillsalidascampocatedras"></x-pixonui.wire.quill>
            <x-pixonui.wire.loading.spinner wire:target="form.salida_campo_catedras"></x-pixonui.wire.loading.spinner>
            <x-pixonui.form.error for="form.salida_campo_catedras"></x-pixonui.form.error>
        </div>
    @endif

    <!-- Actividades conjuntas -->
    <x-pixonui.heading.h2 class="pt-8">Actividades</x-pixonui.heading.h2>
    <div class="w-full form-control">
        <x-pixonui.form.label>¿Prevé actividades conjuntas con otras cátedras?</x-pixonui.form.label>
        <div class="flex items-center space-x-2">
            <x-pixonui.form.checkbox id="toggle-actividades-conjuntas" wire:model="form.actividades_conjuntas"></x-pixonui.form.checkbox>
            <x-pixonui.wire.loading.spinner wire:target="form.actividades_conjuntas"></x-pixonui.wire.loading.spinner>
        </div>
    </div>
    @if ($form['actividades_conjuntas'])
        <div class="w-full form-control">
            <x-pixonui.form.label>Indique con cuál o cuáles cátedras prevé actividades conjuntas</x-pixonui.form.label>
            <x-pixonui.wire.quill wire:model="form.actividades_conjuntas_catedras" ref="quillactividadesconjuntas"></x-pixonui.wire.quill>
            <x-pixonui.wire.loading.spinner wire:target="form.actividades_conjuntas_catedras"></x-pixonui.wire.loading.spinner>
            <x-pixonui.form.error for="form.actividades_conjuntas_catedras"></x-pixonui.form.error>
        </div>
        <div class="w-full form-control">
            <x-pixonui.form.label>Indique las actividades previstas</x-pixonui.form.label>
            <x-pixonui.wire.quill wire:model="form.actividades_conjuntas_tipo" ref="quillactividadestipo"></x-pixonui.wire.quill>
            <x-pixonui.wire.loading.spinner wire:target="form.actividades_conjuntas_tipo"></x-pixonui.wire.loading.spinner>
            <x-pixonui.form.error for="form.actividades_conjuntas_tipo"></x-pixonui.form.error>
        </div>
    @endif
    <div class="w-full form-control">
        <x-pixonui.form.label>¿Prevé actividades académicas complementarias como charlas, seminarios, talleres, etc.?</x-pixonui.form.label>
        <div class="flex items-center space-x-2">
            <x-pixonui.form.checkbox id="toggle-actividades-complementarias" wire:model="form.actividades_complementarias"></x-pixonui.form.checkbox>
            <x-pixonui.wire.loading.spinner wire:target="form.actividades_complementarias"></x-pixonui.wire.loading.spinner>
        </div>
    </div>
    @if ($form['actividades_complementarias'])
        <div class="w-full form-control">
            <x-pixonui.form.label>Indique el tipo de actividades complmentarias</x-pixonui.form.label>
            <x-pixonui.wire.quill wire:model="form.actividades_complementarias_tipo" ref="quillactividadescomplementariastipo"></x-pixonui.wire.quill>
            <x-pixonui.wire.loading.spinner wire:target="form.actividades_complementarias_tipo"></x-pixonui.wire.loading.spinner>
            <x-pixonui.form.error for="form.actividades_complementarias_tipo"></x-pixonui.form.error>
        </div>
    @endif

    <!-- Herramientas virtuales -->
    <x-pixonui.heading.h2 class="pt-8">Herramientas virtuales</x-pixonui.heading.h2>
    <div class="w-full form-control">
        <x-pixonui.form.label>¿La asignatura cuenta con aula virtual?</x-pixonui.form.label>
        <div class="flex items-center space-x-2">
            <x-pixonui.form.checkbox id="toggle-aula-virtual" wire:model="form.aula_virtual"></x-pixonui.form.checkbox>
            <x-pixonui.wire.loading.spinner wire:target="form.aula_virtual"></x-pixonui.wire.loading.spinner>
        </div>
    </div>
    @if ($form['aula_virtual'])
        <div class="w-full form-control">
            <x-pixonui.form.label>¿Hará uso del aula virtual como complemento al dictado?</x-pixonui.form.label>
            <div class="flex items-center space-x-2">
                <x-pixonui.form.checkbox id="toggle-aula-virtual-complemento-dictado" wire:model="form.aula_virtual_complemento_dictado"></x-pixonui.form.checkbox>
                <x-pixonui.wire.loading.spinner wire:target="form.aula_virtual_complemento_dictado"></x-pixonui.wire.loading.spinner>
            </div>
        </div>
    @endif
    <div class="w-full form-control">
        <x-pixonui.form.label>¿Se prevé en el dictado el uso de otras herramientas virtuales como laboratorios virtuales, aulas invertidas, softwares específicos, aulas híbridas, etc.?</x-pixonui.form.label>
        <div class="flex items-center space-x-2">
            <x-pixonui.form.checkbox id="toggle-herramientas-virtuales" wire:model="form.herramientas_virtuales"></x-pixonui.form.checkbox>
            <x-pixonui.wire.loading.spinner wire:target="form.herramientas_virtuales"></x-pixonui.wire.loading.spinner>
        </div>
    </div>
    @if ($form['herramientas_virtuales'])
        <div class="w-full form-control">
            <x-pixonui.form.label>Indique las herramientas virtuales a utilizar</x-pixonui.form.label>
            <x-pixonui.wire.quill wire:model="form.herramientas_virtuales_previstas" ref="quillherramientasvirtuales"></x-pixonui.wire.quill>
            <x-pixonui.wire.loading.spinner wire:target="form.herramientas_virtuales_previstas"></x-pixonui.wire.loading.spinner>
            <x-pixonui.form.error for="form.herramientas_virtuales_previstas"></x-pixonui.form.error>
        </div>
    @endif

    <!-- Observaciones -->
    <x-pixonui.heading.h2 class="pt-8">Observaciones</x-pixonui.heading.h2>
    <div class="w-full form-control">
        <x-pixonui.wire.quill wire:model="form.observacioens_sugerencias" ref="quillobservaciones"></x-pixonui.wire.quill>
        <x-pixonui.wire.loading.spinner wire:target="form.observacioens_sugerencias"></x-pixonui.wire.loading.spinner>
        <x-pixonui.form.error for="form.observacioens_sugerencias"></x-pixonui.form.error>
    </div>

    <!-- Adjuntar programa -->
    <x-pixonui.heading.h2 class="pt-8">Adjuntar programa</x-pixonui.heading.h2>
    @if ($form['urlprograma']!=null)
        <div class="flex items-center justify-start">
            <img src="{{asset('img/icon-pdf.png')}}">
            <div><a target="_back" href="{{asset($form['urlprograma'])}}">ver programa</a></div>
        </div>
    @endif
    <div class="w-full space-y-2 form-control">
        <input type="file" wire:model="file" accept="application/pdf" class="w-full max-w-xs border-2 rounded-md border-primary file-input file-input-bordered file-input-primary">
        <div wire:loading wire:target="file">Subiendo archivo...</div>
        @error('file') <span class="text-red-500 error">{{ $message }}</span> @enderror
        <div class="text-blue-500">* Solos documentos PDF hasta 10mb.</div>
    </div>

    <!-- Botones -->
    <div class="flex justify-end py-4 space-x-4" x-data="{}">
        <a class="max-w-md btn" href="{{ route('planificacion.index') }}"  >
            Volver
        </a>
        <a class="btn btn-wide btn-primary" x-on:click="
                aletWarning('¿Desea presentar la planificación?', 'Una vez presentada <b>no podra editarla</b>.', 'Si, continuar', 'Cancelar', function() {
                    $wire.OnPresentar();
                });
            ">
            Presentar
        </a>
    </div>

    @push('scripts')

    @endpush


</div>
