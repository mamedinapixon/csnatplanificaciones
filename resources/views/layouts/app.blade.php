<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link href="https://cdn.jsdelivr.net/npm/daisyui@2.40.1/dist/full.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link type="text/css" rel="stylesheet" href="{{ asset('css/app.css') }}">
        @livewireStyles

        <!-- Scripts -->
        <link rel="stylesheet" href="//cdn.quilljs.com/1.3.6/quill.bubble.css">
        <style>
            [x-cloak] { display: none !important; }

            .print {
                display: none !important;
            }
            @media print {
                .no-print {
                    display: none !important;
                }
                .print {
                    display: block !important;
                }
                .print-bg
                {
                    background: #fff !important;
                }
                .print-text {
                    color: #000 !important;
                }
                .text-3xl {
                    font-size: 1.2rem;
                }
                h1 {
                    font-size: 1.8rem;
                    font-weight: 800;
                }
                h1 small {
                    font-weight: 400;
                }
                body {
                    background: #fff !important;
                }
                .print-p-0 {
                    padding: 0;
                }
            }
        </style>
    </head>
    <body class="font-sans antialiased">

        @livewire('navigation-menu')

        <div class="min-h-screen bg-gray-100 print-bg">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts
        <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="{{ asset('js/app.js') }}"></script>
        @stack('scripts')
        <script>
            function aletWarning(title, text, confirmButtonText, cancelButtonText, callback)
            {
                Swal.fire({
                    title: title,
                    html: text,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: confirmButtonText,
                    cancelButtonText: cancelButtonText
                    }).then((result) => {
                    if (result.isConfirmed) {
                        callback();
                    }
                })
            }
        </script>

    </body>
</html>
