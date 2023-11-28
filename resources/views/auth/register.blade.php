<x-guest-layout>
    <x-slot name="header">
        {{ __('Registeration Form') }}
    </x-slot>

    <form class="space-y-2" action="{{ route('register') }}" method="POST">
        @csrf
        
        <!-- Name -->
        <div>
            <x-forms.label for="name" :value="__('Name')" />
            <div class="mt-2">
                <x-forms.input-text id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>
            <x-forms.error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div>
            <x-forms.label for="email" :value="__('Email')" />
            <div class="mt-2">
                <x-forms.input-text  id="email" type="email" name="email" :value="old('email')" required autocomplete="email" />
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
                <x-forms.input-text id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"  />
            </div>
            <x-forms.error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div>
            <x-buttons.primary-button class="mt-4">
                {{ __('Register') }}
            </x-buttons.primary-button>
        </div>
    </form>

    <div>
        <div class="relative mt-6">
            <div class="flex items-center justify-start">
                <label class="ml-3 block text-sm leading-6 text-gray-900">Already Registered ?</label>

                <div class="text-sm leading-6 ml-2">
                    <x-links.link href="{{ route('login') }}">
                        {{ __('Login Here') }}
                    </x-links.link>
                </div>
            </div>
        </div>

        <div class="relative mt-4">
            <div class="absolute inset-0 flex items-center" aria-hidden="true">
                <div class="w-full border-t border-gray-200"></div>
            </div>
            <div class="relative flex justify-center text-sm font-medium leading-6">
                <span class="bg-white px-6 text-gray-900">Or login with</span>
            </div>
        </div>

        <x-social />
    </div>
    
</x-guest-layout>
