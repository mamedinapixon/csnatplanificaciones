<div class="flex items-center justify-between p-4 space-x-4 print:hidden no-print" x-data="{}">
    <div>
        <x-pixonui.form.label>
            <span class="pr-1 text-lg">Estado actual:</span>
            @switch($planificacion->estado_id)
                @case(1)
                    <div class="gap-2 text-white badge">{{ $planificacion->estado->nombre }}</div>
                    @break
                @case(2)
                <div class="gap-2 text-white badge badge-info">{{ $planificacion->estado->nombre }}</div>
                    @break
                @case(3)
                <div class="gap-2 text-white badge badge-success">{{ $planificacion->estado->nombre }}</div>
                    @break
                @case(4)
                <div class="gap-2 text-white badge badge-error">{{ $planificacion->estado->nombre }}</div>
                    @break
                @default

            @endswitch
        </x-pixonui.form.label>
    </div>
    <div class="flex space-x-4">
        <a class="max-w-md btn" href="{{ route('planificacion.index') }}"  >
            Volver
        </a>
            @if ($planificacion->estado_id == 1)
                @can('cambiar estado planificaciones')
                    <a class="btn btn-wide btn-primary" x-on:click="
                        aletWarning('¿Desea cambiar el estado de la planificación a <b>presentada</b>?', '', 'Si, continuar', 'Cancelar', function() {
                            $wire.OnPresentar();
                        });
                    ">
                        Cerrar edición y presentar
                    </a>
                @endhasanyrole
            @else
                @can('cambiar estado planificaciones')
                    <a class="btn btn-wide btn-secondary" x-on:click="
                        aletWarning('¿Desea quitar de la planificación el estado de <b>presentado</b>?', 'El docente tendrá nuevamente permiso de edición.', 'Si, continuar', 'Cancelar', function() {
                            $wire.OnQuitarPresentada();
                        });
                    ">
                        Habilitar edición
                    </a>
                @endhasanyrole
                @can('revisar planificaciones')
                    <a class="btn btn-wide btn-error" x-on:click="
                        aletWarning('¿Desea cambiar el estado de la planificación a <b>DESAPROBADO</b>?', '', 'Si, continuar', 'Cancelar', function() {
                            $wire.OnDesaprobado();
                        });
                    ">
                        Observado
                    </a>
                    <a class="btn btn-wide btn-success" x-on:click="
                        aletWarning('¿Desea cambiar el estado de la planificación a <b>APROBADO</b>?', '', 'Si, continuar', 'Cancelar', function() {
                            $wire.OnAprobado();
                        });
                    ">
                        Aprobada
                    </a>
                @endhasanyrole
            @endif

    </div>
</div>




