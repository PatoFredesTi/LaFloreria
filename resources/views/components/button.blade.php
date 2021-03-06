@props(['color' => 'teal'])

<button {{ $attributes->merge(['type' => 'submit', 'class' => "inline-flex justify-center items-center px-4 py-2 bg-teal-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-teal-500 active:bg-teal-500 focus:outline-none focus:border-teal-700 focus:ring focus:ring-teal-300 disabled:opacity-25 transition"]) }}>
    {{ $slot }}
</button>
