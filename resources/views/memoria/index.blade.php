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
            <x-pixonui.heading.h1>Memorias
                <x-slot name="action">
                    <a  href="{{ route('memoria.create') }}"  class="btn btn-primary">
                        Nueva Memoria
                    </a>
                </x-slot>
            </x-pixonui.heading.h1>

            <livewire:memoria.memoria-table />

            <div class="text-end">
                <a  href="{{ route('memoria.create') }}"  class="btn btn-primary">
                    Nueva Memoria
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
