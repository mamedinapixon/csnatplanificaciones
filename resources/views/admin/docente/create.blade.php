<x-app-layout>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <x-pixonui.heading.h1>Nuevo Docente</x-pixonui.heading.h1>
            <div class="overflow-hidden bg-white sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 sm:px-20">
                    <form
                        action="{{ route('docente.store') }}"
                        method="POST"
                        enctype="multipart/form-data"
                        class="space-y-4 "
                    >
                        <div class="w-full form-control">
                            <x-pixonui.form.label>Apellido</x-pixonui.form.label>
                            <div class="flex items-center w-20 min-w-full space-x-2">
                                <x-pixonui.form.input type="text" for="apellido" name="apellido"></x-pixonui.form.input>
                            </div>
                            <x-pixonui.form.error for="apellido"></x-pixonui.form.error>
                        </div>
                        <div class="w-full form-control">
                            <x-pixonui.form.label>Nombre</x-pixonui.form.label>
                            <div class="flex items-center w-20 min-w-full space-x-2">
                                <x-pixonui.form.input type="text" for="nombre" name="nombre"></x-pixonui.form.input>
                            </div>
                            <x-pixonui.form.error for="nombre"></x-pixonui.form.error>
                        </div>
                        <div class="w-full form-control">
                            <x-pixonui.form.label>Nº Documento</x-pixonui.form.label>
                            <div class="flex items-center w-20 min-w-full space-x-2">
                                <x-pixonui.form.input type="text" for="nro_documento" name="nro_documento"></x-pixonui.form.input>
                            </div>
                            <x-pixonui.form.error for="nro_documento"></x-pixonui.form.error>
                        </div>
                        <div class="w-full form-control">
                            <x-pixonui.form.label>Email</x-pixonui.form.label>
                            <div class="flex items-center w-20 min-w-full space-x-2">
                                <x-pixonui.form.input type="mail" for="email" name="email"></x-pixonui.form.input>
                            </div>
                            <x-pixonui.form.error for="email"></x-pixonui.form.error>
                        </div>
                        <div class="flex flex-row space-x-4 form-control">
                            <a class="max-w-xs btn" href="{{ route('docente.index') }}"  >
                                Volver
                            </a>
                            <input type="submit" value="Crear docente" class="btn btn-wide btn-primary">
                            @csrf
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
