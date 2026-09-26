<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center justify-center px-5 py-2.5 bg-emerald-600 hover:bg-emerald-500 active:bg-emerald-700 border border-transparent rounded-xl font-bold text-xs text-white uppercase tracking-wider transition ease-in-out duration-150 shadow-lg shadow-emerald-950/50 font-sans']) }}>
    {{ $slot }}
</button>