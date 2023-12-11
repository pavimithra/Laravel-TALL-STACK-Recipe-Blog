<div>
    <x-slot name="header">
        Create Role
    </x-slot>
   
    <div class="sm:flex sm:items-center justify-end">
        <div class="sm:flex">
            <a href="{{ route('admin.roles') }}">
                <x-admin.buttons.primary-button>
                    {{ __('Back') }}
                </x-admin.buttons.primary-button>
            </a>
        </div>
    </div>
    <form wire:submit="save">
        <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-4 sm:grid-cols-6">
            <div class="sm:col-span-3 xl:col-span-2">
                <x-admin.forms.label for="name" :value="__('Role Name')" />
                <div class="mt-2">
                    <x-admin.forms.input-text id="name" type="text" wire:model="name" required autofocus />
                </div>
                @error('name') <x-admin.forms.error :messages="$message" class="mt-2" /> @enderror
            </div>

            <div class="col-span-full">
                <x-admin.forms.label for="description" :value="__('Description')" />
                <div class="mt-2">
                    <x-admin.forms.textarea id="description" rows="2" wire:model="description" required />
                </div>
                @error('description') <x-admin.forms.error :messages="$message" class="mt-2" /> @enderror
            </div>

            <div class="col-span-full">
                <x-admin.forms.label for="permissions" :value="__('Add Permissions to the Role')" />
                <div class="mt-2">
                    <select class="h-60" wire:model="permissions" name="permissions[]" id="permissions" multiple="">
                        <option value="" disabled>Select Permission</option>
                        @foreach ($all_permissions as $id => $permission)
                            <option value="{{ $id }}"> {{ $permission }}  </option>
                        @endforeach
                    </select>
                </div>
                @error('permissions') <x-admin.forms.error :messages="$message" class="mt-2" /> @enderror
            </div>
        </div>

        <div class="mt-6 flex items-center justify-start gap-x-6">
            <button type="submit"
                class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                <div wire:loading>
                    <x-admin.spinner />
                </div>
            </div>
    </form>

</div>
