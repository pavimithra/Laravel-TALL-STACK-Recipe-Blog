<div>
    <x-slot name="header">
        {{ __('Permissions') }}
    </x-slot>

    <div class="sm:flex sm:items-center">
        <div class="sm:flex-auto">
            <div class="flex">
                <a href="{{ route('admin.permission.create') }}">
                    <x-admin.buttons.primary-button>
                        {{ __('Add Permission') }}
                    </x-admin.buttons.primary-button>
                </a>
            </div>
        </div>
        <div class="mt-2 sm:ml-16 sm:mt-0 sm:flex gap-5">
            <x-admin.forms.input-text wire:model.live.debounce.300ms="search" id="name" type="text" name="name" placeholder="Search By Name"/>
            <select wire:model.live="no_of_rows" class = " mt-2 sm:mt-0 rounded-md border-gray-300 dark:border-0 bg-white dark:bg-white/5 py-1.5 text-gray-900 dark:text-gray-400 shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:text-sm sm:leading-6">
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="15">15</option>
                <option value="20">20</option>
                <option value="25">25</option>
            </select>            
        </div>
    </div>
    <div class="mt-8 flow-root">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <div class="overflow-hidden shadow ring-1 ring-black dark:ring-gray-800 ring-opacity-5 sm:rounded-lg">
                    <table>
                        <thead>
                            <tr>
                                <th scope="col" class=" sm:pl-6"> Name
                                    <x-admin.sort-by :sortBy="$sortBy" :sortDirection="$sortDirection" field_name="name" />
                                </th>
                                <th scope="col"> Description
                                    <x-admin.sort-by :sortBy="$sortBy" :sortDirection="$sortDirection" field_name="description" />
                                </th>
                                <th scope="col"> Status
                                    <x-admin.sort-by :sortBy="$sortBy" :sortDirection="$sortDirection" field_name="is_active" />
                                </th>
                                <th scope="col" class="relative sm:pr-6"> Action 
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($permissions as $permission)
                                <tr>
                                    <td class="sm:pl-6"> {{ $permission->name }} </td>
                                    <td class="sm:pl-6"> {{ $permission->description }} </td>
                                    <td>
                                        <x-admin.span-status :status="$permission->is_active">
                                            {{ $permission->is_active == 1 ? 'Active' : 'InActive' }}
                                        </x-admin.span-status>
                                    </td>
                                    <td class="relative sm:pr-6">
                                        <div class="flex gap-5">
                                            <a href="{{ route('admin.permission.show', $permission->id) }}">
                                                <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12.75 15l3-3m0 0l-3-3m3 3h-7.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                            </a>
                                            <a href="{{ route('admin.permission.update', $permission->id) }}">
                                                <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                </svg>
                                            </a>
                                            <button 
                                            type="button"
                                            wire:click="delete({{ $permission->id }})"
                                            wire:confirm="Are you sure you want to delete this post?">
                                                <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="sm:pl-6"> No permissions Found </td>
                                </tr>
                            @endforelse
                            @if ($permissions->lastPage() >1)
                                <tr>
                                    <td colspan="4"> {{ $permissions->links() }} </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
