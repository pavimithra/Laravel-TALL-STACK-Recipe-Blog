<div>
    <x-slot name="header">
        {{ __('Users') }}
    </x-slot>

    <div class="sm:flex sm:items-center justify-end">
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
                                <th scope="col"> Email
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
                            @forelse ($users as $user)
                                <tr>
                                    <td class="sm:pl-6"> {{ $user->name }} </td>
                                    <td class="sm:pl-6"> {{ $user->email }} </td>
                                    <td>
                                        <x-admin.span-status :status="$user->is_active">
                                            {{ $user->is_active == 1 ? 'Active' : 'InActive' }}
                                        </x-admin.span-status>
                                    </td>
                                    <td class="relative sm:pr-6">
                                        <div class="flex gap-5">
                                            <a href="{{ route('admin.user.show', $user->id) }}">
                                                <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12.75 15l3-3m0 0l-3-3m3 3h-7.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="sm:pl-6"> No users Found </td>
                                </tr>
                            @endforelse
                            @if ($users->lastPage() >1)
                                <tr>
                                    <td colspan="4"> {{ $users->links() }} </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
