<x-guest-layout>
    <x-slot name="header">
        {{ __('Reset Password') }}
    </x-slot>

    <form class="space-y-2" method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <x-forms.label for="email" :value="__('Email')" />
            <div class="mt-2">
                <x-forms.input-text id="email" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
            </div>
            <x-forms.error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <x-forms.label for="password" :value="__('Password')" />
            <div class="mt-2">
                <x-forms.input-text id="password" type="password" name="password" required autocomplete="new-password" />
            </div>
            <x-forms.error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div>
            <x-forms.label for="password_confirmation" :value="__('Confirm Password')" />

            <div class="mt-2">
                <x-forms.input-text id="password_confirmation"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />
            </div>

            <x-forms.error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div>
            <x-buttons.primary-button class="mt-4">
                {{ __('Reset Password') }}
            </x-buttons.primary-button>
        </div>
    </form>
</x-guest-layout>
