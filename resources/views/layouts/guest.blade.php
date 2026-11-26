<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <!-- Fundo com Gradiente e Animação suave -->
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gradient-to-br from-indigo-600 via-purple-700 to-indigo-900">

            <div class="mb-4 transform hover:scale-110 transition-transform duration-500">
                <a href="/">
                    <div class="w-20 h-20 bg-white rounded-3xl shadow-2xl flex items-center justify-center text-4xl">
                        📅
                    </div>
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-8 py-10 bg-white shadow-2xl overflow-hidden rounded-[2.5rem] border border-white/20 backdrop-blur-sm">
                {{ $slot }}
            </div>

            <!-- Rodapé Simples -->
            <p class="mt-8 text-white/60 text-sm font-medium">
                &copy; {{ date('Y') }} AgendaPro - Organização Inteligente
            </p>
        </div>
    </body>
</html>