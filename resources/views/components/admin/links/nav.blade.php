@props(['active'])

@php
$classes = ($active ?? false)
            ? 'bg-gray-100 text-indigo-600 group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold dark:text-white dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-800'
            : 'text-gray-700 hover:text-indigo-600 hover:bg-gray-100 group flex gap-x-3 rounded-md p-2 text-sm leading-6 font-semibold dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-800';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
