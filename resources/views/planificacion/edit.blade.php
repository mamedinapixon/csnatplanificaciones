<x-app-layout>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <x-pixonui.heading.h1><small class="font-light ">{{$periodo_lectivo}} | {{$carrera}}</small><br>{{$asigantura}}</x-pixonui.heading.h1>
            <div class="overflow-hidden bg-white sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 sm:px-20">
                    <livewire:planificacion.edit :planificacion="$planificacion" />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

