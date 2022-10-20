<x-app-layout>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <x-pixonui.heading.h1>Editar usuario #{{ $user->id }}</x-pixonui.heading.h1>
            <div class="overflow-hidden bg-white sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 sm:px-20">
                    <div>
                        <x-pixonui.show.labeltext caption="Name">{{ $user->name }}</x-pixonui.show.labeltext>
                        <x-pixonui.show.labeltext caption="Email">{{ $user->email }}</x-pixonui.show.labeltext>
                        <x-pixonui.show.labeltext caption="Google ID">{{ $user->google_id }}</x-pixonui.show.labeltext>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
