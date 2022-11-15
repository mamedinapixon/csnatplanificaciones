<div class="flex justify-between space-x-4 p-4 items-center print:hidden no-print" x-data="{}">
    <div>
        <x-pixonui.form.label>
            <span class="text-lg pr-1">Estado actual:</span>
            @switch($planificacion->estado_id)
                @case(1)
                    <div class="badge gap-2 text-white">{{ $planificacion->estado->nombre }}</div>
                    @break
                @case(2)
                <div class="badge badge-info gap-2 text-white">{{ $planificacion->estado->nombre }}</div>
                    @break
                @case(3)
                <div class="badge badge-success gap-2 text-white">{{ $planificacion->estado->nombre }}</div>
                    @break
                @default

            @endswitch
        </x-pixonui.form.label>
    </div>
    <div class="flex space-x-4">
        <a class="btn max-w-md" href="{{ route('planificacion.index') }}"  >
            Volver
        </a>
        @can('cambiar estado planificaciones')
            @if ($planificacion->estado_id == 3)
                <a class="btn btn-wide btn-primary" x-on:click="
                    aletWarning('¿Desea quitar de la planificación el estado de <b>presentado</b>?', 'El docente tendrá nuevamente permiso de edición.', 'Si, continuar', 'Cancelar', function() {
                        $wire.OnQuitarPresentada();
                    });
                ">
                    Habilitar edición
                </a>
            @endif
            @if ($planificacion->estado_id == 2)
                <a class="btn btn-wide btn-primary" x-on:click="
                    aletWarning('¿Desea cambiar el estado de la planificación a <b>revisada</b>?', '', 'Si, continuar', 'Cancelar', function() {
                        $wire.OnRevisado();
                    });
                ">
                    Revisado
                </a>
            @endif
        @endhasanyrole
            @if ($planificacion->estado_id == 1)
                <a class="btn btn-wide btn-primary" x-on:click="
                    aletWarning('¿Desea cambiar el estado de la planificación a <b>presentada</b>?', '', 'Si, continuar', 'Cancelar', function() {
                        $wire.OnPresentar();
                    });
                ">
                    Cerrar edición y presentar
                </a>
            @endif

    </div>
</div>




