<div>
    @if ($estado_id == 3)
        <a class="btn btn-wide btn-primary" x-on:click="
            aletWarning('¿Desea quitar de la planificación el estado de <b>presentado</b>?', 'El docente tendrá nuevamente permiso de edición.', 'Si, continuar', 'Cancelar', function() {
                $wire.OnQuitarPresentada();
            });
        ">
            Habilitar edición
        </a>
    @endif
    @if ($estado_id == 2)
        <a class="btn btn-wide btn-primary" x-on:click="
            aletWarning('¿Desea cambiar el estado de la planificación a <b>revisada</b>?', '', 'Si, continuar', 'Cancelar', function() {
                $wire.OnRevisado();
            });
        ">
            Revisado
        </a>
    @endif

</div>
