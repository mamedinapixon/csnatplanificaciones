<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light" data-theme="light">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Styles -->
        <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}?v=1{{ filemtime(public_path('css/app.css')) }}">

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <!--
            <link href="https://cdn.jsdelivr.net/npm/daisyui@3.8.1/dist/full.css" rel="stylesheet" type="text/css" />
        -->

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
            [type='radio']:checked {
                background-image: none;
            }
            .radio-primary:checked:hover, .radio-primary:checked:active, .radio-primary:checked:focus {
                opacity: 1 !important;
                background-color: #2563eb !important;
                color: #2563eb !important;
            }
        </style>
        <script>
            localStorage.theme = 'light';
        </script>
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

        <x-livewire-alert::scripts />

        <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
        
        <script src="{{ mix('js/app.js') }}?v={{ filemtime(public_path('js/app.js')) }}"></script>
        @stack('scripts')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

        <script src="https://kit.fontawesome.com/398c06bb36.js" crossorigin="anonymous"></script>

        @livewire('notifications')
    </body>
</html>
