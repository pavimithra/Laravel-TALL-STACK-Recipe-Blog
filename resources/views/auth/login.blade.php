<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-white">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="h-full font-poppins">
        <div class="flex min-h-full">
            <div class="flex flex-1 flex-col justify-center px-4 py-8 sm:px-6 lg:flex-none lg:px-20 xl:px-24">
                <div class="mx-auto w-full max-w-sm lg:w-96">
                    <div>
                        <a href="{{ route('home') }}">
                            <x-application-logo class="h-10 w-auto" />
                        </a>
                        <h2 class="mt-6 text-2xl font-bold font-merry leading-9 tracking-tight text-gray-900">Sign in to your account</h2>
                        <p class="mt-2 text-sm leading-6 text-gray-500">
                            Not a member?
                            <x-links.link href="{{ route('register') }}">
                                {{ __('Create an Account') }}
                            </x-links.link>
                        </p>
                    </div>

                    <div class="mt-6">
                        <div>
                            <!-- Session Status -->
                            <x-forms.auth-session-status class="mb-4" :status="session('status')" />
                            
                            <form action="{{ route('login') }}" method="POST" class="space-y-4">
                                @csrf

                                <div>
                                    <x-forms.label for="email" :value="__('Email address')" />
                                    <div class="mt-2">
                                        <x-forms.input-text id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="email" />
                                    </div>
                                    <x-forms.error :messages="$errors->get('email')" class="mt-2" />
                                </div>

                                <div>
                                    <x-forms.label for="password" :value="__('Password')" />
                                    <div class="mt-2">
                                        <x-forms.input-text id="password" type="password" name="password" required autocomplete="current-password" />
                                    </div>
                                    <x-forms.error :messages="$errors->get('password')" class="mt-2" />
                                </div>

                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <input id="remember-me" name="remember" type="checkbox" class="h-4 w-4 rounded border-gray-300 focus:ring-indigo-600">
                                        <label for="remember-me" class="ml-3 block text-sm leading-6 text-gray-700">Remember me</label>
                                    </div>

                                    <div class="text-sm leading-6">
                                        @if (Route::has('password.request'))
                                            <x-links.link href="{{ route('password.request') }}">
                                                {{ __('Forgot password?') }}
                                            </x-links.link>
                                        @endif
                                    </div>
                                </div>

                                <div>
                                    <x-buttons.primary-button>
                                        {{ __('Log in') }}
                                    </x-buttons.primary-button>
                                </div>
                            </form>
                        </div>

                        <div class="mt-6">
                            <div class="relative">
                                <div class="absolute inset-0 flex items-center" aria-hidden="true">
                                <div class="w-full border-t border-gray-200"></div>
                                </div>
                                <div class="relative flex justify-center text-sm font-medium leading-6">
                                <span class="bg-white px-6 text-gray-900">Or login with</span>
                                </div>
                            </div>

                            <x-social />
                        </div>
                    </div>
                </div>
            </div>
            <div class="relative hidden w-0 flex-1 lg:block">
                <img class="absolute inset-0 h-full w-full object-cover" src="https://images.unsplash.com/photo-1496917756835-20cb06e75b4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1908&q=80" alt="">
            </div>
        </div>
    </body>
</html>
