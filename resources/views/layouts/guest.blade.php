<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-50">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="h-full font-poppins">
        <div class="flex min-h-full flex-col justify-center py-8 sm:px-6 lg:px-8">
            <div class="sm:mx-auto sm:w-full sm:max-w-md">
                <a href="{{ route('home') }}">
                    <x-application-logo class="mx-auto h-10 w-auto" />
                </a>
                <!-- Page Heading -->
                @if (isset($header))
                    <h2 class="mt-4 text-center text-2xl leading-9 tracking-tight text-gray-900 font-merry">
                        {{ $header }}
                    </h2>
                @endif
            </div>

            <div class="mt-4 sm:mx-auto sm:w-full sm:max-w-[480px]">
                <div class="bg-white px-6 py-6 shadow sm:rounded-lg sm:px-12">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </body>
</html>
