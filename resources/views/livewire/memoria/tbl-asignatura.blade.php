<div class="w-full space-y-2">
    <div class="w-full form-control">
        <x-pixonui.form.label>{{ $label }}</x-pixonui.form.label>
        <div class="">
            <table class="table w-full table-zebra">
              <!-- head -->
              <thead>
                <tr>
                  <th>#</th>
                  <th>Asignatura</th>
                  <th>Cargo</th>
                  <th>Dedicación</th>
                  <th>Situación Cargo</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <!-- rows-->
                @if(!empty($memoriasAsignaturas))
                    @foreach ($memoriasAsignaturas as $memoriaAsignatura)
                    <tr wire:key="docente-partipan-{{ $memoriaAsignatura->id }}">
                        <td>{{ $loop->index+1 }}</td>
                        <td>{{ $memoriaAsignatura->asignatura }}</td>
                        <td>{{ $memoriaAsignatura->cargo->nombre }}</td>
                        <td>{{ $memoriaAsignatura->dedicacion->nombre }}</td>
                        <td>{{ $memoriaAsignatura->situacion_cargo->nombre }}</td>
                        <td>
                            <button class="btn btn-ghost" wire:click="destroy({{$memoriaAsignatura->id}})" wire:loading.attr="disabled" wire:key="btn-docente-remove-{{ $memoriaAsignatura->id }}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                </svg>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                @endif
              </tbody>
            </table>
        </div>
    </div>
    <div class="w-full form-control">
        <div class="flex justify-end space-x-4 flex-wrap" >
            <input class='w-full max-w-xs input input-bordered' placeholder='Asignatura' wire:model.defer="asignatura"/>
            <select class="select select-bordered" wire:model.defer="cargo_id">
                <option value="null" disabled>Cargo</option>
                @foreach ($cargos as $cargo)
                    <option value="{{ $cargo->id }}"  wire:key="cargo-{{ $cargo->id }}">
                        {{ $cargo->nombre }}
                    </option>
                @endforeach
            </select>
            <select class="select select-bordered" wire:model.defer="dedicacion_id">
                <option value="null" disabled>Dedicación</option>
                @foreach ($dedicaciones as $dedicacion)
                    <option value="{{ $dedicacion->id }}"  wire:key="dedicacion-{{ $dedicacion->id }}">
                        {{ $dedicacion->nombre }}
                    </option>
                @endforeach
            </select>
            <select class="select select-bordered" wire:model.defer="situacion_cargo_id">
                <option value="null" disabled>Situación</option>
                @foreach ($situaciones as $situacion)
                    <option value="{{ $situacion->id }}"  wire:key="situacion-{{ $situacion->id }}">
                        {{ $situacion->nombre }}
                    </option>
                @endforeach
            </select>
            <button class="btn btn-secondary" wire:click="store" wire:loading.class="loading">Agregar</button>
        </div>
        @error('asignatura') <x-pixonui.alert.error>{{ $message }}</x-pixonui.alert.error> @enderror
        @error('cargo_id') <x-pixonui.alert.error>{{ $message }}</x-pixonui.alert.error> @enderror
        @error('dedicacion_id') <x-pixonui.alert.error>{{ $message }}</x-pixonui.alert.error> @enderror
        @error('situacion_cargo_id') <x-pixonui.alert.error>{{ $message }}</x-pixonui.alert.error> @enderror
    </div>
</div>
