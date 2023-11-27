<x-admin-layout>
    <x-slot name="header">
        {{ __('Dashboard') }}
    </x-slot>

    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg text-sm">
        <div class="p-6 text-gray-900 dark:text-gray-100">
            {{ __("You're logged in Admin!") }}
        </div>
    </div>
</x-admin-layout>
