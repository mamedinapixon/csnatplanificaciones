<div>
    <div class="space-y-8 form-contro">
        <div class="w-full max-w-xs form-control">
            <x-pixonui.form.label>Periodo lectivo</x-pixonui.form.label>
            @empty($periodosLectivos)
                No hay periodos lectivos habilitados
            @else
            <select class="select select-bordered" wire:model="periodo_lectivo_id">
                <option value="null" disabled>Seleccione una opcion</option>
                @foreach ($periodosLectivos as $periodoLectivo)
                <option value="{{ $periodoLectivo->id }}"  wire:key="periodo-lectivo-{{ $periodoLectivo->id }}">
                    {{ $periodoLectivo->anio_academico }} - {{ $periodoLectivo->periodoAcademico->nombre }}
                </option>
                @endforeach
            </select>
            @endisset
        </div>

        <div class="w-full max-w-xs form-control">
            <x-pixonui.form.label>Carrera</x-pixonui.form.label>
            @empty($carreras)
                No hay carreras disponibles
            @else
                <select class="select select-bordered" wire:model="carrera_id">
                    <option value="null" disabled>Seleccione una opcion</option>
                    @foreach ($carreras as $carrera)
                    <option value="{{ $carrera->id }}" wire:key="carrera-{{ $carrera->id }}">
                        {{ $carrera->nombre }} - {{ $carrera->plan_anio }}
                    </option>
                    @endforeach
                </select>
            @endisset

        </div>

        <div class="w-full max-w-xs form-control">
            <x-pixonui.form.label>Asignatura</x-pixonui.form.label>
            @empty($materiasPlanDeEstudio)
                <span class="pl-4"> No hay asignaturas disponibles:</span>
            @else
                <select class="select select-bordered" wire:model="materia_plan_estudio_id">
                    <option value="null" disabled>Seleccione una opcion</option>
                    @foreach ($materiasPlanDeEstudio as $materiaPlanEstudio)
                    <option value="{{ $materiaPlanEstudio->id }}" wire:key="materia-plan-estudio-{{ $materiaPlanEstudio->id }}">
                        {{ $materiaPlanEstudio->anio_curdada }}º Año | {{ $materiaPlanEstudio->materia->nombre }}
                    </option>
                    @endforeach
                </select>
            @endisset
        </div>
        @if (!empty($msj_error))
            <div class="shadow-lg alert alert-error">
                <div class="text-white ">
                <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 w-6 h-6 stroke-current" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                <span>{{$msj_error}}</span>
                </div>
            </div>
        @endif
        <div class="flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="flex-shrink-0 w-6 h-6 stroke-info"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            <span>Comuníquese con Académica si no aparece la asignatura.</span>
          </div>
        <div class="flex flex-row space-x-4 form-control">
            <a class="max-w-xs btn" href="{{ route('planificacion.index') }}"  >
                Volver
            </a>
            <button class="btn btn-primary" wire:click="store">Crear planificaicon y continuar</button>
        </div>

    </div>
</div>
