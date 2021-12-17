@props(['color' => 'gray'])

<button {{ $attributes->merge(['type' => 'submit', 'class' => "inline-flex justify-center items-center px-4 py-2 bg-orange-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-orange-500 active:bg-orange-500 focus:outline-none focus:border-orange-700 focus:ring focus:ring-orange-300 disabled:opacity-25 transition"]) }}>
    {{ $slot }}
</button>
