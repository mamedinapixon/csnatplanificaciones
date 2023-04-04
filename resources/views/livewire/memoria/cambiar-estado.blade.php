<div class="no-print" x-data="{}">
    <div class="flex justify-between p-4 space-x-4 align-top print:hidden">
        <div>
            <x-pixonui.form.label>
                <span class="pr-1 text-lg">Estado actual:</span>
                @switch($memoria->estado_id)
                    @case(1)
                        <div class="gap-2 text-white badge">{{ $memoria->estado->nombre }}</div>
                    @break

                    @case(2)
                        <div class="gap-2 text-white badge badge-info">{{ $memoria->estado->nombre }}</div>
                    @break

                    @case(3)
                        <div class="gap-2 text-white badge badge-success">{{ $memoria->estado->nombre }}</div>
                    @break

                    @case(4)
                        <div class="gap-2 text-white badge badge-error">{{ $memoria->estado->nombre }}</div>
                    @break

                    @default
                @endswitch
            </x-pixonui.form.label>
            @cannot('revisar memorias')
                <x-pixonui.form.label>
                    <span class="pr-1 text-lg">Observaciones:</span>
                    <div>
                        {!! $memoria->observaciones_revision !!}
                    </div>
                </x-pixonui.form.label>
            @endhasanyrole
        </div>
        <div class="flex flex-col space-y-4">
            @can('revisar memorias')
                <div class="flex">
                    <div class="w-full  form-control">
                        <x-pixonui.form.label>Observaciones sobre la memoria</x-pixonui.form.label>
                        <x-pixonui.wire.quill wire:model="observaciones" ref="quillobservaciones"></x-pixonui.wire.quill>
                        <x-pixonui.form.error for="observaciones"></x-pixonui.form.error>
                    </div>
                </div>
            @endhasanyrole
            <div class="flex space-x-4">
                <a class="max-w-md btn" href="{{ route('memoria.index') }}">
                    Volver
                </a>
                @if ($memoria->estado_id == 1)
                    @can('cambiar estado memoria')
                        <a class="btn btn-primary btn-wide"
                            x-on:click="
                            aletWarning('¿Desea cambiar el estado de la memoria a <b>presentada</b>?', '', 'Si, continuar', 'Cancelar', function() {
                                $wire.OnPresentar();
                            });
                        ">
                            Cerrar edición y presentar
                        </a>
                    @endhasanyrole
                @else
                    @can('cambiar estado memoria')
                        <a class="btn btn-secondary btn-wide"
                            x-on:click="
                            aletWarning('¿Desea quitar el estado de <b>presentado</b>?', 'El docente tendrá nuevamente permiso de edición.', 'Si, continuar', 'Cancelar', function() {
                                $wire.OnQuitarPresentada();
                            });
                        ">
                            Habilitar edición
                        </a>
                    @endhasanyrole
                    @can('revisar memorias')
                        <a class="btn btn-error btn-wide"
                            x-on:click="
                            aletWarning('¿Desea cambiar el estado de la memoria a <b>OBSERVADO</b>?', '', 'Si, continuar', 'Cancelar', function() {
                                $wire.OnDesaprobado();
                            });
                        ">
                            Observado
                        </a>
                        <a class="btn btn-success btn-wide"
                            x-on:click="
                            aletWarning('¿Desea cambiar el estado de la memoria a <b>APROBADO</b>?', '', 'Si, continuar', 'Cancelar', function() {
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
