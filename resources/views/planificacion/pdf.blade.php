<div class="print-p-0 py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="print">
            <h1>
                {{ $asigantura }}
            </h1>
            <h2>
                <small class="font-light">{{ $periodo_lectivo }} | {{ $carrera }}</small>
            </h2>
        </div>

        <div class="overflow-hidden bg-white sm:rounded-lg">
            <div class="print-p-0 space-y-2 border-b border-gray-200 bg-white p-6 sm:px-20">
                <x-pixonui.heading.h2 class="pt-8">Docentes</x-pixonui.heading.h2>
                <x-pixonui.show.labeltext caption="Docente a cargo">
                    @if (!empty($planificacion->docenteCargo))
                        {{ $planificacion->docenteCargo->apellido }}, {{ $planificacion->docenteCargo->nombre }}
                    @endif
                </x-pixonui.show.labeltext>
                <div class="flex space-x-4">
                    <x-pixonui.show.labeltext caption="Cargo">
                        @if (!empty($planificacion->cargo))
                            {{ $planificacion->cargo->nombre }}
                        @endif
                    </x-pixonui.show.labeltext>
                    <x-pixonui.show.labeltext caption="Dedicación">
                        @if (!empty($planificacion->dedicacion))
                            {{ $planificacion->dedicacion->nombre }}
                        @endif
                    </x-pixonui.show.labeltext>
                    <x-pixonui.show.labeltext caption="Situación">
                        @if (!empty($planificacion->situacion))
                            {{ $planificacion->situacion->nombre }}
                        @endif
                    </x-pixonui.show.labeltext>
                </div>


                <x-pixonui.show.labeltext caption="Resto del plantel docente de la Asignatura:">
                </x-pixonui.show.labeltext>
                <table class="table table-zebra w-full">
                    <!-- head -->
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Docente</th>
                            <th>Cargo</th>
                            <th>Dedicación</th>
                            <th>Situación</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- rows-->
                        @if (!empty($docentesPartipan))
                            @foreach ($docentesPartipan as $docentePartipan)
                                <tr wire:key="docente-partipan-{{ $docentePartipan->id }}">
                                    <td>{{ $loop->index + 1 }}</td>
                                    <th align="left">{{ $docentePartipan->docente->apellido }},
                                        {{ $docentePartipan->docente->nombre }}</th>
                                    <td>{{ $docentePartipan->cargo->nombre }}</td>
                                    <td>{{ $docentePartipan->dedicacion->nombre }}</td>
                                    <td>{{ $docentePartipan->situacion->nombre ?? '' }}</td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>

                <x-pixonui.show.labelsino caption="¿Tiene auxiliar docente estudiantil?" :value="$planificacion->auxiliar_docente_estudiantil" />
                @if ($planificacion->auxiliar_docente_estudiantil)
                    <x-pixonui.show.labeltext caption="Indique apellido y nombre de cada auxiliar:">
                        <div class="mb-3 font-light text-gray-500 dark:text-gray-400">
                            {!! $planificacion->auxiliar_docente_estudiantil_detalle !!}
                        </div>
                    </x-pixonui.show.labeltext>
                @endif

                <x-pixonui.show.labelsino
                    caption="¿La cátedra cuenta con formación de recursos humanos (Estudiantil y/o graduado)?"
                    :value="$planificacion->formacion_recurso_humano" />
                @if ($planificacion->formacion_recurso_humano)
                    <x-pixonui.show.labeltext caption="Indique apellido y nombre">
                        <div class="mb-3 font-light text-gray-500 dark:text-gray-400">
                            {!! $planificacion->formacion_recurso_humano_detalle !!}
                        </div>
                    </x-pixonui.show.labeltext>
                @endif

                <x-pixonui.show.labelsino caption="¿Prevé docentes invitados?" :value="$planificacion->doc_invitados" />
                @if ($planificacion->doc_invitados)
                    <x-pixonui.show.labeltext caption="Indique en cuales">
                        <div class="mb-3 font-light text-gray-500 dark:text-gray-400">
                            {!! $planificacion->doc_invitados_detalles !!}
                        </div>
                    </x-pixonui.show.labeltext>
                @endif

                <!-- Asignatura -->
                <x-pixonui.heading.h2 class="pt-8">Asignatura</x-pixonui.heading.h2>
                @if ($planificacion->materiaPlanEstudio->materia->tipo_materia == 'G')
                    <x-pixonui.show.labeltext
                        caption="Nombre de la materia electiva">{{ $planificacion->electiva_nombre }}</x-pixonui.show.labeltext>
                @endif
                <x-pixonui.show.labeltext
                    caption="Tipo de asignatura">{{ $planificacion->tipoAsignatura != null ? $planificacion->tipoAsignatura->nombre : '' }}</x-pixonui.show.labeltext>
                <x-pixonui.show.labeltext
                    caption="Modalidad de dictado teoricas">{{ $planificacion->modalidadDictadoTeorica != null ? $planificacion->modalidadDictadoTeorica->nombre : '' }}</x-pixonui.show.labeltext>
                <x-pixonui.show.labeltext
                    caption="Modalidad de dictado practicas">{{ $planificacion->modalidadDictadoPractica != null ? $planificacion->modalidadDictadoPractica->nombre : '' }}</x-pixonui.show.labeltext>


                <!-- Carga horaria -->
                <x-pixonui.heading.h2 class="pt-8">Carga Horaria</x-pixonui.heading.h2>
                <x-pixonui.show.labeltext
                    caption="Total de horas teóricas">{{ $planificacion->carga_horaria_semanal_teorica }}</x-pixonui.show.labeltext>
                <x-pixonui.show.labeltext
                    caption="Total de horas teórica-práctica">{{ $planificacion->carga_horaria_semanal_practica_teorica }}</x-pixonui.show.labeltext>
                <x-pixonui.show.labeltext
                    caption="Total de horas prácticas">{{ $planificacion->carga_horaria_semanal_practica }}</x-pixonui.show.labeltext>
                <x-pixonui.show.labeltext
                    caption="Suma de carga horaria (teóricas + teórico-prácticas + prácticas)">{{ $planificacion->carga_horaria_semanal_practica + $planificacion->carga_horaria_semanal_practica_teorica + $planificacion->carga_horaria_semanal_teorica }}</x-pixonui.show.labeltext>

                <!-- Práctico -->
                <x-pixonui.heading.h2 class="pt-8">Prácticos</x-pixonui.heading.h2>
                <x-pixonui.show.labelsino caption="¿Tiene prácticos de aprobación obligatoria?" :value="$planificacion->practicos_aprobacion_abligatoria" />
                @if ($planificacion->practicos_aprobacion_abligatoria)
                    <x-pixonui.show.labeltext caption="Indique cuales son">
                        <div class="mb-3 font-light text-gray-500 dark:text-gray-400">
                            {!! $planificacion->practicos_aprobacion_abligatoria_detalle !!}
                        </div>
                    </x-pixonui.show.labeltext>
                @endif

                <!-- Parciales -->
                <x-pixonui.heading.h2 class="pt-8">Parciales</x-pixonui.heading.h2>
                <x-pixonui.show.labeltext
                    caption="Cantidad de parciales previstos">{{ $planificacion->cantidad_parciales }}</x-pixonui.show.labeltext>
                <x-pixonui.show.labeltext
                    caption="Modalidad prevista para los parciales">{{ $planificacion->modalidadParcial != null ? $planificacion->modalidadParcial->nombre : '' }}</x-pixonui.show.labeltext>

                <!-- Salidas -->
                <x-pixonui.heading.h2 class="pt-8">Salidas</x-pixonui.heading.h2>
                <x-pixonui.show.labelsino :value="$planificacion->salida_campo"
                    caption="¿El dictado incluirá salidas al campo (incluye visitas a laboratorios, museos, empresas, etc.)?"></x-pixonui.show.labeltext>
                    @if ($planificacion->salida_campo)
                        <x-pixonui.show.labeltext
                            caption="Correo de contacto del responsable de viaje">{{ $planificacion->correo_responsable_viaje }}</x-pixonui.show.labeltext>
                    @endif
                    <x-pixonui.show.labelsino :value="$planificacion->salida_campo_conjuntas"
                        caption="¿Prevé salidas en conjunto con otra/s cátedras?"></x-pixonui.show.labeltext>
                        @if ($planificacion->salida_campo_conjuntas)
                            <x-pixonui.show.labeltext
                                caption="Indique con cuál o cuáles cátedras prevé salidas conjuntas">
                                <div class="mb-3 font-light text-gray-500 dark:text-gray-400">
                                    {!! $planificacion->salida_campo_catedras !!}
                                </div>
                            </x-pixonui.show.labeltext>
                        @endif

                        <!-- Actividades conjuntas -->
                        <x-pixonui.heading.h2 class="pt-8">Actividades</x-pixonui.heading.h2>
                        <x-pixonui.show.labelsino :value="$planificacion->actividades_conjuntas"
                            caption="¿Prevé actividades conjuntas con otras cátedras?"></x-pixonui.show.labeltext>
                            @if ($planificacion->actividades_conjuntas)
                                <x-pixonui.show.labeltext
                                    caption="Indique con cuál o cuáles cátedras prevé actividades conjuntas">
                                    <div class="mb-3 font-light text-gray-500 dark:text-gray-400">
                                        {!! $planificacion->actividades_conjuntas_catedras !!}
                                    </div>
                                </x-pixonui.show.labeltext>
                                <x-pixonui.show.labeltext caption="Indique las actividades previstas">
                                    <div class="mb-3 font-light text-gray-500 dark:text-gray-400">
                                        {!! $planificacion->actividades_conjuntas_tipo !!}
                                    </div>
                                </x-pixonui.show.labeltext>
                            @endif
                            <x-pixonui.show.labelsino :value="$planificacion->actividades_complementarias"
                                caption="¿Prevé actividades académicas complementarias como charlas, seminarios, talleres, etc.?"></x-pixonui.show.labeltext>
                                @if ($planificacion->actividades_complementarias)
                                    <x-pixonui.show.labeltext caption="Indique el tipo de actividades complmentarias">
                                        <div class="mb-3 font-light text-gray-500 dark:text-gray-400">
                                            {!! $planificacion->actividades_complementarias_tipo !!}
                                        </div>
                                    </x-pixonui.show.labeltext>
                                @endif

                                <!-- Herramientas virtuales -->
                                <x-pixonui.heading.h2 class="pt-8">Herramientas virtuales</x-pixonui.heading.h2>
                                <x-pixonui.show.labelsino :value="$planificacion->aula_virtual"
                                    caption="¿La asignatura cuenta con aula virtual?"></x-pixonui.show.labeltext>
                                    @if ($planificacion->aula_virtual)
                                        <x-pixonui.show.labelsino :value="$planificacion->aula_virtual_complemento_dictado"
                                            caption="¿Hará uso del aula virtual como complemento al dictado?"></x-pixonui.show.labeltext>
                                    @endif
                                    <x-pixonui.show.labelsino :value="$planificacion->herramientas_virtuales"
                                        caption="¿Se prevé en el dictado el uso de otras herramientas virtuales como laboratorios virtuales, aulas invertidas, softwares específicos, etc.?"></x-pixonui.show.labeltext>
                                        @if ($planificacion->herramientas_virtuales)
                                            <x-pixonui.show.labeltext
                                                caption="Indique las herramientas virtuales a utilizar">
                                                <div class="mb-3 font-light text-gray-500 dark:text-gray-400">
                                                    {!! $planificacion->herramientas_virtuales_previstas !!}
                                                </div>
                                            </x-pixonui.show.labeltext>
                                        @endif

                                        <!-- Observaciones -->
                                        <x-pixonui.heading.h2 class="pt-8">Observaciones</x-pixonui.heading.h2>
                                        {!! $planificacion->necesidades !!}
                                        {!! $planificacion->observacioens_sugerencias !!}
            </div>
        </div>
    </div>
</div>
