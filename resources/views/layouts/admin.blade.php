<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $title ?? 'Laravel' }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/admin.css', 'resources/js/app.js'])

        
        <style>
            [x-cloak] { display: none !important; }
        </style>
    </head>
    <body class="h-full font-poppins bg-gray-50 dark:bg-gray-900">
        <div x-data="{ open: false }">
            <!-- Off-canvas menu for mobile, show/hide based on off-canvas menu state. -->
            <div x-cloak :class="{'block': open, 'hidden': ! open}" class="relative z-50 lg:hidden" role="dialog" aria-modal="true">
                <!-- Off-canvas menu backdrop, show/hide based on off-canvas menu state. -->
                <div class="fixed inset-0 bg-gray-900/80 dark:bg-gray-500"></div>

                <div class="fixed inset-0 flex">
                    <!-- Off-canvas menu, show/hide based on off-canvas menu state. -->
                    <div class="relative mr-16 flex w-full max-w-xs flex-1">
                        <!-- Close button, show/hide based on off-canvas menu state. -->
                        <div class="absolute left-full top-0 flex w-16 justify-center pt-5">
                            <button @click="open = ! open" type="button" class="-m-2.5 p-2.5">
                                <span class="sr-only">Close sidebar</span>
                                <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>

                        <!-- Sidebar component, swap this element with another sidebar if you like -->
                        @include('layouts.admin-navigation')
                    </div>
                </div>
            </div>

            <!-- Static sidebar for desktop -->
            <div class="hidden lg:fixed lg:inset-y-0 lg:z-50 lg:flex lg:w-72 lg:flex-col">
                <!-- Sidebar component, swap this element with another sidebar if you like -->
                @include('layouts.admin-navigation')
            </div>

            <div class="lg:pl-72">
                <div
                    class="sticky top-0 z-40 flex h-16 shrink-0 items-center gap-x-4 border-b border-gray-200 dark:border-gray-800 bg-white dark:bg-gray-900 px-4 shadow-sm sm:gap-x-6 sm:px-6 lg:px-8">
                    <button @click="open = ! open" type="button" class="-m-2.5 p-2.5 text-gray-700 dark:text-gray-300 lg:hidden">
                        <span class="sr-only">Open sidebar</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                            aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                    </button>

                    <!-- Separator -->
                    <!-- <div class="h-6 w-px bg-gray-200 lg:hidden" aria-hidden="true"></div>  -->

                    <div class="flex flex-1 gap-x-4 self-stretch lg:gap-x-6 items-center">
                        <div class="relative flex flex-1 items-center">
                            <!-- <form action="#" method="GET" class="w-full lg:w-3/5">
                                <label for="search-field" class="sr-only">Search</label>
                                <div class="relative rounded-md shadow-sm">
                                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                        <svg class="h-5 w-5 text-gray-400"
                                            viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <input type="search" name="search" id="search" class="block w-full rounded-md border-0 py-1.5 pl-10 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-white/5 dark:text-white dark:ring-white/10 dark:focus:ring-indigo-500" placeholder="Search...">
                                </div>
                            </form> -->
                        </div>
                        <div class="flex items-center gap-x-4 lg:gap-x-6">
                            <!-- <button type="button" class="-m-2.5 p-2.5 text-gray-400 hover:text-gray-500">
                                <span class="sr-only">View notifications</span>
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                    aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                                </svg>
                            </button> -->

                            <button x-data @click="$store.darkMode.toggle()" class="-m-2.5 p-2.5 text-gray-400 hover:text-gray-500" type="button">
                                <span class="dark:hidden">
                                    <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="w-6 h-6">
                                        <path d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" class="fill-sky-400/20 stroke-sky-500"></path>
                                        <path
                                            d="M12 4v1M17.66 6.344l-.828.828M20.005 12.004h-1M17.66 17.664l-.828-.828M12 20.01V19M6.34 17.664l.835-.836M3.995 12.004h1.01M6 6l.835.836"
                                            class="stroke-sky-500"></path>
                                    </svg>
                                </span>
                                <span class="hidden dark:inline">
                                    <svg viewBox="0 0 24 24" fill="none" class="w-6 h-6">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M17.715 15.15A6.5 6.5 0 0 1 9 6.035C6.106 6.922 4 9.645 4 12.867c0 3.94 3.153 7.136 7.042 7.136 3.101 0 5.734-2.032 6.673-4.853Z"
                                            class="fill-sky-400/20"></path>
                                        <path
                                            d="m17.715 15.15.95.316a1 1 0 0 0-1.445-1.185l.495.869ZM9 6.035l.846.534a1 1 0 0 0-1.14-1.49L9 6.035Zm8.221 8.246a5.47 5.47 0 0 1-2.72.718v2a7.47 7.47 0 0 0 3.71-.98l-.99-1.738Zm-2.72.718A5.5 5.5 0 0 1 9 9.5H7a7.5 7.5 0 0 0 7.5 7.5v-2ZM9 9.5c0-1.079.31-2.082.845-2.93L8.153 5.5A7.47 7.47 0 0 0 7 9.5h2Zm-4 3.368C5 10.089 6.815 7.75 9.292 6.99L8.706 5.08C5.397 6.094 3 9.201 3 12.867h2Zm6.042 6.136C7.718 19.003 5 16.268 5 12.867H3c0 4.48 3.588 8.136 8.042 8.136v-2Zm5.725-4.17c-.81 2.433-3.074 4.17-5.725 4.17v2c3.552 0 6.553-2.327 7.622-5.537l-1.897-.632Z"
                                            class="fill-sky-500"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M17 3a1 1 0 0 1 1 1 2 2 0 0 0 2 2 1 1 0 1 1 0 2 2 2 0 0 0-2 2 1 1 0 1 1-2 0 2 2 0 0 0-2-2 1 1 0 1 1 0-2 2 2 0 0 0 2-2 1 1 0 0 1 1-1Z"
                                            class="fill-sky-500"></path>
                                    </svg>
                                </span>
                            </button>
                            

                            <!-- Separator -->
                            <div class="hidden lg:block lg:h-6 lg:w-px lg:bg-gray-200" aria-hidden="true"></div>

                            <!-- Profile dropdown -->
                            <div x-data="{ dropdown: false }" @click.outside="dropdown = false" @close.stop="dropdown = false" class="relative">
                                <button @click="dropdown = ! dropdown" type="button" class="-m-1.5 flex items-center p-1.5" id="user-menu-button"
                                    aria-expanded="false" aria-haspopup="true">
                                    <span class="sr-only">Open user menu</span>
                                    <img class="h-8 w-8 rounded-full bg-gray-50 dark:bg-gray-900" src="{{ asset('images/avatar/'.(Auth::user()->avatar ? Auth::user()->avatar : 'no-image.jpg')) }}" alt="">
                                    <span class="hidden lg:flex lg:items-center">
                                        <span class="ml-4 text-sm font-semibold leading-6 text-gray-900 dark:text-gray-300" aria-hidden="true">{{ Auth::user()->name }}</span>
                                        <svg class="ml-2 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor"
                                            aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </span>
                                </button>

                                <!-- Dropdown menu, show/hide based on menu state. -->
                                <div :class="{'block': dropdown, 'hidden': ! dropdown}" class="absolute right-0 z-10 mt-2.5 w-32 origin-top-right rounded-md bg-white py-2 shadow-lg ring-1 ring-gray-900/5 focus:outline-none"
                                    role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                                    <!-- Active: "bg-gray-50", Not Active: "" -->
                                    <!-- <a href="#" class="block px-3 py-1 text-sm leading-6 text-gray-900" role="menuitem"
                                        tabindex="-1" id="user-menu-item-0">Your profile</a> -->
                                    <form class="flex" method="POST" action="{{ route('admin.logout') }}">
                                        @csrf
                                        <a href="{{ route('admin.logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" 
                                            class="block px-3 py-1 text-sm leading-6 text-gray-900"  role="menuitem" tabindex="-1" id="user-menu-item-1">
                                            <span class="sr-only">Logout</span>
                                            Logout
                                        </a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <main>
                    @props(['heading'])
                    @if (isset($header))
                        <header class="text-2xl text-gray-900 dark:text-white font-merry bg-gray-200 dark:bg-gray-800 px-4 py-4 xl:px-8 uppercase">
                            {{ $header }}
                        </header>
                    @endif
                    <div class="py-6 px-4 sm:px-6 lg:px-8">
                        {{ $slot }}
                    </div>
                </main>
            </div>
        </div>
    </body>
</html>
