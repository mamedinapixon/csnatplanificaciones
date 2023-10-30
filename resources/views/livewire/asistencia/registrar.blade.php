<div class="flex flex-col space-y-8 md:flex-row">
    @if (is_null($asistencia))
        <div class="form-control w-full max-w-xs space-y-4">
            <h2 class="text-2xl font-bold flex flex-col sm:flex-row text-center sm:text-left">
                <span>INGRESO: </span>
                <small>{{Auth::user()->name}}</small>
            </h2>
            <div>
                <p class="text-lg"><span class="font-bold">Fecha Ingreso: </span> {{Carbon\Carbon::now()->format('d/m/Y')}}</p>
            </div>
            <div>
                <p class="text-lg"><span class="font-bold">Hora Ingreso: </span> <span id="hora">{{Carbon\Carbon::now()->toTimeString()}}</span></p>
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
                                <input type="radio"  value="{{ $ubicacion->id }}" wire:model="ubicacion_id" name="ubicacion_id" class="radio radio-primary checked:bg-blue-500" />
                            </label>
                        </div>
                    @empty
                    @endforelse
                </div>
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
                <div class="form-control w-full max-w-xs">
                    <label class="label">
                        <span class="label-text">Indique motivo de otra ubicacion </span>
                    </label>
                    <input wire:model="motivo" type="text" class="input input-bordered input-xl" />
                    @error('motivo')
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
            <span>SALIDA: </span>
            <small>{{Auth::user()->name}}</small>
        </h2>
        <div class=" space-y-1">
            <p class="text-lg"><span class="font-bold">Hora Ingreso: </span> {{$asistencia->ingreso_at->toTimeString()}}</p>
            <p class="text-lg"><span class="font-bold">Ubicación: </span> {{$asistencia->ubicacion->descripcion}} {{ $asistencia->otra_ubicacion == "" ? "" : ("(".$asistencia->otra_ubicacion.")") }}</p>
            <p class="text-lg font-bold text-green-600"><span>Hora Salida: </span> <span id="hora">{{Carbon\Carbon::now()->toTimeString()}}</span></p>

        </div>
        <div class="form-control w-full max-w-xs">
            <button wire:click="registrarSalida"
                class="btn btn-primary">Registrar salida</button>
        </div>
    </div>

    @endif

    @push('scripts')
        <script>
            var dia = new Date('{{Carbon\Carbon::now()}}');
            var segundos = dia.getSeconds();
            var hora = dia.getHours();
            var minutos = dia.getMinutes();
            var time;

            function actualizarHora() {
                segundos++;

                if (segundos == 60) {
                segundos = 0;
                minutos++;
                if (minutos == 60) {
                        minutos = 0;
                        hora++;
                        if (hora == 24) {
                            hora = 0;
                        }
                    }
                }
                time = " "  + hora.toString().padStart(2, '0') + ":" + minutos.toString().padStart(2, '0') + ":" + segundos.toString().padStart(2, '0');
                document.getElementById("hora").innerHTML = time;
                window.setTimeout("actualizarHora()",1000);
            }
            window.setTimeout("actualizarHora()",1000);
        </script>
    @endpush

</div>
