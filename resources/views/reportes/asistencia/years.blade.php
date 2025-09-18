<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Reportes de Asistencia por Año') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Selecciona un Año:</h3>
                <ul class="list-disc pl-5">
                    @forelse ($years as $year)
                        <li>
                            <a href="{{ route('reportes.asistencia.showMonths', $year) }}" class="text-blue-600 hover:text-blue-900">
                                {{ $year }}
                            </a>
                        </li>
                    @empty
                        <li>No hay años disponibles con reportes de asistencia.</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>
