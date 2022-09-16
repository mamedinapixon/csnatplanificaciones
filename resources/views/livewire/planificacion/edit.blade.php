<div class="space-y-4 ">
    <x-pixonui.heading.h2 class="pt-8">Docentes</x-pixonui.heading.h2>
    <div class="w-full form-control">
        <x-pixonui.form.label>Docente a cargo</x-pixonui.form.label>
        <div class="flex items-center space-x-2">
            <x-pixonui.form.select  wire:model="form.docente_id" :items="$docentes" value="id" caption="FullName"></x-pixonui.form.select>
            <x-pixonui.wire.loading.spinner wire:target="form.docente_id"></x-pixonui.wire.loading.spinner>
        </div>
    </div>
    <!-- DOCENTES QUE PARTICIPAN DEL DICTADO -->
    <livewire:docentes.tbl-participantes :planificacion_id="$planificacion_id" />
    <!----------------------------------------->
    <div class=" form-control">
        <x-pixonui.form.label>¿Prevé docentes invitados?</x-pixonui.form.label>
        <div class="flex items-center space-x-2">
            <x-pixonui.form.checkbox id="toggle-docentes-invitados" wire:model="form.doc_invitados"></x-pixonui.form.checkbox>
            <x-pixonui.wire.loading.spinner wire:target="form.doc_invitados"></x-pixonui.wire.loading.spinner>
        </div>
    </div>

    <!-- Asignatura -->
    <x-pixonui.heading.h2 class="pt-8">Asignatura</x-pixonui.heading.h2>
    <div class="w-full form-control">
        <x-pixonui.form.label>Tipo de asignatura</x-pixonui.form.label>
        <div class="flex items-center space-x-2">
            <x-pixonui.form.select  wire:model="form.tipo_asignatura_id" :items="$tipoAsignatura" value="id" caption="nombre"></x-pixonui.form.select>
            <x-pixonui.wire.loading.spinner wire:target="form.tipo_asignatura_id"></x-pixonui.wire.loading.spinner>
        </div>
    </div>
    <div class="w-full form-control">
        <x-pixonui.form.label>Carga horaria total</x-pixonui.form.label>
        <div class="flex items-center w-20 min-w-full space-x-2">
            <x-pixonui.form.input type="number" for="form.carga_horaria" wire:model.lazy="form.carga_horaria"></x-pixonui.form.input>
            <x-pixonui.wire.loading.spinner wire:target="form.carga_horaria"></x-pixonui.wire.loading.spinner>
        </div>
        <x-pixonui.form.error for="form.carga_horaria"></x-pixonui.form.error>
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
    <x-pixonui.heading.h2 class="pt-8">Carga Horaria Semanal</x-pixonui.heading.h2>
    <div class="w-full form-control">
        <x-pixonui.form.label>Carga horaria semanal de practica</x-pixonui.form.label>
        <div class="flex items-center w-20 min-w-full space-x-2">
            <x-pixonui.form.input type="number" for="form.carga_horaria_semanal_practica" wire:model.lazy="form.carga_horaria_semanal_practica"></x-pixonui.form.input>
            <x-pixonui.wire.loading.spinner wire:target="form.carga_horaria_semanal_practica"></x-pixonui.wire.loading.spinner>
        </div>
        <x-pixonui.form.error for="form.carga_horaria_semanal_practica"></x-pixonui.form.error>
    </div>
    <div class="w-full form-control">
        <x-pixonui.form.label>Carga horaria semanal de practica-teorica</x-pixonui.form.label>
        <div class="flex items-center w-20 min-w-full space-x-2">
            <x-pixonui.form.input type="number" for="form.carga_horaria_semanal_practica_teorica" wire:model.lazy="form.carga_horaria_semanal_practica_teorica"></x-pixonui.form.input>
            <x-pixonui.wire.loading.spinner wire:target="form.carga_horaria_semanal_practica_teorica"></x-pixonui.wire.loading.spinner>
        </div>
        <x-pixonui.form.error for="form.carga_horaria_semanal_practica_teorica"></x-pixonui.form.error>
    </div>
    <div class="w-full form-control">
        <x-pixonui.form.label>Carga horaria semanal de teorica</x-pixonui.form.label>
        <div class="flex items-center w-20 min-w-full space-x-2">
            <x-pixonui.form.input type="number" for="form.carga_horaria_semanal_teorica" wire:model.lazy="form.carga_horaria_semanal_teorica"></x-pixonui.form.input>
            <x-pixonui.wire.loading.spinner wire:target="form.carga_horaria_semanal_teorica"></x-pixonui.wire.loading.spinner>
        </div>
        <x-pixonui.form.error for="form.carga_horaria_semanal_teorica"></x-pixonui.form.error>
    </div>
    <div class="w-full form-control">
        <x-pixonui.form.label>Carga horaria semanal (teóricas + teórico prácticas + prácticas): {{ $cargaHorariaSemanal }}</x-pixonui.form.label>
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
        <livewire:salidas.tbl-salidas :planificacion_id='$planificacion_id' />
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
        <x-pixonui.form.label>¿Se prevé en el dictado el uso de otras herramientas virtuales como laboratorios virtuales, aulas invertidas, softwares específicos, etc.?</x-pixonui.form.label>
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
        <x-pixonui.form.label>Con el objetivo de poder mejorar y/o potenciar el dictado de su asignatura y a partir de su experiencia en años anteriores (cantidad de alumnos promedio que cursan, problemas recurrentes, etc.) señale aquellas necesidades que podrían ayudarle o facilitarle en el dictado (algún aula en especial, algún material didáctico, insumos, etc.)</x-pixonui.form.label>
        <x-pixonui.wire.quill wire:model="form.necesidades" ref="quillnecesidades"></x-pixonui.wire.quill>
        <x-pixonui.wire.loading.spinner wire:target="form.necesidades"></x-pixonui.wire.loading.spinner>
        <x-pixonui.form.error for="form.necesidades"></x-pixonui.form.error>
    </div>
    <div class="w-full form-control">
        <x-pixonui.form.label>Observaciones o sugerencias que quisiera mencionar</x-pixonui.form.label>
        <x-pixonui.wire.quill wire:model="form.observacioens_sugerencias" ref="quillobservaciones"></x-pixonui.wire.quill>
        <x-pixonui.wire.loading.spinner wire:target="form.observacioens_sugerencias"></x-pixonui.wire.loading.spinner>
        <x-pixonui.form.error for="form.observacioens_sugerencias"></x-pixonui.form.error>
    </div>
    <div class="flex justify-end space-x-4 py-4" x-data="{}">
        <a class="btn max-w-md" href="{{ route('planificacion.index') }}"  >
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
