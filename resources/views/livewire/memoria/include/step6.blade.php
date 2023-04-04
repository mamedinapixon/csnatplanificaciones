<div class="space-y-4 ">
    <div class=" form-control">
        <x-pixonui.form.label>¿Tomó cursos de Posgrado y/o Capacitación Profesional?</x-pixonui.form.label>
        <div class="flex items-center space-x-2">
            <x-pixonui.form.checkbox id="toggle-tomo_cursos_posgrado" wire:model="form.tomo_cursos_posgrado"></x-pixonui.form.checkbox>
            <x-pixonui.wire.loading.spinner wire:target="form.tomo_cursos_posgrado"></x-pixonui.wire.loading.spinner>
        </div>
    </div>
    @if ($form['tomo_cursos_posgrado'])
        <div class="w-full form-control">
            <x-pixonui.form.label>Indique tipo de curso, nombre, carga horaria, institución que los dictó, fechas, etc.</x-pixonui.form.label>
            <x-pixonui.wire.quill wire:model="form.tomo_cursos_posgrado_detalle" ref="tomo_cursos_posgrado_detalle"></x-pixonui.wire.quill>
            <x-pixonui.wire.loading.spinner wire:target="form.tomo_cursos_posgrado_detalle"></x-pixonui.wire.loading.spinner>
            <x-pixonui.form.error for="form.tomo_cursos_posgrado_detalle"></x-pixonui.form.error>
        </div>
    @endif

    <div class=" form-control">
        <x-pixonui.form.label>Cursó o está cursando alguna carrera de posgrado:</x-pixonui.form.label>
        <div class="flex items-center space-x-2">
            <x-pixonui.form.checkbox id="toggle-curso_carrera_posgrado" wire:model="form.curso_carrera_posgrado"></x-pixonui.form.checkbox>
            <x-pixonui.wire.loading.spinner wire:target="form.curso_carrera_posgrado"></x-pixonui.wire.loading.spinner>
        </div>
    </div>
    @if ($form['curso_carrera_posgrado'])
        <div class="w-full form-control">
            <x-pixonui.form.label>Indique cual/es, título a otorgar, institución que la dicta, etc.</x-pixonui.form.label>
            <x-pixonui.wire.quill wire:model="form.curso_carrera_posgrado_detalle" ref="curso_carrera_posgrado_detalle"></x-pixonui.wire.quill>
            <x-pixonui.wire.loading.spinner wire:target="form.curso_carrera_posgrado_detalle"></x-pixonui.wire.loading.spinner>
            <x-pixonui.form.error for="form.curso_carrera_posgrado_detalle"></x-pixonui.form.error>
        </div>
    @endif

    <div class=" form-control">
        <x-pixonui.form.label>¿Realizó o está realizando al algún trayecto académico (diplomatura) o intercambio Académico?</x-pixonui.form.label>
        <div class="flex items-center space-x-2">
            <x-pixonui.form.checkbox id="toggle-realizo_trayecto_academico" wire:model="form.realizo_trayecto_academico"></x-pixonui.form.checkbox>
            <x-pixonui.wire.loading.spinner wire:target="form.realizo_trayecto_academico"></x-pixonui.wire.loading.spinner>
        </div>
    </div>
    @if ($form['realizo_trayecto_academico'])
        <div class="w-full form-control">
            <x-pixonui.form.label>Indique tipo de trayecto, nombre, carga horaria, institución que lo dicta, fechas, etc.</x-pixonui.form.label>
            <x-pixonui.wire.quill wire:model="form.realizo_trayecto_academico_detalle" ref="realizo_trayecto_academico_detalle"></x-pixonui.wire.quill>
            <x-pixonui.wire.loading.spinner wire:target="form.realizo_trayecto_academico_detalle"></x-pixonui.wire.loading.spinner>
            <x-pixonui.form.error for="form.realizo_trayecto_academico_detalle"></x-pixonui.form.error>
        </div>
    @endif

    <div class=" form-control">
        <x-pixonui.form.label>¿Obtuvo alguna beca o ayuda económica para actividades de formación profesional?</x-pixonui.form.label>
        <div class="flex items-center space-x-2">
            <x-pixonui.form.checkbox id="toggle-obtuvo_beca_formacion_profesional" wire:model="form.obtuvo_beca_formacion_profesional"></x-pixonui.form.checkbox>
            <x-pixonui.wire.loading.spinner wire:target="form.obtuvo_beca_formacion_profesional"></x-pixonui.wire.loading.spinner>
        </div>
    </div>
    @if ($form['obtuvo_beca_formacion_profesional'])
        <div class="w-full form-control">
            <x-pixonui.form.label>Indique tipo de ayuda, destino, institución que la otorgó, fechas, etc.</x-pixonui.form.label>
            <x-pixonui.wire.quill wire:model="form.obtuvo_beca_formacion_profesional_detalle" ref="obtuvo_beca_formacion_profesional_detalle"></x-pixonui.wire.quill>
            <x-pixonui.wire.loading.spinner wire:target="form.obtuvo_beca_formacion_profesional_detalle"></x-pixonui.wire.loading.spinner>
            <x-pixonui.form.error for="form.obtuvo_beca_formacion_profesional_detalle"></x-pixonui.form.error>
        </div>
    @endif

    <div class="w-full form-control">
        <x-pixonui.form.label>Observaciones: En este apartado puede dejarnos sus comentarios, observaciones o sugerencias o bien agregar alguna información importante que no haya sido incluida en los ítems anteriores</x-pixonui.form.label>
        <x-pixonui.wire.quill wire:model="form.observaciones" ref="obtuvo_beca_formacion_profesional_detalle"></x-pixonui.wire.quill>
        <x-pixonui.wire.loading.spinner wire:target="form.observaciones"></x-pixonui.wire.loading.spinner>
        <x-pixonui.form.error for="form.observaciones"></x-pixonui.form.error>
    </div>

    <!-- Botones -->
    <div class="flex justify-end py-4 space-x-4" x-data="{}">
        <a class="max-w-md btn" wire:click="onVolver" wire:loading.attr="disabled">
            Volver
        </a>
        <a class="btn btn-wide btn-primary" x-on:click="
                aletWarning('¿Desea presentar la memoria?', 'Una vez presentada <b>no podra editarla</b>.', 'Si, continuar', 'Cancelar', function() {
                    $wire.OnPresentar();
                });
            "
            wire:loading.class="loading" wire:target="OnPresentar"
            >
            Presentar
        </a>
    </div>
</div>
