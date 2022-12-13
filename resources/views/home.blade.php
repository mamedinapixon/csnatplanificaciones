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
            <section class="flex gap-4">
                <div class="shadow-xl card w-96 bg-base-100">
                    <figure><img src="{{asset('img/planificacion2.jpg')}}" alt="Shoes" /></figure>
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
                    <figure><img src="{{asset('img/memoria.png')}}" alt="Shoes" /></figure>
                    <div class="card-body">
                        <h2 class="card-title">Memoria individual</h2>
                        <p>Debe ser llenada por cada docente de la institución en forma individual</p>
                        <div class="items-center justify-between card-actions">
                            <div class="w-48 alert">
                                <div>
                                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="flex-shrink-0 w-6 h-6 stroke-info"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                  <span>Se habilitará próximamente</span>
                                </div>
                              </div>
                            <button class="btn btn-primary">Ingresar</button>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</x-app-layout>
