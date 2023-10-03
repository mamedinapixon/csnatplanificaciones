<x-app-layout>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            @if (session('message'))
                <div class="alert alert-info mb-4">
                    <ul>
                        <li>{!! session('message') !!}</li>
                    </ul>
                </div>
            @endif
            <x-pixonui.heading.h1 >
                Historial de asistencia
                <x-slot  name="action">
                    <a  href="{{ route('asistencia.index') }}"  class="btn btn-primary">
                        <i class="fa-solid fa-user-check"></i> Registrar Asistencia
                    </a>
                </x-slot>
            </x-pixonui.heading.h1>
            <div class="flex-auto overflow-hidden bg-white sm:rounded-lg">
                <div class="border-b border-gray-200 bg-white p-6 sm:px-20">
                    <livewire:asistencia.asistencia-table />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
