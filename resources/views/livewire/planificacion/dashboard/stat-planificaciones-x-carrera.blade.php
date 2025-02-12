<div class="space-y-4 ">
    <div class="flex items-center gap-4">
        <x-pixonui.heading.h2>Planificaciones presentadas</x-pixonui.heading.h2>
        <select name="city" wire:model="anio_academico_id"
                class="p-2 px-4 py-2 pr-8 leading-tight bg-white border border-gray-400 rounded shadow appearance-none hover:border-gray-500 focus:outline-none focus:shadow-outline">
                <option value=''>Año académico</option>
                @foreach($anioAcademicos as $item)
                    <option value={{ $item->anio_academico }}>{{ $item->anio_academico }}</option>
                @endforeach
            </select>
    </div>

    <div class="flex gap-4 flex-wrap">
        @if(!empty($carreras))
            @foreach ($carreras as $carrera)
            <div class="shadow stats">
                <div class="stat">
                    <div class="stat-title">{{ $carrera['dato']->carrera }}</div>
                    <div class="stat-value">{{ round($carrera['cantidad_presentadas'] * 100 / $carrera['dato']->cant_materias) }} %</div>
                    <div class="stat-desc">{{ $carrera['cantidad_presentadas']  }} de {{$carrera['dato']->cant_materias}} materias presentadas</div>
                </div>
            </div>
            @endforeach
        @endif
    </div>
</div>

@push('scripts')
    <script>
        Livewire.emit('cambiarAnioAcademico',{{$anio_academico_id}});
        //Livewire.emit('setFilter', 'anio_academico_id', {{$anio_academico_id}});
        //Livewire.emit('refreshDatatable');
        console.log({{$anio_academico_id}});
    </script>
@endpush
