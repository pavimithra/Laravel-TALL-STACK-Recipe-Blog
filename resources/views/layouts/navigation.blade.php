<nav x-data="{ open: false }" aria-label="Top">
    <!-- navigation -->
    <div class="bg-white shadow">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-16 items-center justify-between">
                <!-- Logo (lg+) -->
                <div class="hidden lg:flex lg:items-center">
                    <a href="{{ route('home') }}">
                        <span class="sr-only">Your Company</span>
                        <x-application-logo class="h-8 w-auto" />
                    </a>
                </div>

                <!-- Mobile menu and search (lg-) -->
                <div class="flex flex-1 items-center lg:hidden">
                    <!-- Mobile menu toggle, controls the 'mobileMenuOpen' state. -->
                    <button @click="open = ! open" type="button" class="-ml-2 rounded-md bg-white p-2 text-gray-400">
                        <span class="sr-only">Open menu</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                    </button>

                    <!-- Search -->
                    <a href="#" class="ml-2 p-2 text-gray-400 hover:text-gray-500">
                        <span class="sr-only">Search</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                        </svg>
                    </a>
                </div>

                <!-- Logo (lg-) -->
                <a href="#" class="lg:hidden">
                    <span class="sr-only">Your Company</span>
                    <x-application-logo class="h-8 w-auto" />
                </a>

                <div class="flex flex-1 items-center justify-end">
                    <div class="flex items-center lg:ml-8">
                        <div class="hidden lg:flex mr-2">
                            <div class="flex h-full justify-center space-x-8">
                                <a href="#"
                                    class="flex items-center text-sm font-medium text-gray-700 hover:text-gray-800">Breakfast</a>
                                <a href="#"
                                    class="flex items-center text-sm font-medium text-gray-700 hover:text-gray-800">Lunch</a>
                                <a href="#"
                                    class="flex items-center text-sm font-medium text-gray-700 hover:text-gray-800">Dinner</a>
                                <a href="#"
                                    class="flex items-center text-sm font-medium text-gray-700 hover:text-gray-800">Drinks</a>
                                <a href="#"
                                    class="flex items-center text-sm font-medium text-gray-700 hover:text-gray-800">Snacks</a>
                            </div>
                        </div>
                        <span class="mx-4 h-6 w-px bg-gray-200 lg:mx-6" aria-hidden="true"></span>
                        <div class="flex space-x-6">
                            <div class="flex">
                                <a href="#" class="-m-2 p-2 text-gray-500 hover:text-gray-500">
                                    <span class="sr-only">Search</span>
                                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                                    </svg>
                                </a>
                            </div>                                            

                            @if (Route::has('login'))
                                @auth
                                    <div class="flex">
                                        <a href="{{ route('dashboard') }}" class="-m-2 p-2 text-gray-500 hover:text-gray-500">
                                            <span class="sr-only">Login</span>
                                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                            </svg>
                                        </a>
                                    </div>

                                    <form class="flex" method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" class="-m-2 p-2 text-gray-500 hover:text-gray-500">
                                            <span class="sr-only">Logout</span>
                                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" 
                                                stroke-width="1.5" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                                            </svg>
                                        </a>
                                    </form>

                                @else
                                    <div class="flex">
                                        <a href="{{ route('login') }}" class="-m-2 p-2 text-gray-500 hover:text-gray-500">
                                            <span class="sr-only">Login</span>
                                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                            </svg>
                                        </a>
                                    </div>

                                    @if (Route::has('register'))
                                        <div class="flex">
                                            <a href="{{ route('register') }}" class="-m-2 p-2 text-gray-500 hover:text-gray-500">
                                                <span class="sr-only">Register</span>
                                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" 
                                                    stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" />
                                                </svg>
                                            </a>
                                        </div>
                                    @endif
                                @endauth
                            @endif
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="relative z-40 lg:hidden" role="dialog" aria-modal="true">

        <div class="fixed inset-0 bg-black bg-opacity-25"></div>

        <div class="fixed inset-0 z-40 flex">
            <!-- Off-canvas menu, show/hide based on off-canvas menu state. -->
            <div class="relative flex w-full max-w-xs flex-col overflow-y-auto bg-white pb-12 shadow-xl">
                <div class="flex px-4 pb-2 pt-5">
                    <button @click="open = ! open" type="button"
                        class="-m-2 inline-flex items-center justify-center rounded-md p-2 text-gray-400">
                        <span class="sr-only">Close menu</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!-- Links -->

                <div class="space-y-6 border-t border-gray-200 px-4 py-6">
                    <div class="flow-root">
                        <a href="#" class="-m-2 block p-2 font-medium text-gray-900">Breakfast</a>
                    </div>
                    <div class="flow-root">
                        <a href="#" class="-m-2 block p-2 font-medium text-gray-900">Lunch</a>
                    </div>
                    <div class="flow-root">
                        <a href="#" class="-m-2 block p-2 font-medium text-gray-900">Dinner</a>
                    </div>
                    <div class="flow-root">
                        <a href="#" class="-m-2 block p-2 font-medium text-gray-900">Drinks</a>
                    </div>
                    <div class="flow-root">
                        <a href="#" class="-m-2 block p-2 font-medium text-gray-900">Snacks</a>
                    </div>
                </div>

            </div>
        </div>
    </div>

</nav>