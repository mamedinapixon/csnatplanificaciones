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
                    <a  href="{{ route('periodoLectivo.create') }}"  class="btn btn-primary">
                        Nuevo Periodo Lectivo
                    </a>
                </x-slot>
                Periodo Lectivo
            </x-pixonui.heading.h1>
            <livewire:periodo-lectivo.periodo-lectivo-table />
            <div class="text-end">
                <a  href="{{ route('periodoLectivo.create') }}"  class="btn btn-primary">
                    Nuevo Periodo Lectivo
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
