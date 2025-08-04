<div class="space-y-8">
    <div class="form-control w-full space-y-4">
        <h2 class="text-2xl font-bold flex flex-col sm:flex-row text-center sm:text-left">
            <span>Control de Asistencia para ID: {{ $asistencia->id }}</span>
        </h2>

        <div class="space-y-1">
            <p class="text-lg"><span class="font-bold">Docente: </span> {{ $asistencia->user->name }}</p>
            <p class="text-lg"><span class="font-bold">Fecha Ingreso: </span> {{ $asistencia->ingreso_at->format('d/m/Y H:i:s') }}</p>
            <p class="text-lg"><span class="font-bold">Ubicación: </span> {{ $asistencia->ubicacion->descripcion }} {{ $asistencia->otra_ubicacion == "" ? "" : ("(".$asistencia->otra_ubicacion.")") }}</p>
        </div>
    </div>
    <div class="form-control w-full max-w-xs space-y-4">
        <div class="form-control">
            <label class="label cursor-pointer">
                <span class="label-text font-bold">Control Realizado</span>
                <input type="checkbox" wire:model="controlRealizado" class="checkbox checkbox-primary" />
            </label>
        </div>

        <div class="form-control w-full max-w-xs">
            <label class="label">
                <span class="label-text font-bold">Resultado del Control</span>
            </label>
            <div>
                <div class="form-control">
                    <label class="label cursor-pointer">
                        <span class="label-text">Asistencia Válida</span>
                        <input type="radio" value="1" wire:model="controlResultado" name="control_resultado" class="radio radio-primary" />
                    </label>
                </div>
                <div class="form-control">
                    <label class="label cursor-pointer">
                        <span class="label-text">Asistencia Inválida</span>
                        <input type="radio" value="0" wire:model="controlResultado" name="control_resultado" class="radio radio-primary" />
                    </label>
                </div>
            </div>
            @error('controlResultado')
                <label class="label text-red-500">{{ $message }}</label>
            @enderror
        </div>

        <div class="form-control w-full">
            <label class="label">
                <span class="label-text font-bold">Observación del Control</span>
            </label>
            <textarea wire:model="controlObservacion" class="textarea textarea-bordered h-24"></textarea>
            @error('controlObservacion')
                <label class="label text-red-500">{{ $message }}</label>
            @enderror
        </div>

        <div class="form-control w-full max-w-xs">
            <button wire:click="guardarControl" class="btn btn-primary">Guardar Control</button>
        </div>
    </div>
</div>
