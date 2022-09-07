<div class="w-full space-y-2">
    <div class="w-full form-control">
        <x-pixonui.form.label>Lugares tentativos de campaña y días aproximados en cada caso</x-pixonui.form.label>
        <div class="overflow-x-auto">
            <table class="table w-full table-zebra">
              <!-- head -->
              <thead>
                <tr>
                  <th>#</th>
                  <th>Lugar</th>
                  <th>Días aproximados</th>
                  <th>Fecha Tentativa</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <!-- rows-->
                @if(!empty($salidas))
                    @foreach ($salidas as $salida)
                    <tr wire:key="salida-{{ $salida->id }}">
                        <td>{{ $loop->index+1 }}</td>
                        <th>{{ $salida->nombre }}</th>
                        <td>{{ $salida->dias_tentativos }}</td>
                        <td>{{ $salida->fecha_tentativa }}</td>
                        <td>
                            <button class="btn btn-ghost" wire:click="destroy({{$salida->id}})" wire:loading.attr="disabled" wire:key="btn-salida-remove-{{ $salida->id }}">
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

        <div class="flex justify-end space-x-4" >
            <div class="w-full max-w-xs form-control">
                <div class="flex items-center space-x-2">
                    <x-pixonui.form.input for="nombre" wire:model.defer="nombre" placeholder="Lugar tentativo"></x-pixonui.form.input>
                </div>
                <x-pixonui.form.error for="nombre"></x-pixonui.form.error>
            </div>
            <div class="w-full max-w-xs form-control">
                <div class="flex items-center space-x-2">
                    <x-pixonui.form.input type="number" for="dias_tentativos" wire:model.defer="dias_tentativos" placeholder="Días aproximados"></x-pixonui.form.input>
                </div>
                    <x-pixonui.form.error for="dias_tentativos"></x-pixonui.form.error>
            </div>
            <div class="w-full max-w-xs form-control">
                <div class="flex items-center space-x-2">
                    <x-pixonui.form.input for="fecha_tentativa" wire:model.defer="fecha_tentativa" placeholder="Fecha tentativa (Quincena o mes)"></x-pixonui.form.input>
                </div>
                <x-pixonui.form.error for="fecha_tentativa"></x-pixonui.form.error>
            </div>
            <div>
                <button class="btn btn-secondary" wire:click="store" wire:loading.class="loading">Agregar</button>
            </div>
        </div>
    </div>
</div>
