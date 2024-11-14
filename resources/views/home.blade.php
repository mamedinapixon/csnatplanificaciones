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
            <x-pixonui.heading.h1>Panel Docente
            </x-pixonui.heading.h1>
            <section class="flex flex-wrap gap-4">
                <div class="shadow-xl card w-96 bg-base-100">
                    <figure><img src="{{asset('img/planificacion2.jpg')}}" alt="Planificacion" class="object-cover h-48 w-96" /></figure>
                    <div class="card-body">
                        <h2 class="card-title">Planificación de la materia</h2>
                        <p>Sólo debe ser llenada por un docente, el responsable de cátedra o quien éste designe</p>
                        <br>
                        <div class="justify-end card-actions">
                            <a href="{{ route('planificacion.index') }}" class="btn btn-primary">Ingresar</a>
                        </div>
                    </div>
                </div>
                <div class="shadow-xl card w-96 bg-base-100">
                    <figure><img src="{{asset('img/memoria.png')}}" alt="Memoria" class="object-cover h-48 w-96" /></figure>
                    <div class="card-body">
                        <h2 class="card-title">Memoria individual</h2>
                        <p>Debe ser llenada por cada docente de la institución en forma individual</p>
                        <div class="justify-end card-actions">
                            <a href="{{ route('memoria.index') }}" class="btn btn-primary">Ingresar</a>
                        </div>
                    </div>
                </div>
                <div class="shadow-xl card w-96 bg-base-100">
                    <figure><img src="{{asset('img/asistencia.jpg')}}" alt="Asistencia" class="object-cover h-48 w-96" /></figure>
                    <div class="card-body">
                        <h2 class="card-title">Asistencia</h2>
                        <p></p>
                        <p></p>
                        <div class="justify-end card-actions">
                            <a href="{{ route('asistencia.index') }}" class="btn btn-primary">Ingresar</a>
                        </div>
                    </div>
                </div>
                <div class="shadow-xl card w-96 bg-base-100">
                    <figure><img src="{{asset('img/librotema.jpg')}}" alt="libro de tema" class="object-cover h-48 w-96" /></figure>
                    <div class="card-body">
                        <h2 class="card-title">Libro de tema</h2>
                        <p></p>
                        <p></p>
                        <div class="justify-end card-actions">
                            <a href="{{ route('librotema.historial') }}" class="btn btn-primary">Ingresar</a>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</x-app-layout>
