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
                Usuarios
            </x-pixonui.heading.h1>
            <livewire:user.user-table />
        </div>
    </div>
</x-app-layout>
