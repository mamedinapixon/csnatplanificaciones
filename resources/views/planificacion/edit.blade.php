<x-app-layout>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            @if (!empty($planificacion->observaciones_comision))
            <div class="alert shadow-lg">
                <div>
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-info flex-shrink-0 w-6 h-6 m-4"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                  <div><span class="text-lg font-bold">Observaciones:</span><br>
                    {!! $planificacion->observaciones_comision !!}
                    </div>
                </div>
              </div>
            @endif
            <x-pixonui.heading.h1><small class="font-light ">{{$periodo_lectivo}} | {{$carrera}}</small><br>{{$asigantura}}</x-pixonui.heading.h1>
            <div class="overflow-hidden bg-white sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 sm:px-20">
                    <livewire:planificacion.edit :planificacion="$planificacion" />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

