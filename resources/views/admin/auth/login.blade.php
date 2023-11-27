<x-guest-layout>
    <!-- Session Status -->
    <x-forms.auth-session-status class="mb-4" :status="session('status')" />

    <form action="{{ route('admin.login') }}" method="POST" class="space-y-4">
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

        <div class="flex items-center justify-start">
            <div class="flex items-center">
                <input id="remember-me" name="remember" type="checkbox" class="h-4 w-4 rounded border-gray-300 focus:ring-indigo-600">
                <label for="remember-me" class="ml-3 block text-sm leading-6 text-gray-700">Remember me</label>
            </div>
        </div>

        <div>
            <x-buttons.primary-button>
                {{ __('Log in') }}
            </x-buttons.primary-button>
        </div>
    </form>
</x-guest-layout>
