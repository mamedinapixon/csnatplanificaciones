<x-app-layout>
    <div class="py-12">
        <div class="mx-auto space-y-8 max-w-7xl sm:px-6 lg:px-8 ">
            @if (session('message'))
                <div class="mb-4 alert alert-info">
                    <ul>
                        <li>{!! session('message') !!}</li>
                    </ul>
                </div>
            @endif
            <x-pixonui.heading.h1>Planificaciones
                <x-slot name="action">
                    <a  href="{{ route('planificacion.create') }}"  class="btn btn-primary">
                        Nueva Planificación
                    </a>
                </x-slot>
            </x-pixonui.heading.h1>

            @can('ver planificaciones')
            <div class="flex gap-4">
                <livewire:planificacion.dashboard.stat-planificaciones-x-carrera />
            </div>
            @endcan

            <livewire:planificacion.planificacion-table />

            <div class="text-end">
                <a  href="{{ route('planificacion.create') }}"  class="btn btn-primary">
                    Nueva Planificación
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
