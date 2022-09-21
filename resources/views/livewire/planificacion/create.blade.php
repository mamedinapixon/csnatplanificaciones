<div>
    <div class="space-y-4 form-contro">
        <div class="w-full max-w-xs form-control">
            <label class="label">
              <span class="label-text">Periodo lectivo</span>
            </label>
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
            <label class="label">
              <span class="label-text">Carrera</span>
            </label>
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
            <label class="label">
              <span class="label-text">Asignatura</span>
            </label>
            @empty($materiasPlanDeEstudio)
                No hay asignaturas disponibles
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
        <div class="flex flex-row space-x-4 form-control">
            <a class="max-w-xs btn" href="{{ route('planificacion.index') }}"  >
                Volver
            </a>
            <button class="btn btn-primary" wire:click="store">Crear planificaicon y continuar</button>
        </div>
    </div>
</div>
