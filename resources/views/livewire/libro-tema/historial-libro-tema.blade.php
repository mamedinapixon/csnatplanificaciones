    <div class="py-12">
        <div class="mx-auto space-y-8 max-w-7xl sm:px-6 lg:px-8 ">
            @if (session('message'))
                <div class="mb-4 alert alert-info">
                    <ul>
                        <li>{!! session('message') !!}</li>
                    </ul>
                </div>
            @endif
            <x-pixonui.heading.h1>
                Libro de tema
                <x-slot name="action">
                    <a  href="{{ route('librotema.cargar') }}"  class="btn btn-primary">
                        Cargar libro de tema
                    </a>
                </x-slot>
            </x-pixonui.heading.h1>

            @can('ver planificaciones')
            <div class="flex gap-4">

            </div>
            @endcan

            {{ $this->table }}

        </div>
    </div>

