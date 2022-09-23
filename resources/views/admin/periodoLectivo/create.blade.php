<x-app-layout>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            @if (session('error'))
                <div class="mb-4 text-white alert alert-error">
                    <ul>
                        <li>{!! session('error') !!}</li>
                    </ul>
                </div>
            @endif
            <x-pixonui.heading.h1>Nuevo Periodo Lectivo</x-pixonui.heading.h1>
            <div class="overflow-hidden bg-white sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 sm:px-20">
                    <form
                        action="{{ route('periodoLectivo.store') }}"
                        method="POST"
                        enctype="multipart/form-data"
                        class="space-y-4 "
                    >
                        <div class="w-full form-control">
                            <x-pixonui.form.label>Año académico</x-pixonui.form.label>
                            <div class="flex items-center w-20 min-w-full space-x-2">
                                <x-pixonui.form.input type="number" maxlength="4" minlength="4" for="anio_academico" name="anio_academico" required value="{{ old() ? old('anio_academico') : '' }}"></x-pixonui.form.input>
                            </div>
                            <x-pixonui.form.error for="anio_academico"></x-pixonui.form.error>
                        </div>

                        <div class="w-full form-control">
                            <x-pixonui.form.label>Periodo académico</x-pixonui.form.label>
                            <div class="flex items-center w-20 min-w-full space-x-2">
                                <x-pixonui.form.select name="periodo_academico_id" :items="$periodosAcademicos" value="id" caption="nombre" selectid="{{ old() ? old('periodo_academico_id') : '' }}"></x-pixonui.form.select>
                            </div>
                        </div>

                        <div class="w-full form-control">
                            <x-pixonui.form.label>Fecha inicio carga de planificaciones</x-pixonui.form.label>
                            <div class="flex items-center w-20 min-w-full space-x-2">
                                <x-pixonui.form.input type="date" for="fecha_inicio_activo" name="fecha_inicio_activo" required value="{{ old() ? old('fecha_inicio_activo') : '' }}"></x-pixonui.form.input>
                            </div>
                            <x-pixonui.form.error for="fecha_inicio_activo"></x-pixonui.form.error>
                        </div>
                        <div class="w-full form-control">
                            <x-pixonui.form.label>Fecha cierre carga de planificaciones</x-pixonui.form.label>
                            <div class="flex items-center w-20 min-w-full space-x-2">
                                <x-pixonui.form.input type="date" for="fecha_fin_activo" name="fecha_fin_activo" required value="{{ old() ? old('fecha_fin_activo') : '' }}"></x-pixonui.form.input>
                            </div>
                            <x-pixonui.form.error for="fecha_fin_activo"></x-pixonui.form.error>
                        </div>
                        <div class="flex flex-row space-x-4 form-control">
                            <a class="max-w-xs btn" href="{{ route('periodoLectivo.index') }}"  >
                                Volver
                            </a>
                            <input type="submit" value="Crear" class="btn btn-wide btn-primary">
                            @csrf
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
