
<div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        @if (session('message'))
            <div class="alert alert-info mb-4">
                <ul>
                    <li>{!! session('message') !!}</li>
                </ul>
            </div>
        @endif
        <x-pixonui.heading.h1 >
            Registro de tema
        </x-pixonui.heading.h1>
        <div class="flex-auto bg-white sm:rounded-lg">
            <div class="border-b border-gray-200 bg-white p-6 sm:px-20">
                <!-- Contenido -->

                <form wire:submit.prevent="submit">
                    {{ $this->form }}

                    <button type="submit">
                        Submit
                    </button>
                </form>

                <!-- end contenido -->
            </div>
        </div>
    </div>
</div>