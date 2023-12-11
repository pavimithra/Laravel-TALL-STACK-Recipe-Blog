@props(['status'])

@php
$classes = ($status ?? 0)
            ? 'inline-flex items-center italic rounded-md px-2 py-1 text-xs font-medium ring-green-600/20 text-green-700 bg-green-50 ring-1 ring-inset ring-green-600/20'
            : 'inline-flex items-center italic rounded-md px-2 py-1 text-xs font-medium ring-red-600/20 text-red-700 bg-red-50 ring-1 ring-inset ring-green-600/20';
@endphp

<span {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</span>
