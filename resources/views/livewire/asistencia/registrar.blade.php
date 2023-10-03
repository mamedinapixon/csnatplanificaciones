<div class="flex flex-col space-y-8 md:flex-row">
    @if (is_null($asistencia))
        <div class="form-control w-full max-w-xs space-y-4">
            <h2 class="text-2xl font-bold flex flex-col sm:flex-row text-center sm:text-left">
                <span>INGRESO: </span>
                <small>{{Auth::user()->name}}</small>
            </h2>
            <div>
                <p class="text-lg"><span class="font-bold">Fecha Ingreso: </span> {{Carbon\Carbon::now()->toDateString()}}</p>
            </div>
            <div class="form-control w-full max-w-xs">
                <label class="label">
                    <span class="label-text">Hora de ingreso</span>
                </label>
                <input wire:model="ingreso_at" type="time" class="input input-bordered input-lg w-36" />
                @error('ingreso_at')
                    <label class="label text-red-500">{{ $message }}</label>
                @enderror
            </div>
            <div class="form-control w-full max-w-xs">
                <label class="label">
                    <span class="label-text">Ubicación</span>
                </label>
                <div>
                    @forelse($ubicaciones as $ubicacion)
                        <div class="form-control">
                            <label class="label cursor-pointer">
                                <span class="label-text">{{ $ubicacion->descripcion }}</span>
                                <input type="radio"  value="{{ $ubicacion->id }}" wire:model="ubicacion_id" name="ubicacion_id" class="radio checked:bg-blue-500" />
                            </label>
                        </div>
                    @empty
                    @endforelse
                </div>
                <!--<select wire:model="ubicacion_id" id="ubicacion_id" class="select select-bordered select-lg">
                    <option value="0" disabled selected>Seleccione una ubicación</option>
                    @forelse($ubicaciones as $ubicacion)
                        <option value="{{ $ubicacion->id }}">{{ $ubicacion->descripcion }}</option>
                    @empty
                        <option disabled selected>Sin datos</option>
                    @endforelse
                </select>
                -->
                @error('ubicacion_id')
                    <label class="label text-red-500">{{ $message }}</label>
                @enderror
            </div>

            @if($ubicacion_id == 8)
                <div class="form-control w-full max-w-xs">
                    <label class="label">
                        <span class="label-text">Indique nombre de la ubicacion</span>
                    </label>
                    <input wire:model="otra_ubicacion" type="text" class="input input-bordered input-xl" />
                    @error('otra_ubicacion')
                        <label class="label text-red-500">{{ $message }}</label>
                    @enderror
                </div>
            @endif
            <div class="form-control w-full max-w-xs">
                <button wire:click="registrarIngreso"
                    class="btn btn-primary">Registrar ingreso</button>
            </div>
        </div>
    @else
    <div class="form-control w-full max-w-xs space-y-4">
        <h2 class="text-2xl font-bold flex flex-col sm:flex-row text-center sm:text-left">
            <span>INGRESO: </span>
            <small>{{Auth::user()->name}}</small>
        </h2>
        <div>
            <p class="text-lg"><span class="font-bold">Hora Ingreso: </span> {{$asistencia->ingreso_at}}</p>
            <p class="text-lg"><span class="font-bold">Ubicación: </span> {{$asistencia->ubicacion->descripcion}} {{ $asistencia->otra_ubicacion == "" ? "" : ("(".$asistencia->otra_ubicacion.")") }}</p>
        </div>
        <div class="form-control w-full max-w-xs">
            <label class="label">
                <span class="label-text">Hora de salida</span>
            </label>
            <input wire:model="salida_at" type="time" class="input input-bordered input-lg w-36" />
            @error('salida_at')
                <label class="label text-red-500">{{ $message }}</label>
            @enderror
        </div>
        <div class="form-control w-full max-w-xs">
            <button wire:click="registrarSalida"
                class="btn btn-primary">Registrar salida</button>
        </div>
    </div>

    @endif
</div>
