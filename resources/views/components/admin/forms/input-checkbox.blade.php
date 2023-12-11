@props(['is_active'])
                                                                                                             
<input @checked($is_active) {!! $attributes->merge(['class' => 'h-4 w-4 rounded-sm border-gray-300 focus:ring-indigo-600']) !!}>