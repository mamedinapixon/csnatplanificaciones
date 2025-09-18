<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Reportes de Asistencia para el Año: ') . $year }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Selecciona un Mes:</h3>
                <ul class="list-disc pl-5">
                    @forelse ($months as $month)
                        <li>
                            <a href="{{ route('reportes.asistencia.showReports', ['year' => $year, 'month' => $month]) }}" class="text-blue-600 hover:text-blue-900">
                                {{ ucfirst($month) }}
                            </a>
                        </li>
                    @empty
                        <li>No hay meses disponibles con reportes de asistencia para este año.</li>
                    @endforelse
                </ul>
                <div class="mt-4">
                    <a href="{{ route('reportes.asistencia.index') }}" class="text-blue-600 hover:text-blue-900">&larr; Volver a Años</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
