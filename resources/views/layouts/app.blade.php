<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-poppins bg-white">
        <header class="relative z-10">
            @include('layouts.navigation')
        </header>

        <main>
            {{ $slot }}
        </main>

        <footer aria-labelledby="footer-heading" class="bg-white">

        </footer>
    </body>
</html>
