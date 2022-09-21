<x-app-layout>
    <div class="py-12">
        <div class="mx-auto space-y-8 max-w-7xl sm:px-6 lg:px-8 ">
            @if (session('message'))
                <div class="mb-4 text-white alert alert-info">
                    <ul>
                        <li>{!! session('message') !!}</li>
                    </ul>
                </div>
            @endif
            <x-pixonui.heading.h1>
                <x-slot  name="action">
                    <a  href="{{ route('docente.create') }}"  class="btn btn-primary">
                        Nuevo Docente
                    </a>
                </x-slot>
                Docentes
            </x-pixonui.heading.h1>
            <livewire:docente.docente-table />
            <div class="text-end">
                <a  href="{{ route('docente.create') }}"  class="btn btn-primary">
                    Nuevo Docente
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
