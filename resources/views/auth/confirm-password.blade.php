<x-guest-layout>
    <x-slot name="header">
        {{ __('Confirm your Password') }}
    </x-slot>

    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
    </div>

    <form class="space-y-2" method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <!-- Password -->
        <div>
            <x-forms.label for="password" :value="__('Password')" />

            <div class="mt-2">
                <x-forms.input-text id="password"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />
            </div>

            <x-forms.error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div>
            <x-buttons.primary-button class="mt-4">
                {{ __('Confirm') }}
            </x-buttons.primary-button>
        </div>
    </form>
</x-guest-layout>
