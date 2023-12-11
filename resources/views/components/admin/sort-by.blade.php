@props(['sortBy','sortDirection','field_name'])


<span wire:click="sortByField('{{$field_name}}')" class="flex float-right text-sm cursor-pointer">
    <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 6.75L12 3m0 0l3.75 3.75M12 3v18" class="{{ $sortBy === $field_name && $sortDirection === 'asc' ? 'text-gray-400' : 'text-gray-100' }}"/>
    </svg>
    <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 -ml-4">
        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 17.25L12 21m0 0l-3.75-3.75M12 21V3" class="{{ $sortBy === $field_name && $sortDirection === 'desc' ? 'text-gray-400' : 'text-gray-100' }}"/>
    </svg>
</span>