<div class="space-y-4 ">
    <x-pixonui.heading.h2>Planificaciones presentadas</x-pixonui.heading.h2>
    <div class="flex gap-4">
        @foreach ($carreras as $carrera)
        <div class="shadow stats">
            <div class="stat">
                <div class="stat-title">{{ $carrera->carrera }}</div>
                <div class="stat-value">{{ round($carrera->cant_presentadas * 100 / $carrera->cant_materias) }} %</div>
                <div class="stat-desc">{{ $carrera->cant_presentadas  }} de {{$carrera->cant_materias}} materias presentadas</div>
            </div>
        </div>
        @endforeach
    </div>
</div>

