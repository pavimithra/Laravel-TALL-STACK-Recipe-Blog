<button {{ $attributes->merge(['type' => 'button', 'class' => 'rounded-md bg-gray-300 px-3 py-2 text-sm font-semibold text-black shadow-sm hover:bg-gray-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600']) }}>
    {{ $slot }}
</button>
