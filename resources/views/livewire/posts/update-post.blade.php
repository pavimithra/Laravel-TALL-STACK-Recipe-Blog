<div>
    <x-slot name="header">
        Update Post
    </x-slot>

    <form wire:submit="update">
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
                <x-admin.forms.label for="content" :value="__('Content')" />
                <div class="mt-2">
                    <x-admin.forms.textarea id="content" rows="10" wire:model="content" required />
                </div>
                @error('content') <x-admin.forms.error :messages="$message" class="mt-2" /> @enderror
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
        </div>
    </form>

    <div class="mt-6 col-span-full">
        <x-admin.forms.label for="image" :value="__('Available Images')" class="border-b border-gray-400" />
        @if ($post->images)
            <ul role="list" class="mt-4 grid grid-cols-2 gap-x-4 gap-y-8 sm:grid-cols-3 sm:gap-x-6 lg:grid-cols-4 xl:gap-x-8">
                @foreach ($post->images as $postImage)
                    <div>
                        <li class="relative">
                            <div class="group aspect-h-7 aspect-w-10 block w-full overflow-hidden  bg-gray-100 focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 focus-within:ring-offset-gray-100">
                                <img src="{{ asset('/storage/'.$postImage->name) }}" alt="{{ $postImage->name }}" class="pointer-events-none object-cover group-hover:opacity-75">
                                <button type="button" @click="$clipboard('http://127.0.0.1:8000/storage/{{ $postImage->name }}')" class="absolute inset-0 focus:outline-none">
                                    <span class="sr-only">{{ $postImage->name }}</span>
                                </button>
                            </div>
                        </li>
                        <div class="flex border border-green-600 justify-center p-1 gap-x-6">
                            @if($postImage->is_featured == 0)
                                <button wire:click="makeFeatured({{ $postImage->id }})">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 fill-red-700">
                                        <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            @else 
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 fill-green-700">
                                    <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z" clip-rule="evenodd" />
                                </svg>
                            @endif
                            <button wire:click="deleteImage({{ $postImage->id }})">
                                <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                </svg>
                            </button>
                        </div>
                    </div>
                @endforeach
            </ul>
        @endif
    </div>

    <form wire:submit="addImages">
        <div class="grid grid-cols-1 gap-x-6 gap-y-4 sm:grid-cols-6">
            <div class="mt-4 col-span-full">
                <x-admin.forms.label for="image" :value="__('Add More Images')" class="border-b border-gray-400" />
                <div class="mt-2">
                    <input type="file" wire:model="images" multiple id="upload{{ $iteration }}" class="rounded-md bg-white px-2.5 py-2 text-base font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50" />
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
        <div class="mt-2 flex items-center justify-start gap-x-6">
            <x-admin.buttons.primary-button>
                {{ __('Add Images') }}
            </x-admin.buttons.primary-button>
        </div>
    </form>

</div>