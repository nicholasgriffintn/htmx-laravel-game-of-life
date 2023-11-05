<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <title>{{ config('app.name', 'Game of Life with Laravel and htmlx') }}</title>

        <!-- Styles -->
        @vite(['resources/css/app.css'])

        <style>
            [x-cloak] { display: none !important; }
        </style>
    </head>
    <body class="font-sans antialiased">
        <div
          class="min-h-screen relative bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white"
          hx-boost="true"
        >
            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main
              class="sm:flex sm:justify-center sm:items-center"
            >
                {{ $slot }}
            </main>
        </div>

        <!-- Scripts -->
        @vite('resources/js/app.js')
        <script>
            document.body.addEventListener('htmx:configRequest', (event) => {
                console.log(event)
                event.detail.headers['X-CSRF-Token'] = "{{ csrf_token() }}";
             })
        </script>
    </body>
</html>