<x-app-layout>
    @if (session('message'))
        @push('scripts')
        <script>
            Swal.fire(
                    '{{ session("message") }}',
                    '',
                    'success'
                    )
        </script>
        @endpush
    @endif
    <div class="py-12 print-p-0">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="no-print">
                <x-pixonui.heading.h1><small class="font-light">{{ $memoria->anio_academico }}</small><br>
                    {{ $memoria->user->name }}
                </x-pixonui.heading.h1>
                </div>
            <div class="print">
                <h1>
                    <small class="font-light">{{ $memoria->anio_academico }}</small>
                    <br>
                    {{ $memoria->user->name }}
                </h1>
            </div>

            <div class="overflow-hidden bg-white sm:rounded-lg">
                <div class="p-6 space-y-2 bg-white border-b border-gray-200 print-p-0 sm:px-20">

                    <x-pixonui.show.labeltext caption="Asignatura en la que participó como docente estable">
                    </x-pixonui.show.labeltext>
                    <table class="table w-full table-zebra">
                        <!-- head -->
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Asignatura</th>
                                <th>Cargo</th>
                                <th>Dedicación</th>
                                <th>Asignatura</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- rows-->
                            @if (!empty($memorias_asignaturas_estables))
                                @foreach ($memorias_asignaturas_estables as $memoria_asignatura)
                                    <tr wire:key="docente-partipan-{{ $memoria_asignatura->id }}">
                                        <td>{{ $loop->index + 1 }}</td>
                                        <th>{{ $memoria_asignatura->asignatura }}</th>
                                        <td>{{ $memoria_asignatura->cargo->nombre }}</td>
                                        <td>{{ $memoria_asignatura->dedicacion->nombre }}</td>
                                        <td>{{ $memoria_asignatura->situacion_cargo->nombre }}</td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>

                    <x-pixonui.show.labeltext caption="Asignaturas en la que partición como Docente invitado">
                    </x-pixonui.show.labeltext>
                    <table class="table w-full table-zebra">
                        <!-- head -->
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Asignatura</th>
                                <th>Cargo</th>
                                <th>Dedicación</th>
                                <th>Asignatura</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- rows-->
                            @if (!empty($memorias_asignaturas_invitado))
                                @foreach ($memorias_asignaturas_invitado as $memoria_asignatura)
                                    <tr wire:key="docente-partipan-{{ $memoria_asignatura->id }}">
                                        <td>{{ $loop->index + 1 }}</td>
                                        <th>{{ $memoria_asignatura->asignatura }}</th>
                                        <td>{{ $memoria_asignatura->cargo->nombre }}</td>
                                        <td>{{ $memoria_asignatura->dedicacion->nombre }}</td>
                                        <td>{{ $memoria_asignatura->situacion_cargo->nombre }}</td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>

                    <x-pixonui.show.labelsino :value="$memoria->dicto_cursos_grado" caption="Dictó Cursos y/o Cursillos de grado"></x-pixonui.show.labeltext>
                    @if($memoria->dicto_cursos_grado)
                        <x-pixonui.show.labeltext caption="Detalle el/los mismos">
                            <div class="mb-3 font-light text-gray-500 dark:text-gray-400">
                                {!! $memoria->dicto_cursos_grado_detalle !!}
                            </div>
                        </x-pixonui.show.labeltext>
                    @endif

                    <x-pixonui.show.labelsino :value="$memoria->participo_jurado_titular" caption="¿Participó como jurado Titular en Tesinas, Seminarios y/o PPS?"></x-pixonui.show.labeltext>
                    @if($memoria->participo_jurado_titular)
                        <x-pixonui.show.labeltext caption="Especifique los datos: Cantidad, tesistas, fechas etc.">
                            <div class="mb-3 font-light text-gray-500 dark:text-gray-400">
                                {!! $memoria->participo_jurado_titular_detalle !!}
                            </div>
                        </x-pixonui.show.labeltext>
                    @endif

                    <x-pixonui.show.labelsino :value="$memoria->designado_jurado_suplente" caption="¿Fue designado jurado Suplente en Tesinas, Seminarios y/o PPS?<"></x-pixonui.show.labeltext>
                    @if($memoria->designado_jurado_suplente)
                        <x-pixonui.show.labeltext caption="Especifique: Cantidad, tesistas, fechas etc.">
                            <div class="mb-3 font-light text-gray-500 dark:text-gray-400">
                                {!! $memoria->designado_jurado_suplente_detalle !!}
                            </div>
                        </x-pixonui.show.labeltext>
                    @endif

                    <x-pixonui.show.labelsino :value="$memoria->jurado_titular_concursos" caption="¿Participó como Jurado Titular en Concursos Docentes y/o Evaluaciones Académicas?"></x-pixonui.show.labeltext>
                        @if($memoria->jurado_titular_concursos)
                            <x-pixonui.show.labeltext caption="Indique en cuales:">
                                <div class="mb-3 font-light text-gray-500 dark:text-gray-400">
                                    {!! $memoria->jurado_titular_concursos_detalle !!}
                                </div>
                            </x-pixonui.show.labeltext>
                        @endif

                    <x-pixonui.show.labelsino :value="$memoria->designado_jurado_suplente_concursos" caption="¿Fue designado como Jurado Suplente en Concursos Docentes y/o Evaluaciones Académicas?"></x-pixonui.show.labeltext>
                    @if($memoria->designado_jurado_suplente_concursos)
                        <x-pixonui.show.labeltext caption="Indique en cuáles">
                            <div class="mb-3 font-light text-gray-500 dark:text-gray-400">
                                {!! $memoria->designado_jurado_suplente_concursos_detalle !!}
                            </div>
                        </x-pixonui.show.labeltext>
                    @endif

                    <x-pixonui.show.labelsino :value="$memoria->participo_armado_aula_virtual" caption="¿Participó en el armado y/o actualización del aula virtual de su/s asignatura/s?"></x-pixonui.show.labeltext>

                    <x-pixonui.show.labelsino :value="$memoria->participo_elaboracion_propuesta_innovadora" caption="¿Participó en la elaboración de alguna propuesta innovadora en su actividad docente?"></x-pixonui.show.labeltext>
                    @if($memoria->participo_elaboracion_propuesta_innovadora)
                        <x-pixonui.show.labeltext caption="Indique en cual:">
                            <div class="mb-3 font-light text-gray-500 dark:text-gray-400">
                                {!! $memoria->participo_elaboracion_propuesta_innovadora_detalle !!}
                            </div>
                        </x-pixonui.show.labeltext>
                    @endif

                    <x-pixonui.show.labelsino :value="$memoria->elaboro_material_didactico" caption="Elaboró o actualizó material Didáctico o Publicaciones docentes para su/s asignatura/s?"></x-pixonui.show.labeltext>
                    @if($memoria->elaboro_material_didactico)
                        <x-pixonui.show.labeltext caption="Indique en cual/es">
                            <div class="mb-3 font-light text-gray-500 dark:text-gray-400">
                                {!! $memoria->elaboro_material_didactico_detalle !!}
                            </div>
                        </x-pixonui.show.labeltext>
                    @endif

                    <x-pixonui.show.labelsino :value="$memoria->participo_dictado_cursos" caption="¿Participó en el dictado de Cursos de Posgrado?"></x-pixonui.show.labeltext>
                    @if($memoria->participo_dictado_cursos)
                        <x-pixonui.show.labeltext caption="Indique en cual/es:">
                            <div class="mb-3 font-light text-gray-500 dark:text-gray-400">
                                {!! $memoria->participo_dictado_cursos_detalle !!}
                            </div>
                        </x-pixonui.show.labeltext>
                    @endif

                    <x-pixonui.show.labelsino :value="$memoria->formo_parte_comite_carrera_posgrado" caption="¿Formó parte de la Dirección y/o Comité Académico de alguna/s Carrera/s de Posgrado?"></x-pixonui.show.labeltext>
                    @if($memoria->formo_parte_comite_carrera_posgrado)
                        <x-pixonui.show.labeltext caption="Indique en cual/es y su función">
                            <div class="mb-3 font-light text-gray-500 dark:text-gray-400">
                                {!! $memoria->formo_parte_comite_carrera_posgrado_detalle !!}
                            </div>
                        </x-pixonui.show.labeltext>
                    @endif

                    <x-pixonui.show.labelsino :value="$memoria->docente_estable_carrera_posgrado" caption="¿Es Docente Estable de alguna/s Carrera/s de Posgrado?"></x-pixonui.show.labeltext>
                    @if($memoria->docente_estable_carrera_posgrado)
                        <x-pixonui.show.labeltext caption="Indique en cual/es">
                            <div class="mb-3 font-light text-gray-500 dark:text-gray-400">
                                {!! $memoria->docente_estable_carrera_posgrado_detalle !!}
                            </div>
                        </x-pixonui.show.labeltext>
                    @endif

                    <x-pixonui.show.labelsino :value="$memoria->participo_supervision_tesis_posgrado" caption="¿Participó de Alguna/s Comisión/es de Supervisión de Tesis de Posgrado?"></x-pixonui.show.labeltext>
                    @if($memoria->participo_supervision_tesis_posgrado)
                        <x-pixonui.show.labeltext caption="Indique en cual/es">
                            <div class="mb-3 font-light text-gray-500 dark:text-gray-400">
                                {!! $memoria->participo_supervision_tesis_posgrado_detalle !!}
                            </div>
                        </x-pixonui.show.labeltext>
                    @endif

                    <x-pixonui.show.labelsino :value="$memoria->jurado_tesis_grado" caption="¿Fue Jurado Titular y/o Suplente de alguna/s tesis de Posgrado?"></x-pixonui.show.labeltext>
                    @if($memoria->jurado_tesis_grado)
                        <x-pixonui.show.labeltext caption="Indique en cual/es">
                            <div class="mb-3 font-light text-gray-500 dark:text-gray-400">
                                {!! $memoria->jurado_tesis_grado_detalle !!}
                            </div>
                        </x-pixonui.show.labeltext>
                    @endif

                    <x-pixonui.show.labelsino :value="$memoria->coordino_curso_posgrado" caption="¿Coordinó algún/s Curso/s de Posgrado?"></x-pixonui.show.labeltext>
                    @if($memoria->coordino_curso_posgrado)
                        <x-pixonui.show.labeltext caption="Indique cuantos y en cual/es">
                            <div class="mb-3 font-light text-gray-500 dark:text-gray-400">
                                {!! $memoria->coordino_curso_posgrado_detalle !!}
                            </div>
                        </x-pixonui.show.labeltext>
                    @endif

                    <x-pixonui.show.labelsino :value="$memoria->dicto_cursos_profesional" caption="¿Dictó Cursos de Extensión y/o Capacitación Profesional?"></x-pixonui.show.labeltext>
                    @if($memoria->dicto_cursos_profesional)
                        <x-pixonui.show.labeltext caption="Indique en cual/es:">
                            <div class="mb-3 font-light text-gray-500 dark:text-gray-400">
                                {!! $memoria->dicto_cursos_profesional_detalle !!}
                            </div>
                        </x-pixonui.show.labeltext>
                    @endif

                    <x-pixonui.show.labeltext caption="¿Otras actividades de posgrado llevadas a cabo en el año? Completar">
                        <div class="mb-3 font-light text-gray-500 dark:text-gray-400">
                            {!! $memoria->otras_actividades_posgrado !!}
                        </div>
                    </x-pixonui.show.labeltext>

                    <x-pixonui.show.labelsino :value="$memoria->dirigio_tesinas_grado" caption="¿Dirigió Tesinas de Grado?"></x-pixonui.show.labeltext>
                    @if($memoria->dirigio_tesinas_grado)
                        <x-pixonui.show.labeltext caption="Indique cantidad, tesistas, temas, etc.">
                            <div class="mb-3 font-light text-gray-500 dark:text-gray-400">
                                {!! $memoria->dirigio_tesinas_grado_detalle !!}
                            </div>
                        </x-pixonui.show.labeltext>
                    @endif

                    <x-pixonui.show.labelsino :value="$memoria->dirigio_pps" caption="¿Dirigió Prácticas Profesionales Supervisadas (PPS)?"></x-pixonui.show.labeltext>
                    @if($memoria->dirigio_pps)
                        <x-pixonui.show.labeltext caption="Indique alumnos, temas, etc.">
                            <div class="mb-3 font-light text-gray-500 dark:text-gray-400">
                                {!! $memoria->dirigio_pps_detalle !!}
                            </div>
                        </x-pixonui.show.labeltext>
                    @endif

                    <x-pixonui.show.labelsino :value="$memoria->dirigio_frh_estudiantiles" caption="¿Dirigió FRH estudiantiles?"></x-pixonui.show.labeltext>
                    @if($memoria->dirigio_frh_estudiantiles)
                        <x-pixonui.show.labeltext caption="Indique alumno/s, período, etc.">
                            <div class="mb-3 font-light text-gray-500 dark:text-gray-400">
                                {!! $memoria->dirigio_frh_estudiantiles_detalle !!}
                            </div>
                        </x-pixonui.show.labeltext>
                    @endif

                    <x-pixonui.show.labelsino :value="$memoria->dirigio_frh_profesionales" caption="¿Dirigió FRH Profesionales?"></x-pixonui.show.labeltext>
                    @if($memoria->dirigio_frh_profesionales)
                        <x-pixonui.show.labeltext caption="Indique profesional/es, temas, etc.">
                            <div class="mb-3 font-light text-gray-500 dark:text-gray-400">
                                {!! $memoria->dirigio_frh_profesionales_detalle !!}
                            </div>
                        </x-pixonui.show.labeltext>
                    @endif

                    <x-pixonui.show.labelsino :value="$memoria->dirigio_pasantias_estudiantes" caption="¿Dirigió pasantías de estudiantes de grado?"></x-pixonui.show.labeltext>
                    @if($memoria->dirigio_pasantias_estudiantes)
                        <x-pixonui.show.labeltext caption="Indique alumno/s, tema/s, duración, etc.">
                            <div class="mb-3 font-light text-gray-500 dark:text-gray-400">
                                {!! $memoria->dirigio_pasantias_estudiantes_detalle !!}
                            </div>
                        </x-pixonui.show.labeltext>
                    @endif

                    <x-pixonui.show.labelsino :value="$memoria->dirigio_pasantias_investigacion" caption="¿Dirigió pasantías de investigación de estudiantes de Posgrado?"></x-pixonui.show.labeltext>
                    @if($memoria->dirigio_pasantias_investigacion)
                        <x-pixonui.show.labeltext caption="Indique: estudiante, tema, duración, etc.">
                            <div class="mb-3 font-light text-gray-500 dark:text-gray-400">
                                {!! $memoria->dirigio_pasantias_investigacion_detalle !!}
                            </div>
                        </x-pixonui.show.labeltext>
                    @endif

                    <x-pixonui.show.labelsino :value="$memoria->dirigio_becas" caption="¿Dirigió Becas de Investigación de estudiantes de grado y/o posgrado?"></x-pixonui.show.labeltext>
                    @if($memoria->dirigio_becas)
                        <x-pixonui.show.labeltext caption="Indique: estudiante, tema, duración, entidad otorgante de la beca, etc.">
                            <div class="mb-3 font-light text-gray-500 dark:text-gray-400">
                                {!! $memoria->dirigio_becas_detalle !!}
                            </div>
                        </x-pixonui.show.labeltext>
                    @endif

                    <x-pixonui.show.labelsino :value="$memoria->participo_otra_actividad_frh" caption="¿Participó en alguna otra actividad relacionada con la FRH?"></x-pixonui.show.labeltext>
                    @if($memoria->participo_otra_actividad_frh)
                        <x-pixonui.show.labeltext caption="Explique">
                            <div class="mb-3 font-light text-gray-500 dark:text-gray-400">
                                {!! $memoria->participo_otra_actividad_frh_detalle !!}
                            </div>
                        </x-pixonui.show.labeltext>
                    @endif

                    <x-pixonui.show.labelsino :value="$memoria->dirige_proyectos_investigacion" caption="Dirige y/o Co Dirige Proyectos o Programas de Investigación?"></x-pixonui.show.labeltext>
                    @if($memoria->dirige_proyectos_investigacion)
                        <x-pixonui.show.labeltext caption="Indique cuál/es, cargo, nombre del proyecto y/o programa, Entidad Financiadora del mismo, integrantes, etc.">
                            <div class="mb-3 font-light text-gray-500 dark:text-gray-400">
                                {!! $memoria->dirige_proyectos_investigacion_detalle !!}
                            </div>
                        </x-pixonui.show.labeltext>
                    @endif

                    <x-pixonui.show.labelsino :value="$memoria->participa_investigador" caption="Participa como investigador en algún/os Proyectos o Programas de Investigación?"></x-pixonui.show.labeltext>
                    @if($memoria->participa_investigador)
                        <x-pixonui.show.labeltext caption="Indique cuál/es, nombre del proyecto y/o programa, Director, Co Director, Entidad Financiadora del mismo, etc.">
                            <div class="mb-3 font-light text-gray-500 dark:text-gray-400">
                                {!! $memoria->participa_investigador_detalle !!}
                            </div>
                        </x-pixonui.show.labeltext>
                    @endif

                    <x-pixonui.show.labeltext caption="¿Cuál es su Categoría de Incentivo? I, II, III, IV, V">
                        <div class="mb-3 font-light text-gray-500 dark:text-gray-400">
                            {!! $memoria->categoria_incentivo !!}
                        </div>
                    </x-pixonui.show.labeltext>

                    <x-pixonui.show.labelsino :value="$memoria->miembro_conicet" caption="¿Es Miembro del CONICET?"></x-pixonui.show.labeltext>
                    @if($memoria->miembro_conicet)
                        <x-pixonui.show.labeltext caption="Indique su Categoría">
                            <div class="mb-3 font-light text-gray-500 dark:text-gray-400">
                                {!! $memoria->miembro_conicet_detalle !!}
                            </div>
                        </x-pixonui.show.labeltext>
                    @endif

                    <x-pixonui.show.labelsino :value="$memoria->parte_instituto_investigacion" caption="¿Forma parte de Algún Instituto o Grupo de Investigación?"></x-pixonui.show.labeltext>
                    @if($memoria->parte_instituto_investigacion)
                        <x-pixonui.show.labeltext caption="Indique cual y su función en el mismo">
                            <div class="mb-3 font-light text-gray-500 dark:text-gray-400">
                                {!! $memoria->parte_instituto_investigacion_detalle !!}
                            </div>
                        </x-pixonui.show.labeltext>
                    @endif

                    <x-pixonui.show.labelsino :value="$memoria->recibio_premio_investigacion" caption="¿Recibió algún premio y/o mención en Investigación?"></x-pixonui.show.labeltext>
                    @if($memoria->recibio_premio_investigacion)
                        <x-pixonui.show.labeltext caption="Indique cual/es">
                            <div class="mb-3 font-light text-gray-500 dark:text-gray-400">
                                {!! $memoria->recibio_premio_investigacion_detalle !!}
                            </div>
                        </x-pixonui.show.labeltext>
                    @endif

                    <x-pixonui.show.labelsino :value="$memoria->realiazo_viajes_investigacion" caption="¿Ha realizado viajes de Investigación?"></x-pixonui.show.labeltext>
                    @if($memoria->realiazo_viajes_investigacion)
                        <x-pixonui.show.labeltext caption="Detalle, lugares, fechas, participación de alumnos de grado y/o posgrado, etc.">
                            <div class="mb-3 font-light text-gray-500 dark:text-gray-400">
                                {!! $memoria->realiazo_viajes_investigacion_detalle !!}
                            </div>
                        </x-pixonui.show.labeltext>
                    @endif

                    <x-pixonui.show.labelsino :value="$memoria->participo_congresos_cientifica" caption="¿Participó en Congresos, jornadas, talleres, seminarios u otra reunión científica?"></x-pixonui.show.labeltext>
                    @if($memoria->participo_congresos_cientifica)
                        <x-pixonui.show.labeltext caption="En Caso Positivo, detalle en cual/es, lugares, tipo de participación etc.">
                            <div class="mb-3 font-light text-gray-500 dark:text-gray-400">
                                {!! $memoria->participo_congresos_cientifica_detalle !!}
                            </div>
                        </x-pixonui.show.labeltext>
                    @endif

                    <x-pixonui.show.labeltext caption="Mencione su producción Científica del presente año (publicaciones, trabajos presentados, informes, otros)">
                        <div class="mb-3 font-light text-gray-500 dark:text-gray-400">
                            {!! $memoria->mensione_produccion_cientifica !!}
                        </div>
                    </x-pixonui.show.labeltext>

                    <x-pixonui.show.labeltext caption="Describa otras Actividades de Investigación que considere relevante">
                        <div class="mb-3 font-light text-gray-500 dark:text-gray-400">
                            {!! $memoria->actividades_investigacion_relevante !!}
                        </div>
                    </x-pixonui.show.labeltext>

                    <x-pixonui.show.labelsino :value="$memoria->miembro_consejo_directivo" caption="¿Es Miembro del Consejo Directivo de la Facultad?"></x-pixonui.show.labeltext>
                    @if($memoria->miembro_consejo_directivo)
                        <x-pixonui.show.labeltext caption="¿A qué estamento representa? Titulares, Asociados y Adjuntos, JTP y Aux">
                            <div class="mb-3 font-light text-gray-500 dark:text-gray-400">
                                {!! $memoria->miembro_consejo_directivo_detalle !!}
                            </div>
                        </x-pixonui.show.labeltext>
                    @endif

                    <x-pixonui.show.labelsino :value="$memoria->miembro_consejo_posgrado" caption="¿Es miembro del Consejo de Posgrado de la Facultad?"></x-pixonui.show.labeltext>

                    <x-pixonui.show.labelsino :value="$memoria->miembro_consejo_departamento" caption="¿Es miembro del Consejo de Departamento de su carrera?"></x-pixonui.show.labeltext>
                    @if($memoria->miembro_consejo_departamento)
                        <x-pixonui.show.labeltext caption="Indique en cuál y ¿Cuál es su función?">
                            <div class="mb-3 font-light text-gray-500 dark:text-gray-400">
                                {!! $memoria->miembro_consejo_departamento_detalle !!}
                            </div>
                        </x-pixonui.show.labeltext>
                    @endif

                    <x-pixonui.show.labelsino :value="$memoria->represento_facultad" caption="Representó a la Facultad en otro organismo Universitario, organismo provincial y/ o nacional?"></x-pixonui.show.labeltext>
                    @if($memoria->represento_facultad)
                        <x-pixonui.show.labeltext caption="Indique cual/es">
                            <div class="mb-3 font-light text-gray-500 dark:text-gray-400">
                                {!! $memoria->represento_facultad_detalle !!}
                            </div>
                        </x-pixonui.show.labeltext>
                    @endif

                    <x-pixonui.show.labelsino :value="$memoria->miembro_comisiones_institucionales" caption="¿Es miembro de Comisiones Institucionales?"></x-pixonui.show.labeltext>
                    @if($memoria->miembro_comisiones_institucionales)
                        <x-pixonui.show.labeltext caption="Indique cual/es">
                            <div class="mb-3 font-light text-gray-500 dark:text-gray-400">
                                {!! $memoria->miembro_comisiones_institucionales_detalle !!}
                            </div>
                        </x-pixonui.show.labeltext>
                    @endif

                    <x-pixonui.show.labelsino :value="$memoria->participo_organizacion_eventos_cientificos" caption="¿Participó en la organización de eventos científicos?"></x-pixonui.show.labeltext>
                    @if($memoria->participo_organizacion_eventos_cientificos)
                        <x-pixonui.show.labeltext caption="Indique cual/es">
                            <div class="mb-3 font-light text-gray-500 dark:text-gray-400">
                                {!! $memoria->participo_organizacion_eventos_cientificos_detalle !!}
                            </div>
                        </x-pixonui.show.labeltext>
                    @endif

                    <x-pixonui.show.labelsino :value="$memoria->participo_cargos_directivos" caption="Participó en otros cargos directivos (Cooperadora, Colegios profesionales, etc.)"></x-pixonui.show.labeltext>
                    @if($memoria->participo_cargos_directivos)
                        <x-pixonui.show.labeltext caption="Indique cual/es">
                            <div class="mb-3 font-light text-gray-500 dark:text-gray-400">
                                {!! $memoria->participo_cargos_directivos_detalle !!}
                            </div>
                        </x-pixonui.show.labeltext>
                    @endif

                    <x-pixonui.show.labelsino :value="$memoria->dicto_charlas_conferencias" caption="¿Dictó charlas, conferencias, disertaciones, etc.?"></x-pixonui.show.labeltext>
                    @if($memoria->dicto_charlas_conferencias)
                        <x-pixonui.show.labeltext caption="Indique cual/es">
                            <div class="mb-3 font-light text-gray-500 dark:text-gray-400">
                                {!! $memoria->dicto_charlas_conferencias_detalle !!}
                            </div>
                        </x-pixonui.show.labeltext>
                    @endif

                    <x-pixonui.show.labelsino :value="$memoria->participo_asesoramiento_cientifico" caption="Participó en Actividades de Asesoramiento Científico y/o tecnológicos en diferentes organismos?"></x-pixonui.show.labeltext>
                    @if($memoria->participo_asesoramiento_cientifico)
                        <x-pixonui.show.labeltext caption="Indique cual/es">
                            <div class="mb-3 font-light text-gray-500 dark:text-gray-400">
                                {!! $memoria->participo_asesoramiento_cientifico_detalle !!}
                            </div>
                        </x-pixonui.show.labeltext>
                    @endif

                    <x-pixonui.show.labelsino :value="$memoria->elaboro_materiales_extension" caption="¿Elaboró y/o publicó materiales de extensión?"></x-pixonui.show.labeltext>
                    @if($memoria->elaboro_materiales_extension)
                        <x-pixonui.show.labeltext caption="Indique cual/es">
                            <div class="mb-3 font-light text-gray-500 dark:text-gray-400">
                                {!! $memoria->elaboro_materiales_extension_detalle !!}
                            </div>
                        </x-pixonui.show.labeltext>
                    @endif

                    <x-pixonui.show.labelsino :value="$memoria->participo_difusion_carreras" caption="¿Participó en actividades de Difusión de las carreras que se dictan en la Facultad, dando charlas en escuelas, asesoramientos, etc.?"></x-pixonui.show.labeltext>
                    @if($memoria->participo_difusion_carreras)
                        <x-pixonui.show.labeltext caption="Indique cual/es, donde, fechas. etc.">
                            <div class="mb-3 font-light text-gray-500 dark:text-gray-400">
                                {!! $memoria->participo_difusion_carreras_detalle !!}
                            </div>
                        </x-pixonui.show.labeltext>
                    @endif

                    <x-pixonui.show.labelsino :value="$memoria->participo_tarea_extension" caption="Participación en alguna otra tarea de Extensión?"></x-pixonui.show.labeltext>
                    @if($memoria->participo_tarea_extension)
                        <x-pixonui.show.labeltext caption="En caso positivo qué tipo de actividad?">
                            <div class="mb-3 font-light text-gray-500 dark:text-gray-400">
                                {!! $memoria->participo_tarea_extension_detalle !!}
                            </div>
                        </x-pixonui.show.labeltext>
                    @endif

                    <x-pixonui.show.labelsino :value="$memoria->realizo_prestacion_servicios" caption="¿Realizó formalmente vía Facultad, Universidad, empresa etc., alguna prestación de Servicios?"></x-pixonui.show.labeltext>
                    @if($memoria->realizo_prestacion_servicios)
                        <x-pixonui.show.labeltext caption="Indique a quien, el tipo de prestación, fechas. etc.">
                            <div class="mb-3 font-light text-gray-500 dark:text-gray-400">
                                {!! $memoria->realizo_prestacion_servicios_detalle !!}
                            </div>
                        </x-pixonui.show.labeltext>
                    @endif

                    <x-pixonui.show.labelsino :value="$memoria->realizo_infromes_tecnicos_empresas" caption="¿Realizó Informes técnicos y/o de asesoramiento a empresas u otros organismos privados o estatales?"></x-pixonui.show.labeltext>
                    @if($memoria->realizo_infromes_tecnicos_empresas)
                        <x-pixonui.show.labeltext caption="Indique cual/es y a quien">
                            <div class="mb-3 font-light text-gray-500 dark:text-gray-400">
                                {!! $memoria->realizo_infromes_tecnicos_empresas_detalle !!}
                            </div>
                        </x-pixonui.show.labeltext>
                    @endif

                    <x-pixonui.show.labelsino :value="$memoria->tomo_cursos_posgrado" caption="¿Tomó cursos de Posgrado y/o Capacitación Profesional?"></x-pixonui.show.labeltext>
                    @if($memoria->tomo_cursos_posgrado)
                        <x-pixonui.show.labeltext caption="Indique tipo de curso, nombre, carga horaria, institución que los dictó, fechas, etc.">
                            <div class="mb-3 font-light text-gray-500 dark:text-gray-400">
                                {!! $memoria->tomo_cursos_posgrado_detalle !!}
                            </div>
                        </x-pixonui.show.labeltext>
                    @endif

                    <x-pixonui.show.labelsino :value="$memoria->curso_carrera_posgrado" caption="Cursó o está cursando alguna carrera de posgrado:"></x-pixonui.show.labeltext>
                    @if($memoria->curso_carrera_posgrado)
                        <x-pixonui.show.labeltext caption="Indique cual/es, título a otorgar, institución que la dicta, etc.">
                            <div class="mb-3 font-light text-gray-500 dark:text-gray-400">
                                {!! $memoria->curso_carrera_posgrado_detalle !!}
                            </div>
                        </x-pixonui.show.labeltext>
                    @endif

                    <x-pixonui.show.labelsino :value="$memoria->realizo_trayecto_academico" caption="¿Realizó o está realizando al algún trayecto académico (diplomatura) o intercambio Académico?"></x-pixonui.show.labeltext>
                    @if($memoria->realizo_trayecto_academico)
                        <x-pixonui.show.labeltext caption="Indique tipo de trayecto, nombre, carga horaria, institución que lo dicta, fechas, etc.">
                            <div class="mb-3 font-light text-gray-500 dark:text-gray-400">
                                {!! $memoria->realizo_trayecto_academico_detalle !!}
                            </div>
                        </x-pixonui.show.labeltext>
                    @endif

                    <x-pixonui.show.labelsino :value="$memoria->obtuvo_beca_formacion_profesional" caption="¿Obtuvo alguna beca o ayuda económica para actividades de formación profesional?"></x-pixonui.show.labeltext>
                    @if($memoria->obtuvo_beca_formacion_profesional)
                        <x-pixonui.show.labeltext caption="Indique tipo de ayuda, destino, institución que la otorgó, fechas, etc.">
                            <div class="mb-3 font-light text-gray-500 dark:text-gray-400">
                                {!! $memoria->obtuvo_beca_formacion_profesional_detalle !!}
                            </div>
                        </x-pixonui.show.labeltext>
                    @endif


                    <x-pixonui.show.labeltext caption="Observaciones: En este apartado puede dejarnos sus comentarios, observaciones o sugerencias o bien agregar alguna información importante que no haya sido incluida en los ítems anteriores">
                        <div class="mb-3 font-light text-gray-500 dark:text-gray-400">
                            {!! $memoria->observaciones !!}
                        </div>
                    </x-pixonui.show.labeltext>

                </div>
            </div>
            @livewire('memoria.cambiar-estado', ['memoria' => $memoria])
        </div>
    </div>
</x-app-layout>
