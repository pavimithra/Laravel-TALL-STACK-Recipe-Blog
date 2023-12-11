<div>
    <x-slot name="header">
        {{ __('Show User') }}
    </x-slot>

    <div class="sm:flex sm:items-center justify-end">
        <div class="sm:flex">
            <a href="{{ route('admin.users') }}">
                <x-admin.buttons.primary-button>
                    {{ __('Back') }}
                </x-admin.buttons.primary-button>
            </a>
        </div>
    </div>

    <div class="space-y-12 sm:space-y-16">
        <div class="mt-6 space-y-4 pb-12 sm:space-y-0 sm:pb-0 divide-y divide-gray-300 dark:divide-gray-800">
            <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-4">
                <x-admin.forms.label for="name" class="font-bold" :value="__('User Name')" />
                <div class="sm:col-span-2 sm:mt-0 text-gray-900 dark:text-gray-200">
                    {{ $user->name }}
                </div>
            </div>
            <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-4">
                <x-admin.forms.label for="description" class="font-bold" :value="__('Email')" />
                <div class="sm:col-span-2 sm:mt-0 text-gray-900 dark:text-gray-200">
                    {{ $user->email }}
                </div>
            </div>
            <!-- <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-4">
                <x-admin.forms.label for="is_active" class="font-bold" :value="__('Is Active')" />
                <div class="sm:col-span-2 sm:mt-0 text-gray-900 dark:text-gray-200">
                    <x-admin.span-status :status="$user->is_active">
                        {{ $user->is_active == 1 ? 'Active' : 'InActive' }}
                    </x-admin.span-status>
                </div>
            </div> -->
        </div>
    </div>

</div>