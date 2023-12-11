<div>
    <x-slot name="header">
        Update categories
    </x-slot>
   
    <div class="sm:flex sm:items-center justify-end">
        <div class="sm:flex">
            <a href="{{ route('admin.categories') }}">
                <x-admin.buttons.primary-button>
                    {{ __('Back') }}
                </x-admin.buttons.primary-button>
            </a>
        </div>
    </div>
    <form wire:submit="update">
        <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-4 sm:grid-cols-6">
            <div class="sm:col-span-3 xl:col-span-2">
                <x-admin.forms.label for="name" :value="__('Category Name')" />
                <div class="mt-2">
                    <x-admin.forms.input-text id="name" type="text" wire:model="name" required autofocus />
                </div>
                @error('name') <x-admin.forms.error :messages="$message" class="mt-2" /> @enderror
            </div>

            <div class="sm:col-start-1 sm:col-span-3 xl:col-start-1 xl:col-span-2">
                <x-admin.forms.label for="slug" :value="__('Category Slug')" />
                <div class="mt-2">
                    <x-admin.forms.input-text id="slug" type="text" wire:model="slug" required />
                </div>
                @error('slug') <x-admin.forms.error :messages="$message" class="mt-2" /> @enderror
            </div>

            <div class="col-span-full">
                <x-admin.forms.label for="description" :value="__('Description')" />
                <div class="mt-2">
                    <x-admin.forms.textarea id="description" rows="3" wire:model="description" required />
                </div>
                @error('description') <x-admin.forms.error :messages="$message" class="mt-2" /> @enderror
            </div>

            <div class="col-span-full">
                <x-admin.forms.label for="image" :value="__('Image')" />
                <div class="mt-2 flex items-center gap-x-3">
                    <img class="mt-1 h-20 w-auto" src="{{ asset('storage/'.$this->category->image) }}">
                    <input type="file" wire:model="image">
                </div>
                @error('image') <x-admin.forms.error :messages="$message" class="mt-2" /> @enderror
                @if ($image)
                    <img src="{{ $image->temporaryUrl() }}" class="mt-2 w-50 h-auto">
                @endif
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
