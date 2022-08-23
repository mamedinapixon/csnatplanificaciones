<x-app-layout>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 sm:px-20">
                    <h2>Nueva planificacion</h2>
                    @if(empty($planificacion))
                        No hay ninguna planificacion
                    @else
                        @foreach ($planificaciones as $planificacicon)

                        @endforeach
                    @endif

                    <div class="text-center">
                        <a href="#" class="btn">Nueva Planificación</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
