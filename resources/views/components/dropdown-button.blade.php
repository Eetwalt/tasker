<button
    {{ $attributes->merge(['class' => 'block w-full px-4 py-2 text-start text-sm leading-5 text-white hover:bg-white/10 focus:outline-none focus:bg-white/10 transition duration-150 ease-in-out rounded-sm']) }}
>
    {{ $slot }}
</button>
