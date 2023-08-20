<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center p-2 bg-slate-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-slate-700 active:bg-slate-900 focus:outline-none focus:border-slate-900 focus:ring focus:ring-slate-300 disabled:opacity-25 transition']) }}>
    {{ $slot }}
</button>
