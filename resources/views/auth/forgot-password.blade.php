<x-guest-layout>
    <x-slot name="header">
        {{ __('Reset Your Password') }}
    </x-slot>

    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-forms.auth-session-status class="mb-4" :status="session('status')" />

    <form class="space-y-2" method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-forms.label for="email" :value="__('Email')" />
            <div class="mt-2">
                <x-forms.input-text id="email" type="email" name="email" :value="old('email')" required autofocus />
            </div>
            <x-forms.error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div>
            <x-buttons.primary-button class="mt-4">
                {{ __('Email Password Reset Link') }}
            </x-buttons.primary-button>
        </div>
    </form>
</x-guest-layout>
