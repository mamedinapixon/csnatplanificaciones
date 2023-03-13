<div class="no-print" x-data="{}">
    <div class="flex justify-between align-top space-x-4 p-4 print:hidden">
        <div>
            <x-pixonui.form.label>
                <span class="pr-1 text-lg">Estado actual:</span>
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

                    @case(4)
                        <div class="badge badge-error gap-2 text-white">{{ $planificacion->estado->nombre }}</div>
                    @break

                    @default
                @endswitch
            </x-pixonui.form.label>
            @cannot('revisar planificaciones')
                <x-pixonui.form.label>
                    <span class="pr-1 text-lg">Observaciones:</span>
                    <div>
                        {!! $planificacion->observaciones_comision !!}
                    </div>
                </x-pixonui.form.label>
            @endhasanyrole
        </div>
        <div class="flex flex-col space-y-4">
            @can('revisar planificaciones')
                <div class="flex">
                    <div class=" w-full form-control">
                        <x-pixonui.form.label>Observaciones sobre la planificacion</x-pixonui.form.label>
                        <x-pixonui.wire.quill wire:model="observaciones" ref="quillobservaciones"></x-pixonui.wire.quill>
                        <x-pixonui.form.error for="observaciones"></x-pixonui.form.error>
                    </div>
                </div>
            @endhasanyrole
            <div class="flex space-x-4">
                <a class="btn max-w-md" href="{{ route('planificacion.index') }}">
                    Volver
                </a>
                @if ($planificacion->estado_id == 1)
                    @can('cambiar estado planificaciones')
                        <a class="btn btn-primary btn-wide"
                            x-on:click="
                            aletWarning('¿Desea cambiar el estado de la planificación a <b>presentada</b>?', '', 'Si, continuar', 'Cancelar', function() {
                                $wire.OnPresentar();
                            });
                        ">
                            Cerrar edición y presentar
                        </a>
                    @endhasanyrole
                @else
                    @can('cambiar estado planificaciones')
                        <a class="btn btn-secondary btn-wide"
                            x-on:click="
                            aletWarning('¿Desea quitar de la planificación el estado de <b>presentado</b>?', 'El docente tendrá nuevamente permiso de edición.', 'Si, continuar', 'Cancelar', function() {
                                $wire.OnQuitarPresentada();
                            });
                        ">
                            Habilitar edición
                        </a>
                    @endhasanyrole
                    @can('revisar planificaciones')
                        <a class="btn btn-error btn-wide"
                            x-on:click="
                            aletWarning('¿Desea cambiar el estado de la planificación a <b>OBSERVADO</b>?', '', 'Si, continuar', 'Cancelar', function() {
                                $wire.OnDesaprobado();
                            });
                        ">
                            Observado
                        </a>
                        <a class="btn btn-success btn-wide"
                            x-on:click="
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

    </div>
</div>
