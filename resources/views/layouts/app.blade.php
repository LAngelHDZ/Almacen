<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">


        @livewireStyles

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
      
    </head>
    <body class="font-sans antialiased">
        {{-- <x-jet-banner /> --}}

        <div class="min-w-screen bg-gray-100">
            @livewire('navigation-menu')
        </div>
        <div class="flex h-screen">
                <div class="p-6 border-r w-1/3 border-blue-500">
                    <ul>
                        <li class="mb-8">Inicio</li>
                        <li class="mb-8">Empleado</li>
                        <li class="mb-8">Administrador</li>
                        <li class="mb-8">Almacen</li>
                        <li class="mb-8">Recursos MAteriales</li>
                        <li class="mb-8">Director</li>
                    </ul>
                </div>

                <div class="p-6">
                    <h1 class="text-4xl font-bold mb-10"> Grid Template</h1>
                </div>
        </div>
        @stack('modals')

        @livewireScripts
    </body>
</html>
