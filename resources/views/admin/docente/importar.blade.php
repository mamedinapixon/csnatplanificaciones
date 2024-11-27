<x-app-layout>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <x-pixonui.heading.h1>Cargar Archivo CSV de Docentes</x-pixonui.heading.h1>
            <div class="overflow-hidden bg-white sm:rounded-lg">
                <div class="border-b border-gray-200 bg-white p-6 sm:px-20">

                    @if (session('success'))
                        <div style="color: green;">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div style="color: red;">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form action="{{ route('docentes.cargar-csv') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="csv_file" accept=".csv">
                        <button type="submit">Cargar CSV</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
