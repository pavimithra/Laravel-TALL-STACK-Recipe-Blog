<div>
    <x-slot name="header">
        Create Posts
    </x-slot>

    <form wire:submit="save">
        <div class="grid grid-cols-1 gap-x-6 gap-y-4 sm:grid-cols-6">
            <div class="sm:col-span-3 xl:col-span-2">
                <x-admin.forms.label for="title" :value="__('Post Title')" />
                <div class="mt-2">
                    <x-admin.forms.input-text id="title" type="text" wire:model="title" required autofocus />
                </div>
                @error('title') <x-admin.forms.error :messages="$message" class="mt-2" /> @enderror
            </div>

            <div class="sm:col-start-1 sm:col-span-3 xl:col-start-1 xl:col-span-2">
                <x-admin.forms.label for="slug" :value="__('Post Slug')" />
                <div class="mt-2">
                    <x-admin.forms.input-text id="slug" type="text" wire:model="slug" required />
                </div>
                @error('slug') <x-admin.forms.error :messages="$message" class="mt-2" /> @enderror
            </div>

            <div class="col-span-full">
                <x-admin.forms.label for="categories" :value="__('Add Categories to the Post')" />
                <div class="mt-2">
                    <select class="h-60" wire:model="categories" name="categories[]" id="categories" multiple="">
                        <option value="" disabled>Select Category</option>
                        @foreach ($all_categories as $id => $category)
                            <option value="{{ $id }}"> {{ $category }}  </option>
                        @endforeach
                    </select>
                </div>
                @error('categories') <x-admin.forms.error :messages="$message" class="mt-2" /> @enderror
            </div>

            <div class="col-span-full">
                <x-admin.forms.label for="image" :value="__('Images')" />
                <div class="mt-2">
                    <input type="file" wire:model="images" multiple />
                </div>
                @error('images') <x-admin.forms.error :messages="$message" class="mt-2" /> @enderror
                @if ($images)
                    <ul role="list" class="mt-6 grid grid-cols-2 gap-x-4 gap-y-8 sm:grid-cols-3 sm:gap-x-6 lg:grid-cols-4 xl:gap-x-8">
                        @foreach ($images as $image)
                            <li class="relative">
                                <div class="block w-full overflow-hidden">
                                    <img src="{{ $image->temporaryUrl() }}" class="mt-2 w-64 h-auto">
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>

        <div class="mt-6 flex items-center justify-start gap-x-6">
            <a href="{{ route('admin.posts') }}">
                <x-admin.buttons.button>
                    {{ __('Cancel') }}
                </x-admin.buttons.button>
            </a>
            <x-admin.buttons.primary-button>
                {{ __('Save') }}
            </x-admin.buttons.primary-button>
            <div wire:loading>
                <x-admin.spinner />
            </div>
        </div>
    </form>

</div>